<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarReview;
use App\Models\CarType;
use App\Models\ContactUsQuery;
use Illuminate\Support\Facades\Hash;
use App\Models\DrivingLicenses;
use App\Models\Gallery;
use App\Models\Rental;
use App\Models\RentalRate;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function Webmozart\Assert\Tests\StaticAnalysis\email;

class WebController extends Controller
{
    public function home() {
        $car = Car::orderBy("id", "desc")->limit(6)->get();
        $countCar = Car::count();
        $countBrand = Brand::count();
        $countRental = Rental::count();
        return view("welcome",[
            "car"=>$car,
            "countCar"=>$countCar,
            "countBrand"=>$countBrand,
            "countRental"=>$countRental,
        ]);
    }

    //Start CarList
    private function mergeCode($cars) { //Hàm này dùng để gộp code chung của trang Cars cho gọn
        $brands = Brand::all();
        $carTypes = CarType::all();
        $reviews = CarReview::whereIn("car_id", $cars->pluck('id')->all())->get();
        $rates = [];//mảng chứa số sao cho từng xe

        foreach ($cars as $car) {
            $total = 0;
            $count = 0;
            foreach ($reviews as $item) {
                if ($item->car_id == $car->id && isset($item->score)) {
                    $total += $item->score;
                    $count++;
                }
            }
            if ($count > 0) {
                $rate = $total / $count;
                $rates[$car->id] = $rate;
            }
        }
        $seatsOptions = [2, 4, 5, 7, 16, 29]; //mảng chứa số ghế ngồi của xe
        return [
            "brands" => $brands,
            "carTypes" => $carTypes,
            "reviews" => $reviews,
            "rates" => $rates,
            "seatsOptions" => $seatsOptions
        ];
    }

    public function car_list() {
        $cars = Car::paginate(18);
        $merge = $this->mergeCode($cars);

        return view("web.car-list", $merge,[
            "cars" => $cars
        ]);
    }

    public function car_search(Request $request) {
        $q = $request->get("q");
        $cars = Car::where("model", 'like', "%$q%")->get();
        $merge = $this->mergeCode($cars);

        $count = $cars->count(); //hiển thị số lượng xe tìm thấy
        return view("web.car-search", array_merge($merge, [
            "cars" => $cars,
            "count" => $count
        ]));
    }

    public function car_filter_brand(Brand $brand) {
        $cars = Car::where('brand_id', $brand->id)->get();
        $merge = $this->mergeCode($cars);

        return view("web.car-filter", array_merge($merge, [
            "cars" => $cars,
            "selectedBrand" => $brand->name
        ]));
    }

    public function car_filter_type(CarType $carType) {
        $cars = Car::where('carType_id', $carType->id)->get();
        $merge = $this->mergeCode($cars);

        return view("web.car-filter", array_merge($merge, [
            "cars" => $cars,
            "selectedCarType" => $carType->name
        ]));
    }

    public function car_filter_price(Request $request) {
        $query = Car::query();
        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');
            $selectedCarPrice = "$$minPrice - $$maxPrice";
            $query->whereBetween('price', [$minPrice, $maxPrice]);

        }
        $cars = $query->get();
        $merge = $this->mergeCode($cars);

