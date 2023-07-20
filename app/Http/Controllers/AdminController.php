<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarReview;
use App\Models\CarType;
use App\Models\ContactUsQuery;
use App\Models\Gallery;
use App\Models\DrivingLicenses;
use App\Models\Incident;
use App\Models\Rental;
use App\Models\RentalRate;
use App\Models\Service;
use App\Models\User;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    //Start Dashboard
    public function admin_dashboard(){
        $totalAmountByDay7Days = [];
        $totalAmountByDay30Days = [];
        $successfulRentalsByDay7Days = [];
        $canceledRentalsByDay7Days = [];
        $today = now()->format('Y-m-d');

        // Bieu do doanh thu 7 ngay truoc
        $startDate7Days = date('Y-m-d', strtotime("-7 days", strtotime($today)));
        $endDate7Days = $today;
        $currentDate7Days = $startDate7Days;
        while (strtotime($currentDate7Days) <= strtotime($endDate7Days)) {
            $totalAmount7Days = Rental::whereDate("rental_date", $currentDate7Days)->where("status", 5)->sum("total_amount");
            $successfulRentals7Days = Rental::whereDate("rental_date", $currentDate7Days)->where("status", 5)->count(); //lay nhung don thue thanh cong
            $canceledRentals7Days = Rental::whereDate("rental_date", $currentDate7Days)->where("status", 6)->count(); //don bi huy
            $totalAmountByDay7Days[$currentDate7Days] = $totalAmount7Days;
            $successfulRentalsByDay7Days[$currentDate7Days] = $successfulRentals7Days;
            $canceledRentalsByDay7Days[$currentDate7Days] = $canceledRentals7Days;
            $currentDate7Days = date('Y-m-d', strtotime("+1 day", strtotime($currentDate7Days)));
        }

        // Biểu đồ daonh thu của tháng trước
        $startDatePreviousMonth = now()->subMonth()->startOfMonth()->format('Y-m-d');
        $endDatePreviousMonth = now()->subMonth()->endOfMonth()->format('Y-m-d');
        $currentDatePreviousMonth = $startDatePreviousMonth;
        while (strtotime($currentDatePreviousMonth) <= strtotime($endDatePreviousMonth)) {
            $totalAmountPreviousMonth = Rental::whereDate("rental_date", $currentDatePreviousMonth)->where("status", 5)->sum("total_amount");
            $totalAmountByDay30Days[$currentDatePreviousMonth] = $totalAmountPreviousMonth;
            $currentDatePreviousMonth = date('Y-m-d', strtotime("+1 day", strtotime($currentDatePreviousMonth)));
        }

        // Biểu đồ doanh thu của 12 tháng trong năm
        $currentYear = now()->format('Y');
        $revenueByMonth = [];
        for ($month = 1; $month <= 12; $month++) {
            $startDate = Carbon::create($currentYear, $month, 1)->format('Y-m-d');
            $endDate = Carbon::create($currentYear, $month, 1)->endOfMonth()->format('Y-m-d');

            $revenueByMonth[] = Rental::whereBetween('rental_date', [$startDate, $endDate])
                ->where("status", 5)
                ->sum("total_amount");
        }

        //Tong so don thue xe va tong doanh thu cua ngay hom nay
        $totalCarRentalOrdersToday = Rental::whereDate("rental_date", $today)->count();
        $paidOrdersCount = Rental::whereDate("rental_date", $today)->where("is_rent_paid", 1)->count();
        $totalRevenueToday = Rental::whereDate("rental_date", $today)->where("is_rent_paid", 1)->sum("total_amount");

        //Tong so don thue xe va tong doanh thu
        $totalCarRentalOrdersAllTime = Rental::count();
        $paidOrdersCountAllTime = Rental::where("is_rent_paid", 1)->count();
        $totalRevenueAll = Rental::sum("total_amount");
        $totalRevenueAllTime = Rental::where("is_rent_paid", 1)->where("status", 5)->sum("total_amount");

        // Tong so nguoi dung va tong so nguoi dung da thue xe
        $totalClients = User::count();
        $totalRenters = Rental::distinct('user_id')->count('user_id');

        //Tong so xe va tong so xe da duoc thue
        $totalCar = Car::count();
        $totalRentersCar = Car::where('status', 1)->count();

        //Lấy ra tổng số lần thanh toán của từng phương thức
        $totalVNPayPayments = Rental::where('desposit_type', 'VN Pay')->count();
        $totalPayPalPayments = Rental::where('desposit_type', 'PAYPAL')->count();
        $totalMomoPayments = Rental::where('desposit_type', 'MOMO')->count();
        $totalCODPayments = Rental::where('desposit_type', 'COD')->count();

        //lấy ra 5 xe được thuê nhiều nhất và tính số lần được thuê
        $mostRentedCars = Rental::select('car_id', DB::raw('COUNT(car_id) as rental_count'))->where("status", 5)->groupBy('car_id')->orderByDesc('rental_count')->limit(5)->get();
        $carIds = $mostRentedCars->pluck('car_id')->toArray();
        $mostRentedCarDetails = Car::whereIn('id', $carIds)->with('brand')->get();
        //tính số tiền kiếm được của từng xe
        foreach ($mostRentedCarDetails as $car) {
            $totalAmountEarned = Rental::where('car_id', $car->id)->where('status', 5)->where('is_rent_paid', 1)->sum('total_amount');
            $rentalCount = Rental::where('car_id', $car->id)->where('status', 5)->count();
            $car->total_amount_earned = $totalAmountEarned;
            $car->rental_count = $rentalCount;
        }
        $mostRentedCarDetails = $mostRentedCarDetails->sortByDesc('rental_count');//sắp xếp xe nào được thuê nhiều nhất thì đứng đầu

        return view('admin.dashboard', compact('totalAmountByDay7Days',
            'totalAmountByDay30Days',
            'successfulRentalsByDay7Days',
            'canceledRentalsByDay7Days',
            'totalCarRentalOrdersToday',
            'paidOrdersCount',
            'totalRevenueToday',
            'totalCarRentalOrdersAllTime',
            'paidOrdersCountAllTime',
            'totalRevenueAll',
            'totalRevenueAllTime',
            'totalClients',
            'totalRenters',
            'totalCar',
            'totalRentersCar',
            'totalVNPayPayments',
            'totalPayPalPayments',
            'totalMomoPayments',
            'totalCODPayments',
            'mostRentedCars',
            'mostRentedCarDetails',
            'revenueByMonth'
        ));
    }
    //End Dashboard


    // start booking
    public function admin_booking(Request $request) {
        $status = $request->get('status');
        $rentalsQuery = Rental::orderBy("id", "desc");

        //lọc booking theo status
        if ($status !== null) {
            $rentalsQuery = $rentalsQuery->where('status', $status);
        }

        $rentals = $rentalsQuery->paginate(12);

        return view("admin.admin-booking", [
            "rentals" => $rentals,
        ]);
    }
    public function admin_booking_detail(Rental $rental) {

        if ($rental->return_date != null) {
            // xử lí lưu ngày trả xe
            $rental->return_date = Carbon::now()->format('Y-m-d H:i:s');
            $rental->save();
            // xử lí ngày trả và tiền
            $startDate = Carbon::parse($rental->rental_date);; // Ngày bắt đầu thuê
            $endDate = Carbon::parse($rental->return_date); // Ngày kết thúc thuê
            if ($rental->rental_type == "rent by day") {
                $numberOfDays = $startDate->diffInDays($endDate);
                // Kiểm tra nếu ngày thuê và ngày trả trùng nhau và đều là ngày hôm nay, thì số ngày thuê là 1
                if ($numberOfDays === 0 && $startDate->isToday() && $endDate->isToday()) {
                    $numberOfDays = 1;
                }
            } elseif ($rental->rental_type == "rent by hour") {
                $numberOfDays =$startDate->diffInHours($endDate);
                if ($numberOfDays === 0 && $startDate->isToday() && $endDate->isToday()) {
                    $numberOfDays = 1;
                }
            }
            $rental->update(["expected"=>$numberOfDays]);
        }

        $services = $rental->service;
        $total = 0;
        foreach ($services as $item){
            $total += $item->price;
        }
        $totalFee = 0;
        foreach ($rental->incident as $item){
            $totalFee += $item->expense;
        }

        $rental->update(["total_amount"=>$total+$totalFee+$rental->expected*$rental->car_price]);

        return view("admin.admin-booking-detail", [
            "rental" => $rental,
            "total" => $total,
            "totalFee" => $totalFee
        ]);
    }
    public function confirmOrder(Rental $rental){
        // cập nhật status cuả order thành 1 (cònfirm)
        $rental->update(["status"=>1]);
        // gửi email cho khách báo đơn đã đc chuyển trạng thái
        Mail::to("hoangtulaubar@gmail.com")->send(new OrderMail($rental));
        Toastr::success('Status update successful.', 'Success!');
        return redirect()->to("/admin/booking-detail/".$rental->id);
    }
    public function carHandoverOrder(Rental $rental){
        // kiểm tra
        $rentalDate = Carbon::parse($rental->rental_date);
        $now = Carbon::now();

        if ($now->diffInHours($rentalDate, false) < 24) {
            // cập nhật status cuả order (confirm)
            $rental->update(["status"=>2]);
            // gửi email cho khách báo đơn đã đc chuyển trạng thái
            Mail::to($rental->email)->send(new OrderMail($rental));
            Toastr::success('Status update successful.', 'Success!');
            return redirect()->to("/admin/booking-detail/".$rental->id);
        } else {
            // Không đủ thời gian để giao xe, hiển thị thông báo lỗi hoặc xử lý theo yêu cầu
            Toastr::warning('Delivery date not yet.', 'Warning!');
            return redirect()->to("/admin/booking-detail/".$rental->id);
        }

    }
    public function inProgress(Rental $rental){
        // cập nhật status cuả order thành 1 (cònfirm)
        $rental->update(["status"=>3]);
        // gửi email cho khách báo đơn đã đc chuyển trạng thái
        Toastr::success('Status update successful.', 'Success!');
        return redirect()->to("/admin/booking-detail/".$rental->id);
    }
    public function returnCar(Rental $rental)
    {
        // xử lí lưu ngày trả xe
        $return_dateString = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $return_date = Carbon::parse($return_dateString);;
        if ($return_date->lessThan($rental->rental_date)) {
            Toastr::warning('Can not pick up the car right now.', 'Warning!');
            return redirect()->to("/admin/booking-detail/".$rental->id);
        }
        // lưu dữ liệu
        $rental->return_date = $return_dateString;
        $rental->save();

        // xử lí ngày trả và tiền
        $startDate = Carbon::parse($rental->rental_date);; // Ngày bắt đầu thuê
        $endDate = Carbon::parse($rental->return_date); // Ngày kết thúc thuê
        if ($rental->rental_type == "rent by day") {
            $numberOfDays = $startDate->diffInDays($endDate);
            // Kiểm tra nếu ngày thuê và ngày trả trùng nhau và đều là ngày hôm nay, thì số ngày thuê là 1
            if ($numberOfDays === 0 && $startDate->isToday() && $endDate->isToday()) {
                $numberOfDays = 1;
            }
        } elseif ($rental->rental_type == "rent by hour") {
            $numberOfDays =$startDate->diffInHours($endDate);
            if ($numberOfDays === 0 && $startDate->isToday() && $endDate->isToday()) {
                $numberOfDays = 1;
            }
        }
        // Xử lý logic trả xe
        $rental->update(["status"=>4, "is_car_returned"=>true]);

        // Xử lí trạng thái xe
        $car = Car::find($rental->car_id);
        $car->status = 0;
        $car->save();
        Toastr::success('Status update successful.', 'Success!');
        return redirect()->to("/admin/booking-detail/".$rental->id);
    }
    public function complete(Rental $rental){
        // cập nhật status cuả order thành 1 (cònfirm)
        $incidents = 0;
        foreach ($rental->incident as $item) {
            $incidents += $item->expense;
        }

        $rental->update(["status"=>5, "is_rent_paid"=>true, "is_desposit_returned" => true, "additional_fee" => $incidents]);

        // gửi email cho khách báo đơn đã đc chuyển trạng thái
        Mail::to($rental->email)->send(new OrderMail($rental));
        Toastr::success('Status update successful.', 'Success!');
        return redirect()->to("/admin/booking-detail/".$rental->id);
    }
    public function cancel(Rental $rental){
        // cập nhật status cuả order thành 1 (cònfirm)
        $rental->update(["status"=>6]);
        // gửi email cho khách báo đơn đã đc chuyển trạng thái

        return redirect()->to("/admin/booking-detail/".$rental->id);
    }
    // end booking
    public function admin_cars() {
        $cars=Car::get();
        return view("admin.admin-cars",[
            "cars"=>$cars,
        ]);
    }
    public function admin_carsDelete(Car $car){
        $car->delete();
        return redirect()->to("/admin/cars");
    }
    public function admin_imageDelete(Gallery $gallery){
        $gallery->delete();
        return redirect()->to("/admin/cars");
    }
    public function admin_cartype() {
        $carTypes = CarType::orderBy("id", "desc")->paginate(10);
        return view("admin.admin-cartype",[
            "carTypes"=>$carTypes
        ]);
    }
    public function admin_cartypeCreate() {
        return view("admin.admin-addcartype");
    }
    public function admin_cartypeSave(Request $request) {
        $request->validate([
            "name"=>"required",
            "description"=>"required",
            "icon"=>"required"
        ],[
            // thong bao gi thi thong bao
        ]);
        $icon = null;
        if($request->hasFile("icon")){
            $file = $request->file("icon");
            $fileName = time().$file->getClientOriginalName();
            $path = public_path("images/select-form");
            $file->move($path,$fileName);
            $icon = "/images/select-form/".$fileName;
        }
        CarType::create([
            "name" => $request->get("name"),
            "slug"=>Str::slug($request->get("name")),
            "icon"=>$icon,
            "description"=>$request->get("description")
        ]);
        Toastr::success('Successful cartype creation.', 'Success!');
        return redirect()->to("/admin/car-type");
    }
    public function admin_cartypeEdit($id) {
        $carType = CarType::where("id", $id)->first();
        return view("admin.admin-cartypeUpdate", [
            "carTypes" => $carType
        ]);
    }
    public function admin_cartypeUpdate(Request $request, $id) {
        $request->validate([
            "name"=>"required",
            "description"=>"required"
        ],[
            // thong bao gi thi thong bao
        ]);
        $icon = null;
        if($request->hasFile("icon")){
            $file = $request->file("icon");
            $fileName = time().$file->getClientOriginalName();
            $path = public_path("images/select-form");
            $file->move($path,$fileName);
            $icon = "/images/select-form/".$fileName;

            CarType::where("id", $id)
                ->update([
                    "name" => $request->input("name"),
                    "slug"=>Str::slug($request->input("name")),
                    "icon"=>$icon,
                    "description"=>$request->input("description")
                ]);
        } else {
            CarType::where("id", $id)
                ->update([
                    "name" => $request->input("name"),
                    "slug"=>Str::slug($request->input("name")),
                    "description"=>$request->input("description")
                ]);
        }

        Toastr::success('Update successful.', 'Success!');
        return redirect()->to("/admin/car-type");
    }
    public function admin_cartypeDelete(CarType $carType) {
        $carType->delete();
        Toastr::success('Your file has been deleted.', 'Deleted!');
        return redirect()->to("/admin/car-type");
    }
    public function admin_addcar() {
        $cars=Car::get();
        $brands=Brand::get();
        $carTypes=CarType::get();
        return view("admin.admin-addcar",[
            "brands"=>$brands,
            "carTypes"=>$carTypes,
            "cars"=>$cars,
        ]);
    }
    public function admin_addcarimages(){
        $cars=Car::get();
        return view("admin.admin-addcar-images",[
            "cars"=>$cars
        ]);
    }
    public function admin_savecarimages(Request $request){
        $carId = $request->input("car_id");

        $thumbnails = [];
        if ($request->hasFile('thumbnail')) {
            foreach ($request->file('thumbnail') as $thumbnail) {
                $thumbnailExtension = $thumbnail->getClientOriginalExtension();
                $thumbnailName = uniqid() . '.' . $thumbnailExtension;
                $thumbnail->move(public_path('images/gallery'), $thumbnailName);
                $thumbnailPath = 'images/gallery/' . $thumbnailName;
                $thumbnails[] = $thumbnailPath;
            }
        }

        // Lưu các đối tượng thumbnail vào cơ sở dữ liệu
        foreach ($thumbnails as $thumbnailPath) {
            Gallery::create([
                'thumbnail' => $thumbnailPath,
                'car_id' => $carId
            ]);
        }

        // Trả về phản hồi JSON cho Dropzone
        return response()->json(['success' => true]);
    }
    public function admin_savecar(Request $request){
        $request->validate([
            "model"=>"required",
            "price"=>"required|numeric|min:0",
        ],[
            // thong bao gi thi thong bao
        ]);
        $thumbnail = null;
        if($request->hasFile("thumbnail")){
            $file = $request->file("thumbnail");
            $fileName = time().$file->getClientOriginalName();
            $path = public_path("images/cars");
            $file->move($path,$fileName);
            $thumbnail = "/images/cars/".$fileName;
        }
        $reverseSensor = $request->has('reverse_sensor') ? 1 : 0;
        $airConditioner = $request->has('airConditioner') ? 1 : 0;
        $driverAirbag = $request->has('driverAirbag') ? 1 : 0;
        $cdPlayer = $request->has('cDPlayer') ? 1 : 0;
        $brakeAssist = $request->has('brakeAssist') ? 1 : 0;
        $car = Car::create([
            'license_plate' => $request->get("license_plate"),
            'model' => $request->get("model"),
            'price' => $request->get("price"),
            'desposit' => $request->get("desposit"),
            'slug' => Str::slug($request->get("model")),
            'brand_id' => $request->get("brand_id"),
            'carType_id' => $request->get("carType_id"),
            'thumbnail' => $thumbnail,
            'fuelType' => $request->get("fuelType"),
            'transmission' => $request->get("transmission"),
            'km_limit' => $request->get("km_limit"),
            'modelYear' => $request->get("modelYear"),
            'reverse_sensor' => $reverseSensor,
            'airConditioner' => $airConditioner,
            'driverAirbag' => $driverAirbag,
            'cDPlayer' => $cdPlayer,
            'brakeAssist' => $brakeAssist,
            'seats' => $request->get("seats"),
            'status' => $request->get("status"),
            'description' => $request->get("description"),
            'rate' => 0,
        ]);

        $carId = $car->id;
        RentalRate::create([
            'car_id' => $carId,
            'rental_type' => 'rent by day',
            'price' => $request->get('rentalrate_price_day'),
        ]);
        RentalRate::create([
            'car_id' => $carId,
            'rental_type' => 'rent by hours',
            'price' => $request->get('rentalrate_price_hours'),
        ]);
        return redirect()->to("/admin/cars");
    }
    public function admin_carsEdit($id){
        $cars = Car::where("id", $id)->first();
        $brands=Brand::get();
        $carTypes=CarType::get();
        return view("admin.admin-carsUpdate", [
            "cars" => $cars,
            'brands'=>$brands,
            'carTypes'=>$carTypes,
        ]);
    }
    public function admin_carsUpdate(Request $request, $id) {
        $request->validate([
            "model"=>"required",
            "price"=>"required|numeric|min:0",
            'license_plate'=>'required',
            'desposit'=>'required',
            'brand_id'=>'required',
            'carType_id'=>'required',
            'fuelType'=>'required',
            'transmission'=>'required',
            'km_limit'=>'required',
            'modelYear'=>'required',

        ],[
            // thong bao gi thi thong bao
        ]);
        $reverseSensor = $request->has('reverse_sensor') ? 1 : 0;
        $airConditioner = $request->has('airConditioner') ? 1 : 0;
        $driverAirbag = $request->has('driverAirbag') ? 1 : 0;
        $cdPlayer = $request->has('cDPlayer') ? 1 : 0;
        $brakeAssist = $request->has('brakeAssist') ? 1 : 0;
        $thumbnail = null;
        if($request->hasFile("thumbnail")){
            $file = $request->file("thumbnail");
            $fileName = time().$file->getClientOriginalName();
            $path = public_path("images/cars");
            $file->move($path,$fileName);
            $thumbnail = "/images/cars/".$fileName;
        $car=Car::where("id", $id)
            ->update([
                'license_plate' => $request->get("license_plate"),
                'model' => $request->get("model"),
                'price' => $request->get("price"),
                'slug' => Str::slug($request->get("model")),
                'brand_id' => $request->get("brand_id"),
                'carType_id' => $request->get("carType_id"),
                'thumbnail' => $thumbnail,
                'fuelType' => $request->get("fuelType"),
                'transmission' => $request->get("transmission"),
                'km_limit' => $request->get("km_limit"),
                'modelYear' => $request->get("modelYear"),
                'reverse_sensor' => $reverseSensor,
                'airConditioner' => $airConditioner,
                'driverAirbag' => $driverAirbag,
                'cDPlayer' => $cdPlayer,
                'brakeAssist' => $brakeAssist,
                'seats' => $request->get("seats"),
                'status' => $request->get("status"),
                'description' => $request->get("description"),
                'rate' => 0,

            ]);



            RentalRate::where("rental_type", 'rent by day')
                ->update([
                    'car_id' => $car,
                    'price' => $request->get('rentalrate_price_day'),
                ]);

            RentalRate::where('rental_type', 'rent by hours')
                ->update([
                    'car_id' => $car,
                    'price' => $request->get('rentalrate_price_hours'),
                ]);
        }
    else {
            $car=Car::where("id", $id)
                ->update([
                    'license_plate' => $request->get("license_plate"),
                    'model' => $request->get("model"),
                    'price' => $request->get("price"),
                    'slug' => Str::slug($request->get("model")),
                    'brand_id' => $request->get("brand_id"),
                    'carType_id' => $request->get("carType_id"),
                    'fuelType' => $request->get("fuelType"),
                    'transmission' => $request->get("transmission"),
                    'km_limit' => $request->get("km_limit"),
                    'modelYear' => $request->get("modelYear"),
                    'reverse_sensor' => $reverseSensor,
                    'airConditioner' => $airConditioner,
                    'driverAirbag' => $driverAirbag,
                    'cDPlayer' => $cdPlayer,
                    'brakeAssist' => $brakeAssist,
                    'seats' => $request->get("seats"),
                    'status' => $request->get("status"),
                    'description' => $request->get("description"),
                    'rate' => 0,
                ]);


        RentalRate::where("rental_type", 'rent by day')
            ->update([
            'car_id' => $car,
            'price' => $request->get('rentalrate_price_day'),
        ]);

        RentalRate::where('rental_type', 'rent by hours')
            ->update([
            'car_id' => $car,
            'price' => $request->get('rentalrate_price_hours'),
        ]);
        }
        Toastr::success('Update successful.', 'Success!');
        return redirect()->to("/admin/cars");
    }
    // Start Brands
    public function admin_brand() {
        $brand = Brand::orderBy("id", "desc")->paginate(12);
        return view("admin.admin-brands",[
            "brand" => $brand
        ]);
    }
    public function admin_addbrand() {
        return view("admin.admin-addbrand");
    }
    public function admin_addbrandSave(Request $request) {
        $request->validate([
            "name"=>"required",
            "icon"=>"required"
        ],[
            // thong bao gi thi thong bao
        ]);
        $icon = null;
        if($request->hasFile("icon")){
            $file = $request->file("icon");
            $fileName = time().$file->getClientOriginalName();
            $path = public_path("images/icons");
            $file->move($path,$fileName);
            $icon = "/images/icons/".$fileName;
        }
        Brand::create([
            "name" => $request->get("name"),
            "slug"=>Str::slug($request->get("name")),
            "icon"=>$icon
        ]);
        Toastr::success('Successful service creation.', 'Success!');
        return redirect()->to("/admin/brands");
    }
    public function admin_brandEdit($id) {
        $brand = Brand::where("id", $id)->first();
        return view("admin.admin-brandUpdate", [
            "brand" => $brand
        ]);
    }
    public function admin_brandUpdate(Request $request, $id) {
        $request->validate([
            "name"=>"required",
        ],[
            // thong bao gi thi thong bao
        ]);
        $icon = null;
        if($request->hasFile("icon")){
            $file = $request->file("icon");
            $fileName = time().$file->getClientOriginalName();
            $path = public_path("images/select-form");
            $file->move($path,$fileName);
            $icon = "/images/select-form/".$fileName;

            Brand::where("id", $id)
                ->update([
                    "name" => $request->input("name"),
                    "slug"=>Str::slug($request->input("name")),
                    "icon"=>$icon,
                ]);
        } else {
            Brand::where("id", $id)
                ->update([
                    "name" => $request->input("name"),
                    "slug"=>Str::slug($request->input("name")),
                ]);
        }

        Toastr::success('Update successful.', 'Success!');
        return redirect()->to("/admin/brands");
    }
    public function admin_brandDelete(Brand $brand) {
        $brand->delete();
        Toastr::success('Your file has been deleted.', 'Deleted!');
        return redirect()->to("/admin/brands");
    }
    // end brand
    public function admin_contactquery() {
        $contactquery = ContactUsQuery::orderBy("id","desc")->paginate(10);
        return view("admin.admin-contactquery",[
            "contactquery"=>$contactquery
        ]);
    }
    public function admin_contactdetail() {
        return view("admin.admin-contactdetail");
    }

    //start customer
    public function admin_customer(Request $request) {
        $status = $request->get('status');

        $customers = User::all();
        $license = DrivingLicenses::all();

        //Loc theo status
        if ($status !== null) {
            $customers = $customers->where('status', $status);
        }

        return view("admin.admin-customers", [
            "customers" => $customers,
            "license" => $license
        ]);
    }


    public function admin_customer_detail($id) {
        $customer = User::find($id);
        $license = DrivingLicenses::where('user_id', $id)->first();
        $reviews = CarReview::where('user_id', $id)->get();
        return view("admin.admin-customers-detail",[
            "customer" => $customer,
            "license" => $license,
            "reviews" => $reviews
        ]);
    }

    public function confirm($id){
        $customer = User::find($id);
        $customer->status = 2;
        $customer->save();
        return redirect()->to("/admin/customers-detail/".$id);
    }

    public function invalid($id){
        $customer = User::find($id);
        $customer->status = 3;
        $customer->save();
        return redirect()->to("/admin/customers-detail/".$id);
    }
    //end customer

    // start service
    public function admin_service() {
        $service = Service::orderBy("id", "desc")->paginate(12);
        return view("admin.admin-service", [
            "service" => $service
        ]);
    }
    public function admin_serviceCreate() {
        return view("admin.admin-serviceCreate", [

        ]);
    }
    public function admin_serviceSave(Request $request) {
        $request->validate([
            "title"=>"required",
            "description" => "required",
            "price"=>"required|numeric|min:0",
        ],[
            // thong bao gi thi thong bao
        ]);
        Service::create([
            "title" => $request->get("title"),
            "description" => $request->get("description"),
            "price" => $request->get("price")
        ]);
        Toastr::success('Successful service creation.', 'Success!');
        return redirect()->to("/admin/services");
    }
    public function admin_serviceEdit($id) {
        $service = Service::where("id", $id)->first();
        return view("admin.admin-serviceUpdate", [
            "service" => $service
        ]);
    }
    public function admin_serviceUpdate(Request $request, $id) {
        $request->validate([
            "title"=>"required",
            "description" => "required",
            "price"=>"required|numeric|min:0",
        ],[
            // thong bao gi thi thong bao
        ]);
        Service::where("id", $id)
            ->update([
                "title" => $request->input("title"),
                "description" => $request->input("description"),
                "price" => $request->input("price")
            ]);
        Toastr::success('Update successful.', 'Success!');
        return redirect()->to("/admin/services");
    }
    public function admin_serviceDelete(Service $service) {
        $service->delete();
        Toastr::success('Your file has been deleted.', 'Deleted!');
        return redirect()->to("/admin/services");
    }
    // end service

    // start incident
    public function admin_incident() {
        $incidents = Incident::orderBy("id", "desc")->paginate(12);
        return view("admin.admin-incident", [
            "incidents" => $incidents
        ]);
    }
    public function admin_incidentCreate(Rental $rental) {
        return view("admin.admin-incidentCreate", [
            "rental" => $rental
        ]);
    }
    public function admin_incidentSave(Request $request, Rental $rental) {
        $request->validate([
            "title"=>"required",
            "description" => "required",
            "thumbnail" => "required",
            "expense"=>"required|numeric|min:0",
        ],[
            // thong bao gi thi thong bao
        ]);
        $thumbnail = null;
        if($request->hasFile("thumbnail")){
            $file = $request->file("thumbnail");
            $fileName = time().$file->getClientOriginalName();
            $path = public_path("images/incident");
            $file->move($path,$fileName);
            $thumbnail = "/images/incident/".$fileName;
        }
        Incident::create([
            "title" => $request->get("title"),
            "rental_id" => $rental->id,
            "description" => $request->get("description"),
            "expense" => $request->get("expense"),
            "thumbnail" => $thumbnail,
        ]);
        Toastr::success('Successful incident creation.', 'Success!');
        return redirect()->to("/admin/booking-detail/".$rental->id);

    }
    public function admin_incidentEdit($id) {
        $incident = Incident::find($id);
        return view("admin.admin-incidentUpdate", [
            "incident" => $incident
        ]);
    }
    public function admin_incidentUpdate(Request $request, $id) {
        $request->validate([
            "title"=>"required",
            "description" => "required",
            "expense"=>"required|numeric|min:0",
        ],[
            // thong bao gi thi thong bao
        ]);

        $thumbnail = null;
        if($request->hasFile("thumbnail")){
            $file = $request->file("thumbnail");
            $fileName = time().$file->getClientOriginalName();
            $path = public_path("images/incident");
            $file->move($path,$fileName);
            $thumbnail = "/images/incident/".$fileName;

            Incident::where("id", $id)
                ->update([
                    "title" => $request->get("title"),
                    "description" => $request->get("description"),
                    "expense" => $request->get("expense"),
                    "thumbnail" => $thumbnail
                ]);
        } else {
            Incident::where("id", $id)
                ->update([
                    "title" => $request->get("title"),
                    "description" => $request->get("description"),
                    "expense" => $request->get("expense"),
                ]);
        }

        Toastr::success('Update successful.', 'Success!');
        return redirect()->to("/admin/incidents");
    }
    public function admin_incidentDelete(Incident $incident) {
        $incident->delete();
        Toastr::success('Your file has been deleted.', 'Deleted!');
        return redirect()->to("/admin/incidents");
    }


}
