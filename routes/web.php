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
Route::get("/car/{car:slug}", [\App\Http\Controllers\WebController::class, "car_detail"]);

Route::prefix("/")->middleware(["auth"])->group(function () {//
    Route::get("/booking", [\App\Http\Controllers\WebController::class, "booking"]);
    Route::post("/booking", [\App\Http\Controllers\WebController::class, "placeOrder"]);
    Route::get("/order-invoice/{rental}", [\App\Http\Controllers\WebController::class, "detailRental"]);
    Route::get("/booking/cancel/{rentalId}", [\App\Http\Controllers\WebController::class, "cancel"]);
    Route::post("/contact/create", [\App\Http\Controllers\WebController::class, "contact_contactSave"]);

    Route::match(['get', 'post'],"/car/check", [\App\Http\Controllers\WebController::class, "checkCar"]);
    Route::get("/account-dashboard", [\App\Http\Controllers\WebController::class, "dashboard"]);
    //Account Profile Start
    Route::get("/account-profile", [\App\Http\Controllers\WebController::class, "profile"]);
    Route::post("/account-profile", [\App\Http\Controllers\WebController::class, "updateProfileSave"]);
    Route::get("/account-profile-licenses", [\App\Http\Controllers\WebController::class, "profileLicenses"]);
    Route::post("/account-profile-licenses", [\App\Http\Controllers\WebController::class, "updateLicensesSave"]);

    //Account Profile End
    Route::get("/account-booking", [\App\Http\Controllers\WebController::class, "myOrders"]);

    Route::get("/account-favorite-cars", [\App\Http\Controllers\WebController::class, "favoriteCar"]);
    Route::get("/account-favorite-cars/add/{car}", [\App\Http\Controllers\WebController::class, "addFavoriteCar"]);
    Route::get("/account-favorite-cars/delete/{car}", [\App\Http\Controllers\WebController::class, "deleteFavoriteCar"]);

    // receive start
    Route::get("/receive/{rental}", [\App\Http\Controllers\WebController::class, "receive"]);
    Route::post("/receive/{rental}", [\App\Http\Controllers\WebController::class, "receiveSave"]);
    // receive end

    // Review Start
    Route::get("/review/{rental}", [\App\Http\Controllers\WebController::class, "review_reviewCreate"]);
    Route::post("/review/{rentalId}", [\App\Http\Controllers\WebController::class, "review"]);
    // Review End
});





// 2 cái này dùng cho paypal
Route::get('/success-transaction/{rental}', [\App\Http\Controllers\WebController::class, 'successTransaction'])->name('successTransaction');
Route::get('/nhan-ket-qua/{rental}', [\App\Http\Controllers\WebController::class, 'nhanKetQua']);
Route::get('/cancel-transaction/{rental}', [\App\Http\Controllers\WebController::class, 'cancelTransaction'])->name('cancelTransaction');

// website end
//VNPAY

// admin start
Route::prefix("/admin")->middleware(["auth", "admin"])->group(function () {// middleware: phải đăng nhập thì ms vào đc
    Route::get("/", [App\Http\Controllers\AdminController::class, "admin_dashboard"]);
    Route::get("/booking", [App\Http\Controllers\AdminController::class, "admin_booking"]);
    Route::get("/booking-detail/{rental}", [App\Http\Controllers\AdminController::class, "admin_booking_detail"]);
    Route::get("/booking/comfirm/{rental}", [App\Http\Controllers\AdminController::class, "confirmOrder"]);
    Route::get("/booking/car-handover/{rental}", [App\Http\Controllers\AdminController::class, "carHandoverOrder"]);
    Route::get("/booking/in-progress/{rental}", [App\Http\Controllers\AdminController::class, "inProgress"]);
    Route::get("/booking/return-car/{rental}", [App\Http\Controllers\AdminController::class, "returnCar"]);
    Route::get("/booking/complete/{rental}", [App\Http\Controllers\AdminController::class, "complete"]);
    Route::get("/booking/cancel/{rental}", [App\Http\Controllers\AdminController::class, "cancel"]);
    Route::get("/cars", [App\Http\Controllers\AdminController::class, "admin_cars"]);
    Route::get("/cars/delete/{car}",[App\Http\Controllers\AdminController::class,"admin_carsDelete"]);
    Route::get("/images/delete/{gallery}",[App\Http\Controllers\AdminController::class,"admin_imageDelete"]);
    Route::get("/cars/edit/{id}", [App\Http\Controllers\AdminController::class, "admin_carsEdit"]);
    Route::put("/cars/edit/{id}", [App\Http\Controllers\AdminController::class, "admin_carsUpdate"]);
    Route::get("/car-type", [App\Http\Controllers\AdminController::class, "admin_cartype"]);
    Route::get("/cartype/create", [App\Http\Controllers\AdminController::class, "admin_cartypeCreate"]);
    Route::post("/cartype/create", [App\Http\Controllers\AdminController::class, "admin_cartypeSave"]);
    Route::get("/cartype/edit/{id}", [App\Http\Controllers\AdminController::class, "admin_cartypeEdit"]);
    Route::put("/cartype/edit/{id}", [App\Http\Controllers\AdminController::class, "admin_cartypeUpdate"]);
    Route::get("/cartype/delete/{carType}", [App\Http\Controllers\AdminController::class, "admin_cartypeDelete"]);
    Route::get("/add-car", [App\Http\Controllers\AdminController::class, "admin_addcar"]);
    Route::post("/add-car", [App\Http\Controllers\AdminController::class, "admin_savecar"]);
    Route::get("/add-car/images", [App\Http\Controllers\AdminController::class, "admin_addcarimages"]);
    Route::post("/add-car/images", [App\Http\Controllers\AdminController::class, "admin_savecarimages"]);
    Route::get("/brands", [App\Http\Controllers\AdminController::class, "admin_brand"]);
    Route::get("/add-brand", [App\Http\Controllers\AdminController::class, "admin_addbrand"]);
    Route::post("/add-brand/create", [App\Http\Controllers\AdminController::class, "admin_addbrandSave"]);
    Route::get("/add-brand/edit/{id}", [App\Http\Controllers\AdminController::class, "admin_brandEdit"]);
    Route::put("/add-brand/edit/{id}", [App\Http\Controllers\AdminController::class, "admin_brandUpdate"]);
    Route::get("/add-brand/delete/{brand}", [App\Http\Controllers\AdminController::class, "admin_brandDelete"]);
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
    Route::get("/incidents/create/{rental}", [App\Http\Controllers\AdminController::class, "admin_incidentCreate"]);
    Route::post("/incidents/create/{rental}", [App\Http\Controllers\AdminController::class, "admin_incidentSave"]);
    Route::get("/incidents/edit/{id}", [App\Http\Controllers\AdminController::class, "admin_incidentEdit"]);
    Route::put("/incidents/edit/{id}", [App\Http\Controllers\AdminController::class, "admin_incidentUpdate"]);
    Route::get("/incidents/delete/{incident}", [App\Http\Controllers\AdminController::class, "admin_incidentDelete"]);
});
// admin end

Auth::routes();
Route::get('/home', [App\Http\Controllers\WebController::class, 'home']);

