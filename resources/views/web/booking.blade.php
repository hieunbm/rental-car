@extends('web.layout.layout')
@section("name")
    Booking
@endsection
@section("main")
    <!-- content begin -->
    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        @include('web.html.breadcrumb')
        <!-- section close -->

        <section id="section-hero" aria-label="section" class="no-top mt-80 sm-mt-0">
            <div class="container">
                <form method="POST" action="{{url("/booking")}}">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="spacer-single sm-hide"></div>
                            <div class="p-4 rounded-3 shadow-soft" data-bgcolor="#ffffff">
                                <div id='contact_form'>
                                    <div id="step-1" class="row">
                                        <div class="col-lg-6 mb30">
                                            <div class="row">
                                                <div class="col-lg-6 mb20">
                                                    <h5>Full Name</h5>
                                                    <input class="form-control" value="{{auth()->user()->name}}"
                                                           type="text" readonly/>
                                                    <div class="jls-address-preview jls-address-preview--hidden">
                                                        <div class="jls-address-preview__header">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb20">
                                                    <h5>Pick Up Location</h5>
                                                    <select name="pickup_location" id="pickup_location" onchange="showAddressInput()" class="form-control">
                                                        <option value="pick up the car at the store">pick up the car at the store</option>
                                                        <option value="pick up car at home (only 15km radius)">pick up car at home (only 15km radius)</option>
                                                    </select>
                                                    <div class="jls-address-preview jls-address-preview--hidden">
                                                        <div class="jls-address-preview__header">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb20">
                                                    <h5>Email</h5>
                                                    <input type="text" name="email" placeholder="sample@yourcompany.com"
                                                           autocomplete="off" class="form-control">
                                                    <div class="jls-address-preview jls-address-preview--hidden">
                                                        <div class="jls-address-preview__header">
                                                        </div>
                                                    </div>
                                                    @error("email")
                                                    <p class="text-danger"><i>{{$message}}</i></p>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 mb20">
                                                    <h5>Telephone</h5>
                                                    <input type="text" name="telephone" placeholder="+66-4353434"
                                                           autocomplete="off" class="form-control">
                                                    <div class="jls-address-preview jls-address-preview--hidden">
                                                        <div class="jls-address-preview__header">
                                                        </div>
                                                    </div>
                                                    @error("telephone")
                                                    <p class="text-danger"><i>{{$message}}</i></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 mb20">
                                                    <h5>Choose a rental type</h5>
                                                    <select name="rental_type" id="mySelect2" class="form-control"
                                                            onchange="updateInput()">
                                                        @foreach($rentalrate as $rt)
                                                            <option value="{{$rt->rental_type}}" >{{$rt->rental_type}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 mb20">
                                                    <h5>Price</h5>
                                                    <input name="car_price" class="form-control" type="text" id="myLable" readonly/>
                                                </div>
                                                <div class="col-lg-6 mb20">
                                                    <h5>Pick Up Date & Time</h5>
                                                    <div class="date-time-field">
                                                        <input type="text" id="date-picker" name="rental_date"
                                                               value="{{$rental_day}}">
                                                        <select name="rental_time" id="pickup-time">
                                                            <option selected disabled value="Select time">Time</option>
                                                            <option
                                                                {{ $rental_time == '00:00' ? 'selected' : '' }} value="00:00">
                                                                00:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '00:30' ? 'selected' : '' }}  value="00:30">
                                                                00:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '01:00' ? 'selected' : '' }}  value="01:00">
                                                                01:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '01:30' ? 'selected' : '' }}  value="01:30">
                                                                01:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '02:00' ? 'selected' : '' }}  value="02:00">
                                                                02:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '02:30' ? 'selected' : '' }}  value="02:30">
                                                                02:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '03:00' ? 'selected' : '' }}  value="03:00">
                                                                03:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '03:30' ? 'selected' : '' }}  value="03:30">
                                                                03:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '04:00' ? 'selected' : '' }}  value="04:00">
                                                                04:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '04:30' ? 'selected' : '' }}  value="04:30">
                                                                04:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '05:00' ? 'selected' : '' }}  value="05:00">
                                                                05:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '05:30' ? 'selected' : '' }}  value="05:30">
                                                                05:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '06:00' ? 'selected' : '' }} value="06:00">
                                                                06:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '06:30' ? 'selected' : '' }} value="06:30">
                                                                06:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '07:00' ? 'selected' : '' }} value="07:00">
                                                                07:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '07:30' ? 'selected' : '' }} value="07:30">
                                                                07:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '08:00' ? 'selected' : '' }} value="08:00">
                                                                08:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '08:30' ? 'selected' : '' }} value="08:30">
                                                                08:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '09:00' ? 'selected' : '' }} value="09:00">
                                                                09:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '09:30' ? 'selected' : '' }} value="09:30">
                                                                09:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '10:00' ? 'selected' : '' }} value="10:00">
                                                                10:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '10:30' ? 'selected' : '' }} value="10:30">
                                                                10:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '11:00' ? 'selected' : '' }} value="11:00">
                                                                11:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '11:30' ? 'selected' : '' }} value="11:30">
                                                                11:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '12:00' ? 'selected' : '' }} value="12:00">
                                                                12:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '12:30' ? 'selected' : '' }} value="12:30">
                                                                12:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '13:00' ? 'selected' : '' }} value="13:00">
                                                                13:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '13:30' ? 'selected' : '' }} value="13:30">
                                                                13:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '14:00' ? 'selected' : '' }} value="14:00">
                                                                14:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '14:30' ? 'selected' : '' }} value="14:30">
                                                                14:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '15:00' ? 'selected' : '' }} value="15:00">
                                                                15:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '15:30' ? 'selected' : '' }} value="15:30">
                                                                15:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '16:00' ? 'selected' : '' }} value="16:00">
                                                                16:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '16:30' ? 'selected' : '' }} value="16:30">
                                                                16:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '17:00' ? 'selected' : '' }} value="17:00">
                                                                17:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '17:30' ? 'selected' : '' }} value="17:30">
                                                                17:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '18:00' ? 'selected' : '' }} value="18:00">
                                                                18:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '18:30' ? 'selected' : '' }} value="18:30">
                                                                18:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '19:00' ? 'selected' : '' }} value="19:00">
                                                                19:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '19:30' ? 'selected' : '' }} value="19:30">
                                                                19:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '20:00' ? 'selected' : '' }} value="20:00">
                                                                20:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '20:30' ? 'selected' : '' }} value="20:30">
                                                                20:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '21:00' ? 'selected' : '' }} value="21:00">
                                                                21:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '21:30' ? 'selected' : '' }} value="21:30">
                                                                21:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '22:00' ? 'selected' : '' }} value="22:00">
                                                                22:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '22:30' ? 'selected' : '' }} value="22:30">
                                                                22:30
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '23:00' ? 'selected' : '' }} value="23:00">
                                                                23:00
                                                            </option>
                                                            <option
                                                                {{ $rental_time == '23:30' ? 'selected' : '' }} value="23:30">
                                                                23:30
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb20">
                                                    <h5>Expected number of days/hours</h5>
                                                    <input onchange="updateInput()" name="expected" id="expected" value="{{$expected}}" class="form-control" type="number"/>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb30" id="address_input" style="display: none;">
                                                <h5>Address</h5>
                                                <input type="text" name="address" id="address"
                                                       autocomplete="off" class="form-control"/>
                                                <div class="jls-address-preview jls-address-preview--hidden">
                                                    <div class="jls-address-preview__header">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb30">
                                                <h5>Message</h5>
                                                <textarea type="text" name="message" id="autocomplete"
                                                          autocomplete="off" class="form-control"></textarea>
                                                <div class="jls-address-preview jls-address-preview--hidden">
                                                    <div class="jls-address-preview__header">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb30">
                                                <div class="item_filter_group">
                                                    <h4>Accompanied service</h4>
                                                    <div class="de_form">
                                                        @foreach($services as $item)
                                                            <div class="de_checkbox">
                                                                <input id="vehicle_type_{{$item->id}}"
                                                                       name="services[]" type="checkbox"
                                                                       value="{{ $item->id }}" onchange="calculateTotal()">
                                                                <label
                                                                    for="vehicle_type_{{$item->id}}">{{$item->title}} (${{$item->price}})</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="d-flex justify-content-between mb-3 userdetails">
                                                <p class="fw-bold">{{$car->model}}</p>
                                                <p class="fw-lighter"><span
                                                        class="fas fa-dollar-sign"></span>{{$car->price}}</p>
                                            </div>
                                            <div id="my" class="carousel slide carousel-fade img-details"
                                                 data-bs-ride="carousel"
                                                 data-bs-interval="2000">
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#my" data-bs-slide-to="0"
                                                            class="active"
                                                            aria-current="true" aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#my" data-bs-slide-to="1"
                                                            aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#my" data-bs-slide-to="2"
                                                            aria-label="Slide 3"></button>
                                                </div>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img
                                                            src="{{$car->thumbnail}}"
                                                            class="d-block w-100">
                                                    </div>
                                                    @foreach($thumbnails as $item)
                                                        <div class="carousel-item">
                                                            <img
                                                                src="{{$item->thumbnail}}"
                                                                class="d-block w-100">
                                                        </div>
                                                    @endforeach

                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#my"
                                                        data-bs-slide="prev">
                                                    <div class="icon">
                                                        <span aria-hidden="true" class="arrow_left_alt"></span>
                                                    </div>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>

                                                <button class="carousel-control-next" type="button" data-bs-target="#my"
                                                        data-bs-slide="next">
                                                    <div class="icon">
                                                        <span aria-hidden="true" class="arrow_right_alt"></span>
                                                    </div>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                            <div class="item_filter_group justify-content-center mt-5">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h4>Specifications</h4>
                                                        <div class="de-spec">
                                                            <div class="d-row">
                                                                <span class="d-title">Body</span>
                                                                <spam class="d-value">Sedan</spam>
                                                            </div>
                                                            <div class="d-row">
                                                                <span class="d-title">Fuel Type</span>
                                                                <spam class="d-value">{{$car->fuelType}}</spam>
                                                            </div>
                                                            <div class="d-row">
                                                                <span class="d-title">Km limit</span>
                                                                <spam class="d-value">{{$car->km_limit}} Km</spam>
                                                            </div>
                                                            <div class="d-row">
                                                                <span class="d-title">Year</span>
                                                                <spam class="d-value">{{$car->modelYear}}</spam>
                                                            </div>
                                                            <div class="d-row">
                                                                <span class="d-title">Transmission</span>
                                                                <spam class="d-value">{{$car->transmission}}</spam>
                                                            </div>
                                                            <div class="d-row">
                                                                <span class="d-title">License plate</span>
                                                                <spam class="d-value">{{$car->license_plate}}</spam>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h4></h4>
                                                        <ul style="list-style: none; padding-left: 0">
                                                            <li>
                                                                @if($car->reverse_sensor == 1)
                                                                    <i style="color: #199e1c; margin-right: 10px;"
                                                                       class="fa fa-fw" aria-hidden="true"
                                                                       title="Copy to use check"></i>
                                                                @else
                                                                    <i style="color: #199e1c; margin-right: 10px;"
                                                                       class="fa fa-fw" aria-hidden="true"
                                                                       title="Copy to use close"></i>
                                                                @endif
                                                                Reverse sensor
                                                            </li>
                                                            <li>
                                                                @if($car->airConditioner == 1)
                                                                    <i style="color: #199e1c; margin-right: 10px;"
                                                                       class="fa fa-fw" aria-hidden="true"
                                                                       title="Copy to use check"></i>
                                                                @else
                                                                    <i style="color: #199e1c; margin-right: 10px;"
                                                                       class="fa fa-fw" aria-hidden="true"
                                                                       title="Copy to use close"></i>
                                                                @endif
                                                                Air Conditioner
                                                            </li>
                                                            <li>
                                                                @if($car->driverAirbag == 1)
                                                                    <i style="color: #199e1c; margin-right: 10px;"
                                                                       class="fa fa-fw" aria-hidden="true"
                                                                       title="Copy to use check"></i>
                                                                @else
                                                                    <i style="color: #199e1c; margin-right: 10px;"
                                                                       class="fa fa-fw" aria-hidden="true"
                                                                       title="Copy to use close"></i>
                                                                @endif
                                                                Driver Airbag
                                                            </li>
                                                            <li>
                                                                @if($car->cDPlayer == 1)
                                                                    <i style="color: #199e1c; margin-right: 10px;"
                                                                       class="fa fa-fw" aria-hidden="true"
                                                                       title="Copy to use check"></i>
                                                                @else
                                                                    <i style="color: #199e1c; margin-right: 10px;"
                                                                       class="fa fa-fw" aria-hidden="true"
                                                                       title="Copy to use close"></i>
                                                                @endif
                                                                CD Player
                                                            </li>
                                                            <li>
                                                                @if($car->brakeAssist == 1)
                                                                    <i style="color: #199e1c; margin-right: 10px;"
                                                                       class="fa fa-fw" aria-hidden="true"
                                                                       title="Copy to use check"></i>
                                                                @else
                                                                    <i style="color: #199e1c; margin-right: 10px;"
                                                                       class="fa fa-fw" aria-hidden="true"
                                                                       title="Copy to use close"></i>
                                                                @endif
                                                                Brake Assist
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-5 justify-content-center">
                                                <div class="col-lg-12 mb30">
                                                    <div class="item_filter_group">
                                                        <h4>Payment Method</h4>
                                                        <div class="row">
                                                            <div class="col-md-auto col-sm-auto ">
                                                                <div class="checkout__input__checkbox">
                                                                    <label for="payment">
                                                                        VN Pay
                                                                        <input name="desposit_type" type="radio" id="payment" value="VNPAY">
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-auto col-sm">
                                                                <div class="checkout__input__checkbox">
                                                                    <label for="paypal">
                                                                        Paypal
                                                                        <input name="desposit_type" type="radio" id="paypal" value="PAYPAL">
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-auto col-sm">
                                                                <div class="checkout__input__checkbox">
                                                                    <label for="momo">
                                                                        MoMo
                                                                        <input name="desposit_type" type="radio" id="momo" value="MOMO">
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-auto col-sm">
                                                                <div class="checkout__input__checkbox">
                                                                    <label for="COD">
                                                                        COD
                                                                        <input name="desposit_type" type="radio" id="COD" value="COD">
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error("desposit_type")
                                                        <p class="text-danger"><i>{{$message}}</i></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card position-sticky top-0">
                                                <div class="p-3 bg-light bg-opacity-10">
                                                    <h6 class="card-title mb-3">Order Summary</h6>
                                                    <div class="d-flex justify-content-between mb-1 small">
                                                        <span>Subtotal</span> <span id="subtotal">$0.00</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-1 small">
                                                        <span>Service</span> <span id="service">$0.00</span>
                                                    </div>

                                                    <hr>
                                                    <div class="d-flex justify-content-between mb-4 small">
                                                        <span>TOTAL</span> <strong class="text-dark" id="total">$0.00</strong>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-4 small">
                                                        <span>DEPOSIT</span> <strong class="text-dark" id="deposit">$0.00</strong>
                                                    </div>
                                                    <div class="form-check mb-1 small">
                                                        <input class="form-check-input" type="checkbox" value="" id="tnc">
                                                        <label class="form-check-label" for="tnc">
                                                            I agree to the <a href="#">terms and conditions</a>
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3 small">
                                                        <input class="form-check-input" type="checkbox" value="" id="subscribe">
                                                        <label class="form-check-label" for="subscribe">
                                                            Get emails about product updates and events. If you change your mind, you can unsubscribe at any time. <a href="#">Privacy Policy</a>
                                                        </label>
                                                    </div>
                                                    <input type="hidden" value="" id="desposit_amount" name="desposit_amount" />
                                                    <input type="hidden" value="" id="total_amount" name="total_amount" />
                                                    <button type="submit" class="btn btn-primary w-100 mt-2">Car Deposit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="spacer-single"></div>
        </section>
    </div>
    <!-- content close -->
    <a href="#" id="back-to-top"></a>
    <style>

        .carousel-control-prev {
            transform: translateX(-50%);
            opacity: 1;
        }

        .carousel-control-prev:hover .fas.fa-arrow-left {
            transform: translateX(-5px);
        }

        .carousel-control-next {
            transform: translateX(50%);
            opacity: 1;
        }

        .carousel-control-next:hover .fas.fa-arrow-right {
            transform: translateX(5px);
        }

        .fas.fa-arrow-left,
        .fas.fa-arrow-right {
            font-size: 0.8rem;
            transition: all .2s ease;
        }

        .icon {
            width: 30px;
            height: 30px;
            background-color: #f8f9fa;
            color: #78ca5c;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transform-origin: center;
            opacity: 1;
        }

        .fas,
        ::placeholder {
            font-size: 12px;
        }


    </style>
    <script>
        var rentalMethodData = {
            @foreach ($rentalrate as $rentalMethod)
            "{{ $rentalMethod->rental_type }}": "{{ $rentalMethod->price }}",
            @endforeach
        };

        function updateInput() {
            var select = document.getElementById("mySelect2");
            var lable = document.getElementById("myLable");
            var selectedId = select.value;

            lable.value = rentalMethodData[selectedId];

            var carPrice = document.getElementById('myLable').value;
            var days = parseFloat(document.getElementById('expected').value);

            // Calculate subtotal based on pickup date and car price
            var subtotal = parseFloat(days) * parseFloat(carPrice);

            // Update the subtotal value on the UI
            document.getElementById('subtotal').textContent = '$' + subtotal.toFixed(2);

            // Recalculate the total whenever the subtotal changes
            calculateTotal();
        }

        function showAddressInput() {
            var pickupLocation = document.getElementById('pickup_location').value;
            var addressInput = document.getElementById('address_input');

            if (pickupLocation === 'pick up car at home (only 15km radius)') {
                addressInput.style.display = 'block';
            } else {
                addressInput.style.display = 'none';
            }
        }

        function calculateTotal() {
            var subtotal = parseFloat(document.getElementById('subtotal').textContent.replace('$', ''));

            // Calculate additional services total
            var additionalServicesTotal = 0;

            @foreach($services as $item)
            if (document.getElementById('vehicle_type_{{$item->id}}').checked) {
                additionalServicesTotal += {{$item->price}};
            }
            @endforeach


            // Calculate the total by adding subtotal and additional services total
            var total = 0;

            total = subtotal + additionalServicesTotal;
            var deposit = 0;

            deposit = total * (30/100);
            // Update the total value on the UI
            document.getElementById('total').textContent = '$' + total.toFixed(2);
            document.getElementById('service').textContent = '$' + additionalServicesTotal.toFixed(2);
            document.getElementById('deposit').textContent = '$' + deposit.toFixed(2);
            document.getElementById('desposit_amount').value = deposit;
            document.getElementById('total_amount').value = total;

        }


    </script>
@endsection
