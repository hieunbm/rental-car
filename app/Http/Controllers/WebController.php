<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarReview;
use App\Models\CarStatuses;
use App\Models\CarType;
use App\Models\Category;
use App\Models\ContactUsQuery;
use App\Models\Product;
use App\Utilities\VNPay;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Models\DrivingLicenses;
use App\Models\Gallery;
use App\Models\Rental;
use App\Models\RentalRate;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use function Webmozart\Assert\Tests\StaticAnalysis\email;

class WebController extends Controller
{
    public function home()
    {
        $car = Car::orderBy("id", "desc")->limit(6)->get();
        $countCar = Car::count();
        $countBrand = Brand::count();
        $countRental = Rental::count();
        return view("welcome", [
            "car" => $car,
            "countCar" => $countCar,
            "countBrand" => $countBrand,
            "countRental" => $countRental,
        ]);
    }

    //Start CarList
    private function mergeCode($cars)
    { //Hàm này dùng để gộp code chung của trang Cars cho gọn
        $brands = Brand::all();
        $carTypes = CarType::all();
        $reviews = CarReview::whereIn("car_id", $cars->pluck('id')->all())->get();
        $rates = [];//mảng chứa số sao cho từng xe

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
        $seatsOptions = [2, 4, 5, 7, 16, 29]; //mảng chứa số ghế ngồi của xe
        return [
            "brands" => $brands,
            "carTypes" => $carTypes,
            "reviews" => $reviews,
            "rates" => $rates,
            "seatsOptions" => $seatsOptions
        ];
    }

    public function car_list()
    {
        $cars = Car::where("status", 0)->paginate(18);
        $merge = $this->mergeCode($cars);

        return view("web.car-list", $merge, [
            "cars" => $cars
        ]);
    }

    public function car_search(Request $request)
    {
        $q = $request->get("q");
        $cars = Car::where("model", 'like', "%$q%")->get();
        $merge = $this->mergeCode($cars);

        $count = $cars->count(); //hiển thị số lượng xe tìm thấy
        return view("web.car-search", array_merge($merge, [
            "cars" => $cars,
            "count" => $count
        ]));
    }

    public function car_filter_brand(Brand $brand)
    {
        $cars = Car::where('brand_id', $brand->id)->get();
        $merge = $this->mergeCode($cars);

        return view("web.car-filter", array_merge($merge, [
            "cars" => $cars,
            "selectedBrand" => $brand->name
        ]));
    }

    public function car_filter_type(CarType $carType)
    {
        $cars = Car::where('carType_id', $carType->id)->get();
        $merge = $this->mergeCode($cars);

        return view("web.car-filter", array_merge($merge, [
            "cars" => $cars,
            "selectedCarType" => $carType->name
        ]));
    }

    public function car_filter_price(Request $request)
    {
        $query = Car::query();
        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');
            $selectedCarPrice = "$$minPrice - $$maxPrice";
            $query->whereBetween('price', [$minPrice, $maxPrice]);

        }
        $cars = $query->get();
        $merge = $this->mergeCode($cars);

