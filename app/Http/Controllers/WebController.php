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
use Illuminate\Support\Facades\DB;

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
    public function car_search(Request $request) {
        $q = $request->get("q");
        $cars = Car::where("model", 'like', "%$q%")->get();
        $reviews = CarReview::whereIn("car_id", $cars->pluck('id')->all())->get();
        $priceday = RentalRate::where("car_id", $cars->pluck('id')->all())->where("rental_type", "rent by day")->get();

        $rates = []; // Mảng chứa số sao cho từng xe
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

        $count = $cars->count(); // hiển thị số lượng xe tìm được
        return view("web.car-search", [
            "cars" => $cars,
            "reviews" => $reviews,
            "priceday" => $priceday,
            "rates" => $rates,
            "count" => $count
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

        $pendingOrders = Rental::where('status', 0)->where('customer_id', $customer_id)->orderBy('id')->get();
        $confirmedOrders = Rental::where('status', 1)->where('customer_id', $customer_id)->orderBy('id')->get();
        $shippingOrders = Rental::where('status', 2)->where('customer_id', $customer_id)->orderBy('id')->get();
        $shippedOrders = Rental::where('status', 3)->where('customer_id', $customer_id)->orderBy('id')->get();
        $completedOrders = Rental::where('status', 4)->where('customer_id', $customer_id)->orderBy('id')->get();
        $cancelledOrders = Rental::where('status', 5)->where('customer_id', $customer_id)->orderBy('id')->get();
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
        return view("web.account-profile");
    }
}
