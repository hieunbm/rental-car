<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarType;
use App\Models\ContactUsQuery;
use App\Models\Incident;
use App\Models\Rental;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function admin_dashboard() {
        return view("admin.dashboard");
    }
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
    public function admin_cars() {
        $cars=Car::get();
        return view("admin.admin-cars",[
            "cars"=>$cars,
        ]);
    }
    public function admin_cartype() {
        $carTypes = CarType::orderBy("id", "desc")->paginate(10);
        return view("admin.admin-cartype",[
            "carTypes"=>$carTypes
        ]);
    }
    public function admin_addcar() {
        $brands=Brand::get();
        $carTypes=CarType::get();
        return view("admin.admin-addcar",[
            "brands"=>$brands,
            "carTypes"=>$carTypes,
        ]);
    }
    public function admin_savecarimages(Request $request){
            $carId = $request->input('car_id');

            if ($request->hasFile('images')) {
                $images = $request->file('images');

                foreach ($images as $image) {
                    // Thực hiện xử lý và lưu ảnh vào đây
                }
            }

            // Thực hiện các xử lý khác, chẳng hạn như cập nhật cơ sở dữ liệu

            return redirect()->back()->with('success', 'Thêm ảnh thành công');
    }
    public function admin_savecar(Request $request){
        $request->validate([
            "model"=>"required",
            "price"=>"required|numeric|min:0",
            "qty"=>"required|numeric|min:0"
        ],[
            // thong bao gi thi thong bao
        ]);
        $thumbnail = null;
        if($request->hasFile("thumbnail")){
            $file = $request->file("thumbnail");
            $fileName = time().$file->getClientOriginalName();
            $path = public_path("uploads");
            $file->move($path,$fileName);
            $thumbnail = "/uploads/".$fileName;
        }
        if ($request->has('reverse_sensor')) {
            // Checkbox đã được chọn
            $reverseSensorValue = $request->input('reverse_sensor');
        } else {
            // Checkbox không được chọn
            $reverseSensorValue = "0"; // Giá trị mặc định khi checkbox không được chọn
        }
        Car::create([
           "model"
        ]);
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
    public function admin_customer() {
        return view("admin.admin-customers");
    }
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
