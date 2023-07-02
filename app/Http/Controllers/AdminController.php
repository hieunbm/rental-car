<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function admin_dashboard() {
        return view("admin.dashboard");
    }
    // start booking
    public function admin_booking() {
        $rentals = Rental::orderBy("id", "asc")->paginate(12);
        return view("admin.admin-booking", [
            "rentals" => $rentals
        ]);
    }
    public function admin_booking_detail(Rental $rental) {

        $startDate = Carbon::parse($rental->rental_date);; // Ngày bắt đầu thuê
        $endDate = Carbon::parse($rental->return_date); // Ngày kết thúc thuê
        $numberOfDays = $startDate->diffInDays($endDate);
        $services = $rental->service;
        $total = 0;
        foreach ($services as $item){
            $total += $item->price;
        }
        $totalFee = 0;
        foreach ($rental->incident as $item){
            $totalFee += $item->expense;
        }

        return view("admin.admin-booking-detail", [
            "rental" => $rental,
            "numberdays" => $numberOfDays,
            "total" => $total,
            "totalFee" => $totalFee
        ]);
    }
    public function confirmOrder(Rental $rental){
        // cập nhật status cuả order thành 1 (cònfirm)
        $rental->update(["status"=>1]);
        // gửi email cho khách báo đơn đã đc chuyển trạng thái

        return redirect()->to("/admin/booking-detail/".$rental->id);
    }
    public function inProgress(Rental $rental){
        // cập nhật status cuả order thành 1 (cònfirm)
        $rental->update(["status"=>2]);
        // gửi email cho khách báo đơn đã đc chuyển trạng thái

        return redirect()->to("/admin/booking-detail/".$rental->id);
    }
    public function complete(Rental $rental){
        // cập nhật status cuả order thành 1 (cònfirm)
        $rental->update(["status"=>3]);
        // gửi email cho khách báo đơn đã đc chuyển trạng thái

        return redirect()->to("/admin/booking-detail/".$rental->id);
    }
    public function cancel(Rental $rental){
        // cập nhật status cuả order thành 1 (cònfirm)
        $rental->update(["status"=>4]);
        // gửi email cho khách báo đơn đã đc chuyển trạng thái

        return redirect()->to("/admin/booking-detail/".$rental->id);
    }
    // start booking
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
        }
        CarType::create([
            "name" => $request->get("name"),
            "slug"=>Str::slug($request->get("name")),
            "icon"=>$icon,
            "description"=>$request->get("description")
        ]);
        return redirect()->to("/admin/car-type");
    }
    public function admin_cartypeEdit($id) {

    }
    public function admin_cartypeUpdate(Request $request, $id) {

    }
    public function admin_cartypeDelete(CarType $carType) {
        $carType->delete();
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
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('images/gallery'), $thumbnailName);
            $thumbnailPath = 'images/gallery/' . $thumbnailName;
        }

        Gallery::create([
            'thumbnail' => $thumbnailPath,
            'car_id'=>$request->get("car_id")
        ]);

        return redirect()->to("/admin/cars");
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
        Car::create([
            'license_plate'=>$request->get("license_plate"),
            'model'=>$request->get("model"),
            'price'=>$request->get("price"),
            'slug'=>Str::slug($request->get("name")),
            'brand_id'=>$request->get("brand_id"),
            'carType_id'=>$request->get("carType_id"),
            'thumbnail'=>$thumbnail,
            'fuelType'=>$request->get("fuelType"),
            'transmission'=>$request->get("transmission"),
            'km_limit'=>$request->get("km_limit"),
            'modelYear'=>$request->get("modelYear"),
            'reverse_sensor'=>$request->get("reverse_sensor"),
            'airConditioner'=>$request->get("airConditioner"),
            'driverAirbag'=>$request->get("driverAirbag"),
            'cDPlayer'=>$request->get("cDPlayer"),
            'brakeAssist'=>$request->get("brakeAssist"),
            'seats'=>$request->get("seats"),
            'status'=>$request->get("status"),
            'description'=>$request->get("description"),
            'rate'=>$request->get("rate"),
        ]);
        RentalRate::create([
            'car_id'=>$request->get('car_id'),
            'rental_type'=>$request->get('rental_type'),
            'price'=>$request->get('rentalrate_price'),
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
            "name"=>"required",
        ],[
            // thong bao gi thi thong bao
        ]);
        Car::where("id", $id)
            ->update([
                "name" => $request->input("car"),
            ]);
        return redirect()->to("/admin/cars");
    }
    public function admin_brand() {
        $brand = Brand::orderBy("id", "desc")->paginate(2);
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
        Service::where("id", $id)
            ->update([
                "name" => $request->input("brand"),
            ]);
        return redirect()->to("/admin/brands");
    }
    public function admin_brandDelete(Brand $brand) {
        $brand->delete();
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
        $service = Service::orderBy("id", "desc")->paginate(2);
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
        return redirect()->to("/admin/services");
    }
    public function admin_serviceDelete(Service $service) {
        $service->delete();
        return redirect()->to("/admin/services");
    }
    // end service

    // start incident
    public function admin_incident() {
        $incidents = Incident::orderBy("id", "desc")->paginate(6);
        return view("admin.admin-incident", [
            "incidents" => $incidents
        ]);
    }
    public function admin_incidentCreate() {
        return view("admin.admin-incidentCreate");
    }
    public function admin_incidentSave(Request $request) {
        $request->validate([
            "title"=>"required",
            "rental_id"=>"required",
            "description" => "required",
            "expense"=>"required|numeric|min:0",
        ],[
            // thong bao gi thi thong bao
        ]);
        Incident::create([
            "title" => $request->get("title"),
            "rental_id" => $request->get("rental_id"),
            "description" => $request->get("description"),
            "expense" => $request->get("expense"),
            "status" => 0,
        ]);
        return redirect()->to("/admin/incidents");

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
            "rental_id"=>"required",
            "description" => "required",
            "expense"=>"required|numeric|min:0",
        ],[
            // thong bao gi thi thong bao
        ]);
        Incident::where("id", $id)
            ->update([
                "title" => $request->get("title"),
                "rental_id" => $request->get("rental_id"),
                "description" => $request->get("description"),
                "expense" => $request->get("expense"),
            ]);
        return redirect()->to("/admin/incidents");
    }
    public function admin_incidentDelete(Incident $incident) {
        $incident->delete();
        return redirect()->to("/admin/incidents");
    }


}
