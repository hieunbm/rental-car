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
Route::get("/car-search", [\App\Http\Controllers\WebController::class, "car_search"]);
Route::get("/car-filter/brand/{brand:slug}", [\App\Http\Controllers\WebController::class, "car_filter_brand"]);
Route::get("/car-filter/type/{carType:slug}", [\App\Http\Controllers\WebController::class, "car_filter_type"]);
Route::get("/car-filter/price", [\App\Http\Controllers\WebController::class, "car_filter_price"]);
Route::get("/car-filter/seats/{seats}", [\App\Http\Controllers\WebController::class, "car_filter_seats"]);
Route::get("/about", [\App\Http\Controllers\WebController::class, "about"]);
Route::get("/contact", [\App\Http\Controllers\WebController::class, "contact"]);
Route::post("/contact/create", [\App\Http\Controllers\WebController::class, "contact_contactSave"]);
Route::get("/car/{car:slug}", [\App\Http\Controllers\WebController::class, "car_detail"]);
Route::get("/account-dashboard", [\App\Http\Controllers\WebController::class, "dashboard"]);
Route::get("/account-profile", [\App\Http\Controllers\WebController::class, "profile"]);
Route::get("/account-booking", [\App\Http\Controllers\WebController::class, "myOrders"]);
// website end

// admin start
Route::prefix("/admin")->middleware(["auth", "admin"])->group(function () {// middleware: phải đăng nhập thì ms vào đc
    Route::get("/", [App\Http\Controllers\AdminController::class, "admin_dashboard"]);
    Route::get("/booking", [App\Http\Controllers\AdminController::class, "admin_booking"]);
    Route::get("/booking-detail/{rental}", [App\Http\Controllers\AdminController::class, "admin_booking_detail"]);
    Route::get("/cars", [App\Http\Controllers\AdminController::class, "admin_cars"]);
    Route::get("/car-type", [App\Http\Controllers\AdminController::class, "admin_cartype"]);
    Route::get("/add-car", [App\Http\Controllers\AdminController::class, "admin_addcar"]);
    Route::post("/add-car", [App\Http\Controllers\AdminController::class, "admin_savecar"]);
    Route::post("/add-car/images", [App\Http\Controllers\AdminController::class, "admin_savecarimages"]);
    Route::get("/brands", [App\Http\Controllers\AdminController::class, "admin_brand"]);
    Route::get("/add-brand/create", [App\Http\Controllers\AdminController::class, "admin_addbrand"]);
    Route::post("/add-brand/create", [App\Http\Controllers\AdminController::class, "admin_addbrandSave"]);
    Route::get("/brand/edit/{id}", [App\Http\Controllers\AdminController::class, "admin_brandEdit"]);
    Route::get("/brand/edit/{id}", [App\Http\Controllers\AdminController::class, "admin_brandUpdate"]);
    Route::get("/brand/delete/{brand}", [App\Http\Controllers\AdminController::class, "admin_brandDelete"]);
    Route::get("/contact-query", [App\Http\Controllers\AdminController::class, "admin_contactquery"]);
    Route::get("/contact-query-detail", [App\Http\Controllers\AdminController::class, "admin_contactdetail"]);
    Route::get("/customers", [App\Http\Controllers\AdminController::class, "admin_customer"]);
    Route::get("/customers-detail/{id}", [App\Http\Controllers\AdminController::class, "admin_customer_detail"]);
    Route::get("/customers/confirm/{id}", [App\Http\Controllers\AdminController::class, "confirm"]);
    Route::get("/customers/invalid/{id}", [App\Http\Controllers\AdminController::class, "invalid"]);
    Route::get("/services", [App\Http\Controllers\AdminController::class, "admin_service"]);
    Route::get("/services/create", [App\Http\Controllers\AdminController::class, "admin_serviceCreate"]);
    Route::post("/services/create", [App\Http\Controllers\AdminController::class, "admin_serviceSave"]);
    Route::get("/services/edit/{id}", [App\Http\Controllers\AdminController::class, "admin_serviceEdit"]);
    Route::put("/services/edit/{id}", [App\Http\Controllers\AdminController::class, "admin_serviceUpdate"]);
    Route::get("/services/delete/{service}", [App\Http\Controllers\AdminController::class, "admin_serviceDelete"]);
    Route::get("/incidents", [App\Http\Controllers\AdminController::class, "admin_incident"]);
    Route::get("/incidents/create", [App\Http\Controllers\AdminController::class, "admin_incidentCreate"]);
    Route::post("/incidents/create", [App\Http\Controllers\AdminController::class, "admin_incidentSave"]);
    Route::get("/incidents/edit/{id}", [App\Http\Controllers\AdminController::class, "admin_incidentEdit"]);
    Route::put("/incidents/edit/{id}", [App\Http\Controllers\AdminController::class, "admin_incidentUpdate"]);
    Route::get("/incidents/delete/{incident}", [App\Http\Controllers\AdminController::class, "admin_incidentDelete"]);
});
// admin end

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

