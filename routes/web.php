<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\WebController::class, "home"]);

Route::get("/car-list", [\App\Http\Controllers\WebController::class, "car_list"]);

Route::get("/booking", [\App\Http\Controllers\WebController::class, "booking"]);

Route::get("/about", [\App\Http\Controllers\WebController::class, "about"]);

Route::get("/contact", [\App\Http\Controllers\WebController::class, "contact"]);

Route::get("/car", [\App\Http\Controllers\WebController::class, "car_detail"]);

Route::get("/account-dashboard", [\App\Http\Controllers\WebController::class, "dashboard"]);

Route::get("/account-profile", [\App\Http\Controllers\WebController::class, "profile"]);

Route::get("/account-booking", [\App\Http\Controllers\WebController::class, "myOrders"]);
