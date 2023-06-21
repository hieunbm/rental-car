<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarReview;
use App\Models\CarType;
use App\Models\ContactUsQuery;
use App\Models\Gallery;
use App\Models\Rental;
use App\Models\RentalRate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function booking() {
        return view("web.booking");
    }

    public function about() {
        $count = Car::count();
        return view("web.about-us", [
           ""
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
        $reviews = CarReview::where("car_id", $car->id)->get();
        $priceday = RentalRate::where("car_id", $car->id)->where("rental_type", "rent by day")->get();
        $rate = 0;
        $totals = 0;
        foreach ($reviews as $item) {
            $totals += $item->score;
            $rate = $totals / $reviews->count();
        }
        $rentalrate = RentalRate::where("car_id", $car->id)->get();
        return view("web.car-detail", [
            "car" => $car,
            "thumbnails" => $thumbnails,
            "reviews" => $reviews,
            "priceday" => $priceday,
            "rate" => $rate,
            "rentalrate" => $rentalrate
        ]);
    }

    public function myOrders() {
        $user = auth()->user();
        $customer_id = $user->id; // Chi lay nhung don hang cua tai khoan đang đăng nhập

        $pendingOrders = Rental::where('status', 0)->where('user_id', $customer_id)->orderBy('id')->get();
        $confirmedOrders = Rental::where('status', 1)->where('user_id', $customer_id)->orderBy('id')->get();
        $shippingOrders = Rental::where('status', 2)->where('user_id', $customer_id)->orderBy('id')->get();
        $shippedOrders = Rental::where('status', 3)->where('user_id', $customer_id)->orderBy('id')->get();
        $completedOrders = Rental::where('status', 4)->where('user_id', $customer_id)->orderBy('id')->get();
        $cancelledOrders = Rental::where('status', 5)->where('user_id', $customer_id)->orderBy('id')->get();
        return view("web.account-booking",[
            'user' => $user,
            'pendingOrders' => $pendingOrders,
            'confirmedOrders' => $confirmedOrders,
            'shippingOrders' => $shippingOrders,
            'shippedOrders' => $shippedOrders,
            'completedOrders' => $completedOrders,
            'cancelledOrders' => $cancelledOrders
        ]);
    }

    public function dashboard(User $user) {
        $rental= Rental::limit(10)->where("customer_id", auth()->user()->id)->get();
        $rentalCount=DB::table('rental')->count();
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

    public function profile() {
        $user = auth()->user();
        return view("web.account-profile",[
            'user' => $user,
        ]);
    }
}
