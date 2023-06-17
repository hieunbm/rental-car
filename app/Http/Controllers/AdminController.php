<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarType;
use App\Models\ContactUsQuery;
use App\Models\Incident;
use App\Models\Rental;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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

        return view("admin.admin-booking-detail", [
            "rental" => $rental,
            "numberdays" => $numberOfDays,
            "total" => $total
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
        return view("admin.admin-addcar");
    }
    public function admin_savecar(){

    }
    public function admin_brand() {
        return view("admin.admin-brands");
    }
    public function admin_addbrand() {
        return view("admin.admin-addbrand");
    }
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
    public function admin_incidentEdit() {

    }
    public function admin_incidentUpdate() {

    }
    public function admin_incidentDelete() {

    }


}
