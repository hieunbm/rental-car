<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home() {
        return view("welcome");
    }
    public function car_list() {
        return view("web.car-list");
    }
    public function booking() {
        return view("web.booking");
    }
    public function about() {
        return view("web.about-us");
    }
    public function contact() {
        return view("web.contact");
    }
    public function car_detail() {
        return view("web.car-detail");
    }
    public function myOrders() {
        return view("web.account-booking");
    }
    public function dashboard(User $user) {
        $rental= Rental::limit(10)->get();
        return view("web.account-dashboard",[
            "user"=>$user,
            "rental"=>$rental,
            ]);
    }
    public function profile() {
        return view("web.account-profile");
    }
}
