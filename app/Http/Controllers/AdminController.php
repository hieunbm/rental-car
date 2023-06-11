<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use App\Models\Rental;
use Illuminate\Http\Request;

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

        return view("admin.admin-booking-detail", [
            "rental" => $rental
        ]);
    }
    public function admin_cars() {
        return view("admin.admin-cars");

    }
    public function admin_cartype() {
        return view("admin.admin-cartype");
    }
    public function admin_addcar() {
        return view("admin.admin-addcar");
    }
    public function admin_brand() {
        return view("admin.admin-brands");
    }
    public function admin_addbrand() {
        return view("admin.admin-addbrand");
    }
    public function admin_contactquery() {
        return view("admin.admin-contactquery");
    }
    public function admin_contactdetail() {
        return view("admin.admin-contactdetail");
    }
    public function admin_customer() {
        return view("admin.admin-customers");
    }
    public function admin_service() {
        return view("admin.admin-service");
    }
    public function admin_incident() {
        return view("admin.admin-incident");
    }
}