        return view("web.car-filter", array_merge($merge, [
            "cars" => $cars,
            "selectedCarPrice" => $selectedCarPrice
        ]));
    }

    public function car_filter_seats($seats) {
        $cars = Car::where('seats', $seats)->get();
        $merge = $this->mergeCode($cars);

        return view("web.car-filter", array_merge($merge, [
            "cars" => $cars,
            "selectedSeats" => $seats
        ]));
    }
    //End CarList

    public function checkCar(Request $request) {
        $car_id = $request->get("car_id");
        $rental_dayString = $request->get("rental_date");
        $rental_timeString = $request->get("rental_time");
        $return_dayString = $request->get("return_date");
        $return_timeString = $request->get("return_time");
        $rental_day = Carbon::createFromFormat('F j, Y', $rental_dayString);
        $rental_time = Carbon::createFromFormat('H:i', $rental_timeString);

        $return_day = Carbon::createFromFormat('F j, Y', $return_dayString);
        $return_time = Carbon::createFromFormat('H:i', $return_timeString);

        $rental_date = $rental_day->setTime($rental_time->hour, $rental_time->minute, $rental_time->second);
        $return_date = $return_day->setTime($return_time->hour, $return_time->minute, $return_time->second);

        $rentals = Rental::where('car_id', $car_id)
            ->where(function ($query) use ($rental_date, $return_date) {
                $query->whereBetween('rental_date', [$rental_date, $return_date])
                    ->orWhereBetween('return_date', [$rental_date, $return_date])
                    ->orWhere(function ($query) use ($rental_date, $return_date) {
                        $query->where('rental_date', '<=', $rental_date)
                            ->where('return_date', '>=', $return_date);
                    });
            })
            ->count();
        $car = Car::find($car_id);
        if ($rentals > 0) {
            return redirect()->to("/car-list");
        } else {
            Session::put('car', $car);
            Session::put('rental_date', $rental_date);
            Session::put('return_date', $return_date);
            return redirect()->to("/booking");
        }
    }

    public function booking() {
        if (!auth()->check()) {
            return redirect('/login');
        }
        if (Session::has('car')){
            $car = Session::get('car');
            $services = Service::all();
            $thumbnails = Gallery::where("car_id", $car->id)->limit(2)->get();
            $rental_date = Session::get('rental_date');
            $return_date = Session::get('return_date');

            $rental_day = $rental_date->format('F j, Y');
            $rental_time = $rental_date->format('H:i');
            $return_day = $return_date->format('F j, Y');
            $return_time = $return_date->format('H:i');

            $rentalrate = RentalRate::where("car_id", $car->id)->get();
//            dd($rentalrate);

        } else {
            return redirect('/car-list');
        }


        return view("web.booking", [
            "car" => $car,
            "services" => $services,
            "thumbnails" => $thumbnails,
            "rentalrate" => $rentalrate,
            "rental_day" => $rental_day,
            "rental_time" => $rental_time,
            "return_day" => $return_day,
            "return_time" => $return_time
        ]);
    }
    public function placeOrder(Request $request) {
        $request->validate([// mảng các quy tắt
            "rental_date" => "required",
            "return_date" => "required",
            "pickup_location" => "required",
            "address" => "required",
            "telephone" => "required|min:10|max:12",// ít nhất 10 và nhiều nhất 12
            "email" => "required",
            "payment_method" => "required",
            "rental_type" => "required",
            "car_price" => "required|numeric|min:0",
        ], [// mảng các thông điệp

        ]);

    }

    public function about() {
        $OverallQuantityOfVehicles = Car::orderBy("id", "desc")->limit(6)->get();
        $OverallQuantityOfBrands = Brand::count();
        $OverallQuantityOfRental = Rental::count();
        return view("web.about-us", [
            "OverallQuantityOfVehicles"=>$OverallQuantityOfVehicles,
            "OverallQuantityOfBrands"=>$OverallQuantityOfBrands,
            "OverallQuantityOfRental"=>$OverallQuantityOfRental,
        ]);
    }

    public function contact() {
        return view("web.contact");
    }

    public function contact_contactSave(Request $request) {
        $request->validate([
            "name"=>"required",
            "email" => "required",
            "phone"=>"required|numeric|min:0",
            "message"=>"required",
        ],[
            // thong bao gi thi thong bao
        ]);

        if (!auth()->check()) {
            return redirect('/login');
        }
        ContactUsQuery::create([
            "user_id" => auth()->user()->id,
            "name" => $request->get("name"),
            "email" => $request->get("email"),
            "phone" => $request->get("phone"),
            "message" =>$request->get("message"),
            "status" => 0
        ]);
        return redirect()->to("/contact");
    }
    public function car_detail(Car $car) {
        $thumbnails = Gallery::where("car_id", $car->id)->get();
        $reviews = CarReview::where("car_id", $car->id)->orderBy("id", "desc")->paginate(3);
        $rate = 0;
        $totals = 0;
        foreach ($reviews as $item) {
            $totals += $item->score;
            $rate = number_format($totals / $reviews->count(), 1);
        }
        $rentalrate = RentalRate::where("car_id", $car->id)->get();
        return view("web.car-detail", [
            "car" => $car,
            "thumbnails" => $thumbnails,
            "reviews" => $reviews,
            "rate" => $rate,
            "rentalrate" => $rentalrate
        ]);
    }


    //Start account-booking
    public function myOrders() {
        $user = auth()->user();
        $customer_id = $user->id; // Chi lay nhung don hang cua tai khoan đang đăng nhập

        $pendingOrders = Rental::where('status', 0)->where('user_id', $customer_id)->orderBy('id')->get();
        $confirmedOrders = Rental::where('status', 1)->where('user_id', $customer_id)->orderBy('id')->get();
        $inProgress = Rental::where('status', 2)->where('user_id', $customer_id)->orderBy('id')->get();
        $completedOrders = Rental::where('status', 3)->where('user_id', $customer_id)->orderBy('id')->get();
        $cancelledOrders = Rental::where('status', 4)->where('user_id', $customer_id)->orderBy('id')->get();
        return view("web.account-booking",[
            'user' => $user,
            'pendingOrders' => $pendingOrders,
            'confirmedOrders' => $confirmedOrders,
            'inProgress' => $inProgress,
            'completedOrders' => $completedOrders,
            'cancelledOrders' => $cancelledOrders
        ]);
    }
    //End account-booking

    public function dashboard(User $user) {
        $rental= Rental::limit(10)->where("user_id", auth()->user()->id)->get();
        $rentalCount=DB::table('rental')->where("user_id", auth()->user()->id)->count();
        $rentalUpComing=DB::table('rental')->where("status",0)->count();
        $rentalCancel=DB::table('rental')->where("status",0)->count();
        return view("web.account-dashboard",[
            'rentalCount'=>$rentalCount,
            'user'=>$user,
            "rental"=>$rental,
            "rentalUpComing"=>$rentalUpComing,
            "rentalCancel"=>$rentalCancel,
            ]);
    }

    //Start account profile
    public function profile() {
        $user = auth()->user();
        return view("web.account-profile",[
            'user' => $user,
        ]);
    }

    public function updateProfileSave(Request $request) {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "phone" => "required|min:10|max:12",
            "old_password" => "required",
            "new_password" => "required|min:8|confirmed",
        ], [
            "email.email" => "Please enter the correct email format",
            "min" => "Phone number must be more than :min characters",
            "max" => "Phone number must be less than :max characters",
            "new_password.min" => "Password must be more than :min characters",
            "confirmed" => "The new password confirmation does not match.",
        ]);

        $user = auth()->user();
        if (!Hash::check($request->old_password, $user->password)) { //kiểm tra mật khẩu cũ xem đúng chưa
            return redirect()->back()->withErrors(["old_password" => "The old password is incorrect"]);
        }
        if (Hash::check($request->new_password, $user->password)) { //nếu mật khẩu mới trùng với mật khẩu cũ thì hiện thông báo
            return redirect()->back()->withErrors(["new_password" => "Old and new passwords match"]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->new_password) { //lưu mật khẩu mới
            $user->password = Hash::make($request->new_password);
        }
        $user->save();

        return redirect()->to("/account-profile")->with("success", "Profile updated successfully");
    }

    public function profileLicenses() {
        $user = auth()->user();
        return view("web.account-profile-licenses",[
            'user' => $user,
        ]);
    }

    public function updateLicensesSave(Request $request){
        $request->validate([
            'name' => 'required',
            'license_number' => 'required|min:10|max:14',
            'issue_date' => 'required|date_format:Y-m-d',
            'expiration_date' => 'required|date_format:Y-m-d',
            'thumbnail_1' => 'required|image',
            'thumbnail_2' => 'required|image',
        ], [
            'required' => 'Please complete all information',
            'min' => 'Must enter at least :min characters',
            'max' => 'Enter a value not exceeding :max characters',
            'image' => 'The file must be an image',
            'date_format' => 'You entered the wrong date format',
        ]);

        //Cap nhap lai ten nguoi dung neu can
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->save();

        //Thong bao nếu người dùng điền quá 10 năm
        $expirationDate = Carbon::createFromFormat('Y-m-d', $request->input('expiration_date'));
        $currentDate = Carbon::now();
        if ($expirationDate->diffInYears($currentDate) > 10 || $expirationDate->diffInYears($currentDate) < 0) {
            return redirect()->back()->withErrors(['expiration_date' => 'Your license term exceeds 10 years']);
        }
        //Thông báo nếu người dùng điền ngày phát hành lớn hơn ngày hết hạn
        $issueDate = Carbon::createFromFormat('Y-m-d', $request->input('issue_date'));
        if ($expirationDate <= $issueDate) {
            return redirect()->back()->withErrors(['expiration_date' => 'The expiration date must be greater than the issue date']);
        }


        //Lưu chữ thông tin giấy phép lái xe được tạo mới hoặc cập nhập -> rồi lưu vào database
        $drivingLicense = DrivingLicenses::firstOrNew(['user_id' => auth()->id()]);
        $drivingLicense->license_number = $request->input('license_number');
        $drivingLicense->issue_date = Carbon::createFromFormat('Y-m-d', $request->input('issue_date'));
        $drivingLicense->expiration_date = $expirationDate;

        //Tạo thư mục uploadLicenses
        $path = public_path('uploadLicenses');
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        //Lưu ảnh vào uploadLicenses
        $thumbnail1Uploaded = $request->file('thumbnail_1');
        $thumbnail1Name = $thumbnail1Uploaded->getClientOriginalName();
        $thumbnail1Uploaded->move($path, $thumbnail1Name);
        $drivingLicense->thumbnail_1 = 'uploadLicenses/' . $thumbnail1Name;

        $thumbnail2Uploaded = $request->file('thumbnail_2');
        $thumbnail2Name = $thumbnail2Uploaded->getClientOriginalName();
        $thumbnail2Uploaded->move($path, $thumbnail2Name);
        $drivingLicense->thumbnail_2 = 'uploadLicenses/' . $thumbnail2Name;

        $drivingLicense->save();

        //Cập nhập trạng thái
        if ($user->status == 0) {
            $user->status = 1;
        } elseif ($user->status == 2) {
            $user->status = 1;
        } elseif ($user->status == 3) {
            $user->status = 1;
        }

        $user->save();

        return redirect()->to('/account-profile-licenses')->with("success", "Your driver's license information has been updated successfully");
    }
    //End account profile
}
