<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
    public function dashboard() {
        return view("web.account-dashboard");
    }
    public function profile() {
        return view("web.account-profile");
    }
}
