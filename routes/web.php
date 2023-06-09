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
// website start
Route::get('/', [\App\Http\Controllers\WebController::class, "home"]);
Route::get("/car-list", [\App\Http\Controllers\WebController::class, "car_list"]);
Route::get("/about", [\App\Http\Controllers\WebController::class, "about"]);
Route::get("/contact", [\App\Http\Controllers\WebController::class, "contact"]);
Route::get("/car", [\App\Http\Controllers\WebController::class, "car_detail"]);
Route::get("/account-dashboard", [\App\Http\Controllers\WebController::class, "dashboard"]);
Route::get("/account-profile", [\App\Http\Controllers\WebController::class, "profile"]);
Route::get("/account-booking", [\App\Http\Controllers\WebController::class, "myOrders"]);
// website end

// admin start
Route::prefix("/admin")->group(function () {// middleware: phải đăng nhập thì ms vào đc
    Route::get("/", [App\Http\Controllers\AdminController::class, "admin_dashboard"]);
    Route::get("/booking", [App\Http\Controllers\AdminController::class, "admin_booking"]);
    Route::get("/booking-detail", [App\Http\Controllers\AdminController::class, "admin_booking_detail"]);
    Route::get("/cars", [App\Http\Controllers\AdminController::class, "admin_cars"]);
    Route::get("/car-type", [App\Http\Controllers\AdminController::class, "admin_cartype"]);
    Route::get("/add-car", [App\Http\Controllers\AdminController::class, "admin_addcar"]);
    Route::get("/brands", [App\Http\Controllers\AdminController::class, "admin_brand"]);
    Route::get("/add-brand", [App\Http\Controllers\AdminController::class, "admin_addbrand"]);
    Route::get("/contact-query", [App\Http\Controllers\AdminController::class, "admin_contactquery"]);
    Route::get("/contact-query-detail", [App\Http\Controllers\AdminController::class, "admin_contactdetail"]);
    Route::get("/customers", [App\Http\Controllers\AdminController::class, "admin_customer"]);
    Route::get("/services", [App\Http\Controllers\AdminController::class, "admin_service"]);
    Route::get("/incidents", [App\Http\Controllers\AdminController::class, "admin_incident"]);
});
// admin end

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

