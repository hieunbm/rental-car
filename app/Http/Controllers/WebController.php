<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarReview;
use App\Models\CarType;
use App\Models\Gallery;
use App\Models\Rental;
use App\Models\RentalRate;
use App\Models\User;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home() {
        return view("welcome");
    }
    public function car_list() {
        $car=Car::paginate(12);
        $brand=Brand::limit(10)->get();
        $carType=CarType::limit(10)->get();
        return view("web.car-list",[
            "car"=>$car,
            "brand"=>$brand,
            "carType"=>$carType,
        ]);
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
    public function car_detail(Car $car) {
        $thumbnails = Gallery::where("car_id", $car->id)->get();
        $reviews = CarReview::where("car_id", $car->id)->get();
        $priceday = RentalRate::where("car_id", $car->id)->get();
        $rate = 0;
        $totals = 0;
        foreach ($reviews as $item) {
            $totals += $item->score;
            $rate = $totals / $reviews->count();
        }
        return view("web.car-detail", [
            "car" => $car,
            "thumbnails" => $thumbnails,
            "reviews" => $reviews,
            "priceday" => $priceday,
            "rate" => $rate
        ]);
    }
    public function myOrders() {
        return view("web.account-booking");
    }
    public function dashboard(User $user) {
        $rental= Rental::limit(10)->get();
        return view("web.account-dashboard",[
            'user'=>$user,
            "rental"=>$rental,
            ]);
    }
    public function profile() {
        return view("web.account-profile");
    }
}