        return view("web.car-filter", array_merge($merge, [
            "cars" => $cars,
            "selectedCarPrice" => $selectedCarPrice
        ]));
    }

    public function car_filter_seats($seats)
    {
        $cars = Car::where('seats', $seats)->get();
        $merge = $this->mergeCode($cars);

        return view("web.car-filter", array_merge($merge, [
            "cars" => $cars,
            "selectedSeats" => $seats
        ]));
    }

    //End CarList

    // Start Booking
    public function checkCar(Request $request)
    {
        $request->validate([
            'rental_time' => 'required',
            'expected' => 'required',
        ], [
            'rental_time.required' => 'You must choose the number of hours',
        ]);

        $car_id = $request->get("car_id");
        $rental_dayString = $request->get("rental_date");
        $rental_timeString = $request->get("rental_time");
        $expected = $request->get("expected");

        $rental_day = Carbon::createFromFormat('F j, Y', $rental_dayString);
        $rental_time = Carbon::createFromFormat('H:i', $rental_timeString);

        $rental_date = $rental_day->setTime($rental_time->hour, $rental_time->minute, $rental_time->second);

        $car = Car::find($car_id);
        Session::put('car', $car);
        Session::put('rental_date', $rental_date);
        Session::put('expected', $expected);

        if ($rental_date->isPast()) {
            //chỉ được chọn thời gian từ thời điểm hiện tại trở đi
            return redirect()->back()->withErrors(['rental_date' => 'Invalid time']);
        }

        //kiểm tra trạng thái giấy phép lái xe
        $user = auth()->user();
        switch ($user->status) {
            case 2:
                return redirect()->to("/booking");
            default:
                return redirect()->to("/account-profile-licenses");
        }
    }

    public function booking()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
        if (Session::has('car')) {
            $car = Session::get('car');
            $services = Service::all();
            $thumbnails = Gallery::where("car_id", $car->id)->limit(2)->get();
            $rental_date = Session::get('rental_date');
            $expected = Session::get('expected');

            $rental_day = $rental_date->format('F j, Y');
            $rental_time = $rental_date->format('H:i');

            $rentalrate = RentalRate::where("car_id", $car->id)->get();
//            dd($rentalrate);

        } else {
            return redirect('/car-list');
        }

        return view("web.booking", [
            "car" => $car,
            "services" => $services,
            "thumbnails" => $thumbnails,
            "rentalrate" => $rentalrate,
            "rental_day" => $rental_day,
            "rental_time" => $rental_time,
            "expected" => $expected,
        ]);
    }

    public function placeOrder(Request $request)
    {
        $request->validate([// mảng các quy tắt
            'rental_time' => 'required',
            "rental_date" => "required",
            "expected" => "required",
            "pickup_location" => "required",
            "telephone" => "required|min:10|max:12",// ít nhất 10 và nhiều nhất 12
            "email" => "required",
            "rental_type" => "required",
            "car_price" => "required|numeric|min:0",
        ], [// mảng các thông điệp
            'rental_time.required' => 'You must choose the number of hours',
        ]);

        if (!auth()->check()) {
            return redirect('/login');
        }
        // reset rental_date and expected
        $rental_dayString = $request->get("rental_date");
        $rental_timeString = $request->get("rental_time");
        $expected = $request->get("expected");
        $rental_day = Carbon::createFromFormat('F j, Y', $rental_dayString);
        $rental_time = Carbon::createFromFormat('H:i', $rental_timeString);
        $rental_date = $rental_day->setTime($rental_time->hour, $rental_time->minute, $rental_time->second);

        if ($rental_date->isPast()) {
            //chỉ được chọn thời gian từ thời điểm hiện tại trở đi
            return redirect()->back()->withErrors(['rental_date' => 'Invalid time']);
        }

        Session::put('rental_date', $rental_date);
        Session::put('expected', $expected);

        if (Session::has('car')) {
            $car = Session::get('car');
            $rental_date = Session::get('rental_date');
            $expected = Session::get('expected');
        } else {
            return redirect('/car-list');
        }
        // lưu trữ rental
        $rental = new Rental();
        $rental->user_id = auth()->user()->id;
        $rental->car_id = $car->id;
        $rental->rental_date = $rental_date;
        $rental->expected = $expected;
        $rental->pickup_location = $request->get("pickup_location");
        $rental->email = $request->get("email");
        $rental->telephone = $request->get("telephone");
        $rental->rental_type = $request->get("rental_type");
        $rental->car_price = $request->get("car_price");
        $rental->car_price = $request->get("car_price");
        $rental->desposit_type = $request->get("desposit_type");
        $rental->desposit_amount = $request->get("desposit_amount");
        $rental->total_amount = $request->get("total_amount");
        $rental->status = 0;
        $rental->save();
        // Lưu dữ liệu từ checkbox vào bảng trung gian service_rental
        if ($request->has('services')) {
            $selectedServices = $request->input('services');

            $services = Service::whereIn('id', $selectedServices)->get();

            foreach ($services as $service) {
                $rental->service()->attach($service->id, ['price' => $service->price]);
            }
        }

        // Kiểm tra và lưu message vào bảng rentals
        $message = $request->input('message');
        if ($message) {
            $rental->message = $message;
            $rental->save();
        }
        // Kiểm tra và lưu address vào bảng rentals
        $address = $request->input('address');
        if ($address) {
            $rental->address = $address;
            $rental->save();
        }
        // Đổi trạng thái xe
        $car->status = 1;
        $car->save();

        // thanh toan bang paypal
        if ($rental->desposit_type == "PAYPAL") {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successTransaction', ["rental" => $rental->id]),
                    "cancel_url" => route('cancelTransaction', ["rental" => $rental->id]),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => number_format($rental->desposit_amount, 2, ".", "")
                        ]
                    ]
                ]
            ]);

            if (isset($response['id']) && $response['id'] != null) {

                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }

            }
        } else if ($rental->desposit_type == "VNPAY") {
            // thanh toan = vnpay
//            $data=$request->all();
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://127.0.0.1:8000/success-transaction/".$rental->id;
            $vnp_TmnCode = "YNSXI5ZN";//Mã website tại VNPAY
            $vnp_HashSecret = "GKSNDWHVYQOWDPQQLHTQJCPQQVGUMIQL"; //Chuỗi bí mật

            $vnp_TxnRef = $rental->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = 'Noi dung thanh toan';
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = $rental->car->desposit * 2300000;
    $vnp_Locale = 'VN';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
//    $vnp_ExpireDate = $_POST['txtexpire'];
    //Billing
//    $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
//    $vnp_Bill_Email = $_POST['txt_billing_email'];
//    $fullName = trim($_POST['txt_billing_fullname']);
//    if (isset($fullName) && trim($fullName) != '') {
//        $name = explode(' ', $fullName);
//        $vnp_Bill_FirstName = array_shift($name);
//        $vnp_Bill_LastName = array_pop($name);
//    }
//    $vnp_Bill_Address=$_POST['txt_inv_addr1'];
//    $vnp_Bill_City=$_POST['txt_bill_city'];
//    $vnp_Bill_Country=$_POST['txt_bill_country'];
//    $vnp_Bill_State=$_POST['txt_bill_state'];
//    // Invoice
//    $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
//    $vnp_Inv_Email=$_POST['txt_inv_email'];
//    $vnp_Inv_Customer=$_POST['txt_inv_customer'];
//    $vnp_Inv_Address=$_POST['txt_inv_addr1'];
//    $vnp_Inv_Company=$_POST['txt_inv_company'];
//    $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
//    $vnp_Inv_Type=$_POST['cbo_inv_type'];
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
//        "vnp_ExpireDate"=>$vnp_ExpireDate,

//        "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
//        "vnp_Bill_Email"=>$vnp_Bill_Email,
//        "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
//        "vnp_Bill_LastName"=>$vnp_Bill_LastName,
//        "vnp_Bill_Address"=>$vnp_Bill_Address,
//        "vnp_Bill_City"=>$vnp_Bill_City,
//        "vnp_Bill_Country"=>$vnp_Bill_Country,
//        "vnp_Inv_Phone"=>$vnp_Inv_Phone,
//        "vnp_Inv_Email"=>$vnp_Inv_Email,
//        "vnp_Inv_Customer"=>$vnp_Inv_Customer,
//        "vnp_Inv_Address"=>$vnp_Inv_Address,
//        "vnp_Inv_Company"=>$vnp_Inv_Company,
//        "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
//        "vnp_Inv_Type"=>$vnp_Inv_Type
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
//    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
//        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
//    }

    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
            header('Location: ' . $vnp_Url);
            die();
        // vui lòng tham khảo thêm tại code demo
        } else if ($rental->desposit_type == "MOMO") {
            // thanh toan bang momo
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Payment via momo";
            $amount_usd = $rental->desposit_amount;
            $amount_vnd = $amount_usd * 23000;
            $orderId = time() ."";
            $redirectUrl = "http://127.0.0.1:8000/booking";
            $ipnUrl = "http://127.0.0.1:8000/booking";
            $extraData = "";

                $requestId = time() . "";
                $requestType = "payWithATM";
                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount_vnd . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                $signature = hash_hmac("sha256", $rawHash, $secretKey);
                $data = array('partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    "storeId" => "MomoTestStore",
                    'requestId' => $requestId,
                    'amount' => $amount_vnd,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'lang' => 'vi',
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature);
                $result = $this->execPostRequest($endpoint, json_encode($data));
                $jsonResult = json_decode($result, true);  // decode json

                //Just a example, please check more in there
                return redirect()->to($jsonResult['payUrl']);
        }
        // xóa session
        session()->forget("car");
        session()->forget("rental_date");
        session()->forget("expected");
        // chuyển đến trang home
        Toastr::success('Successful booking.', 'Success!');
        return redirect()->to("/order-invoice/" . $rental->id);
    }

    public function successTransaction(Rental $rental, Request $request)
    {
        $rental->update(["is_desposit_paid" => true, "status" => 1]);// đã thanh toán, trạng thái về xác nhận
        Toastr::success('Deposit payment successful.', 'Success!');
        return redirect()->to("/order-invoice/" . $rental->id);
    }

    public function cancelTransaction(Request $request)
    {
        return "error";
    }

    public function receive(Request $request, Rental $rental) {
        if ($rental->status == 2 && auth()->check() == true) {
            return view("web.receiveCar", [
                "rental" => $rental
            ]);
        } else {
            return abort(404);
        }
    }
    public function receiveSave(Request $request, Rental $rental) {

        $request->validate([// mảng các quy tắt
            "thumbnail_1" => "required",
            "thumbnail_2" => "required",
            "note" => "required",
        ], [// mảng các thông điệp

        ]);
        if ($rental->status == 2) {
            $thumbnail_1 = null;
            $thumbnail_2 = null;

            if($request->hasFile("thumbnail_1")){
                $file = $request->file("thumbnail_1");
                $fileName = time().$file->getClientOriginalName();
                $path = public_path("images/car-status");
                $file->move($path,$fileName);
                $thumbnail_1 = "/images/car-status/".$fileName;
            }
            if($request->hasFile("thumbnail_2")){
                $file = $request->file("thumbnail_2");
                $fileName = time().$file->getClientOriginalName();
                $path = public_path("images/car-status");
                $file->move($path,$fileName);
                $thumbnail_2 = "/images/car-status/".$fileName;
            }

            CarStatuses::create([
                "rental_id" =>$rental->id ,
                "note" => $request->get("note"),
                "thumbnail_1"=>$thumbnail_1,
                "thumbnail_2"=>$thumbnail_2,
            ]);

            $rental->status = 3;
            $rental->save();

            Toastr::success('Successfully received the car.', 'Success!');
            return redirect()->to("/order-invoice/".$rental->id);
        } else {
            return abort(404);
        }
    }

    public function review_reviewCreate(Rental $rental){
        if ($rental->status == 5 && $rental->is_reviewed == false && auth()->check() == true) {
            return view("web.review", [
                "rental" => $rental
            ]);
        } else {
            return abort(404);
        }
    }
    public function review(Request $request, $rentalId){
        {
            $rental = Rental::find($rentalId);
            if (!$rental) {
                abort(404);
            }

            if (!auth()->check()) {
                return redirect('/login');
            }

            // Kiểm tra xem rental có được trả chưa

            if (!$rental->is_reviewed) {
                // Xử lý đánh giá

                $score = $request->input('score');
                $message = $request->input('message');

                // Kiểm tra tính hợp lệ của đánh giá

                if ($score < 1 || $score > 5) {
                    return response("Đánh giá phải từ 1 đến 5 sao", 400);
                }

                // Lưu đánh giá vào cơ sở dữ liệu
                $review = new CarReview();
                $review->user_id = auth()->user()->id;
                $review->car_id = $rental->car_id;
                $review->score = $score;
                $review->message = $message;
                $review->save();

                $rental->is_reviewed = true;
                $rental->save();

                $rate = 0;
                $scores = 0;
                $reviews = CarReview::where("car_id", $rental->car_id)->get();
                foreach ($reviews as $item){
                    $scores += $item->score;
                }
                $rate = number_format($scores/$reviews->count(), 1);

                // update rate car
                $car = Car::find($rental->car_id);
                $car->rate = $rate;
                $car->save();


            } else {
                return response("Xe đã được trả trước đó", 400);
            }
            return redirect()->to('/car-list')->with('success', 'Đánh giá đã được tạo thành công.');
        }
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function about()
    {
        $OverallQuantityOfVehicles = Car::orderBy("id", "desc")->limit(6)->get();
        $OverallQuantityOfBrands = Brand::count();
        $OverallQuantityOfRental = Rental::count();
        return view("web.about-us", [
            "OverallQuantityOfVehicles" => $OverallQuantityOfVehicles,
            "OverallQuantityOfBrands" => $OverallQuantityOfBrands,
            "OverallQuantityOfRental" => $OverallQuantityOfRental,
        ]);
    }

    public function contact()
    {
        return view("web.contact");
    }

    public function contact_contactSave(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "phone" => "required|numeric|min:0",
            "message" => "required",
        ], [
            // thong bao gi thi thong bao
        ]);

        if (!auth()->check()) {
            return redirect('/login');
        }
        ContactUsQuery::create([
            "user_id" => auth()->user()->id,
            "name" => $request->get("name"),
            "email" => $request->get("email"),
            "phone" => $request->get("phone"),
            "message" => $request->get("message"),
            "status" => 0
        ]);
        return redirect()->to("/contact");
    }

    public function detailRental(Rental $rental) {
        $user = auth()->user();
        if ($rental->user_id == $user->id) {
            return view("web.invoice", [
                'user' => $user,
                "rental" => $rental
            ]);
        } else {
            return abort(404);
        }

    }

    public function car_detail(Car $car)
    {
        $thumbnails = Gallery::where("car_id", $car->id)->get();
        $reviews = CarReview::where("car_id", $car->id)->orderBy("id", "desc")->paginate(3);
        $review_total = CarReview::where("car_id", $car->id)->get();
        $rentalrate = RentalRate::where("car_id", $car->id)->get();
        return view("web.car-detail", [
            "car" => $car,
            "thumbnails" => $thumbnails,
            "reviews" => $reviews,
            "rate" => $car->rate,
            "rentalrate" => $rentalrate,
            "review_total" => $review_total
        ]);
    }
    // End Booking

    //Start account-booking
    public function myOrders()
    {
        $user = auth()->user();
        $customer_id = $user->id; // Chi lay nhung don hang cua tai khoan đang đăng nhập

        $pendingOrders = Rental::where('status', 0)->where('user_id', $customer_id)->orderBy('id')->get();
        $confirmedOrders = Rental::where('status', 1)->where('user_id', $customer_id)->orderBy('id')->get();
        $inProgress = Rental::where('status', 2)->where('user_id', $customer_id)->orderBy('id')->get();
        $completedOrders = Rental::where('status', 3)->where('user_id', $customer_id)->orderBy('id')->get();
        $cancelledOrders = Rental::where('status', 4)->where('user_id', $customer_id)->orderBy('id')->get();
        return view("web.account-booking", [
            'user' => $user,
            'pendingOrders' => $pendingOrders,
            'confirmedOrders' => $confirmedOrders,
            'inProgress' => $inProgress,
            'completedOrders' => $completedOrders,
            'cancelledOrders' => $cancelledOrders
        ]);
    }

    //End account-booking

    public function dashboard(User $user)
    {
        $rental = Rental::limit(10)->where("user_id", auth()->user()->id)->get();
        $rentalCount = DB::table('rental')->where("user_id", auth()->user()->id)->count();
        $rentalUpComing = DB::table('rental')->where("user_id", auth()->user()->id)->where("status", 0)->count();
        $rentalCancel = DB::table('rental')->where("user_id", auth()->user()->id)->where("status", 2)->count();
        return view("web.account-dashboard", [
            'rentalCount' => $rentalCount,
            'user' => $user,
            "rental" => $rental,
            "rentalUpComing" => $rentalUpComing,
            "rentalCancel" => $rentalCancel,
        ]);
    }

    //Start account profile
    public function profile()
    {
        $user = auth()->user();
        return view("web.account-profile", [
            'user' => $user,
        ]);
    }

    public function updateProfileSave(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "phone" => "required|min:10|max:12",
            "old_password" => "required",
            "new_password" => "required|min:8|confirmed",
        ], [
            "email.email" => "Please enter the correct email format",
            "min" => "Phone number must be more than :min characters",
            "max" => "Phone number must be less than :max characters",
            "new_password.min" => "Password must be more than :min characters",
            "confirmed" => "The new password confirmation does not match.",
        ]);

        $user = auth()->user();
        if (!Hash::check($request->old_password, $user->password)) { //kiểm tra mật khẩu cũ xem đúng chưa
            return redirect()->back()->withErrors(["old_password" => "The old password is incorrect"]);
        }
        if (Hash::check($request->new_password, $user->password)) { //nếu mật khẩu mới trùng với mật khẩu cũ thì hiện thông báo
            return redirect()->back()->withErrors(["new_password" => "Old and new passwords match"]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->new_password) { //lưu mật khẩu mới
            $user->password = Hash::make($request->new_password);
        }
        $user->save();

        return redirect()->to("/account-profile")->with("success", "Profile updated successfully");
    }

    public function profileLicenses()
    {
        $user = auth()->user();
        return view("web.account-profile-licenses", [
            'user' => $user,
        ]);
    }

    public function updateLicensesSave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'license_number' => 'required|min:10|max:14',
            'issue_date' => 'required|date_format:Y-m-d',
            'expiration_date' => 'required|date_format:Y-m-d',
            'thumbnail_1' => 'required|image',
            'thumbnail_2' => 'required|image',
        ], [
            'required' => 'Please complete all information',
            'min' => 'Must enter at least :min characters',
            'max' => 'Enter a value not exceeding :max characters',
            'image' => 'The file must be an image',
            'date_format' => 'You entered the wrong date format',
        ]);

        //Cap nhap lai ten nguoi dung neu can
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->save();

        //Thong bao nếu người dùng điền quá 10 năm
        $expirationDate = Carbon::createFromFormat('Y-m-d', $request->input('expiration_date'));
        $currentDate = Carbon::now();
        if ($expirationDate->diffInYears($currentDate) > 10 || $expirationDate->diffInYears($currentDate) < 0) {
            return redirect()->back()->withErrors(['expiration_date' => 'Your license term exceeds 10 years']);
        }
        //Thông báo nếu người dùng điền ngày phát hành lớn hơn ngày hết hạn
        $issueDate = Carbon::createFromFormat('Y-m-d', $request->input('issue_date'));
        if ($expirationDate <= $issueDate) {
            return redirect()->back()->withErrors(['expiration_date' => 'The expiration date must be greater than the issue date']);
        }


        //Lưu chữ thông tin giấy phép lái xe được tạo mới hoặc cập nhập -> rồi lưu vào database
        $drivingLicense = DrivingLicenses::firstOrNew(['user_id' => auth()->id()]);
        $drivingLicense->license_number = $request->input('license_number');
        $drivingLicense->issue_date = Carbon::createFromFormat('Y-m-d', $request->input('issue_date'));
        $drivingLicense->expiration_date = $expirationDate;

        //Tạo thư mục uploadLicenses
        $path = public_path('uploadLicenses');
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        //Lưu ảnh vào uploadLicenses
        $thumbnail1Uploaded = $request->file('thumbnail_1');
        $thumbnail1Name = $thumbnail1Uploaded->getClientOriginalName();
        $thumbnail1Uploaded->move($path, $thumbnail1Name);
        $drivingLicense->thumbnail_1 = 'uploadLicenses/' . $thumbnail1Name;

        $thumbnail2Uploaded = $request->file('thumbnail_2');
        $thumbnail2Name = $thumbnail2Uploaded->getClientOriginalName();
        $thumbnail2Uploaded->move($path, $thumbnail2Name);
        $drivingLicense->thumbnail_2 = 'uploadLicenses/' . $thumbnail2Name;

        $drivingLicense->save();

        //Cập nhập trạng thái
        if ($user->status == 0) {
            $user->status = 1;
        } elseif ($user->status == 2) {
            $user->status = 1;
        } elseif ($user->status == 3) {
            $user->status = 1;
        }

        $user->save();

        return redirect()->to('/account-profile-licenses')->with("success", "Your driver's license information has been updated successfully");
    }
    //End account profile
    public function favoriteCar()  {
        $cars = session()->has("favoriteCar")?session()->get("favoriteCar"):[];
        return view("web.account-favorite-cars",[
            "cars"=>$cars
        ]);
    }
    public function addFavoriteCar(Car $car)  {
        $cars = session()->has("favoriteCar")?session()->get("favoriteCar"):[];
        foreach ($cars as $item){
            if($item->id == $car->id){
                session(["favoriteCar"=>$cars]);
                return redirect()->to("/account-favorite-cars");
            }
        }
        $cars[] = $car;
        session(["favoriteCar"=>$cars]);
        return redirect()->to("/account-favorite-cars");
    }
    public function deleteFavoriteCar(Car $car) {
        $cars = session()->get("favoriteCar");

        if($cars) {
            foreach ($cars as $key => $item) {
                if($item->id == $car->id){
                    unset($cars[$key]);
                    session(["favoriteCar"=>$cars]);
                    break;
                }
            }
        }
        return redirect()->to("/account-favorite-cars");
    }
}
