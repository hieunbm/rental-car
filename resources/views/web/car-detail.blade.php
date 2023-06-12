@extends('web.layout.layout')
@section("name")
    {{$car->model}}
@endsection
@section("main")
    <!-- content begin -->
    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        @include('web.html.breadcrumb')
        <!-- section close -->

        <section id="section-car-details">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div id="slider-carousel" class="owl-carousel">
                            <div class="item">
                                <img src="{{$car->thumbnail}}" alt="">
                            </div>
                            @foreach($thumbnails as $item)
                                <div class="item">
                                    <img src="{{$item->thumbnail}}" alt="">
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-12">
                            <h3>Information</h3>
                            <div class="spacer30"></div>
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Description</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Review</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><p>{{$car->description}}</p></div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    @foreach($reviews as $item)
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <p>
                                                            <a class="float-left" href="#">
                                                                <strong>
                                                                    @if($item->customer == auth()->user())
                                                                        Me
                                                                    @else
                                                                        {{$item->customer->name}}
                                                                    @endif
                                                                </strong>
                                                            </a>
                                                            @if($item->score == 0)
                                                                <span class="float-end"><i class="fa fa-star"></i></span>
                                                                <span class="float-end"><i class="fa fa-star"></i></span>
                                                                <span class="float-end"><i class="fa fa-star"></i></span>
                                                                <span class="float-end"><i class="fa fa-star"></i></span>
                                                                <span class="float-end"><i class="fa fa-star"></i></span>
                                                            @endif
                                                            @if($item->score == 1)
                                                                <span class="float-end"><i class="fa fa-star"></i></span>
                                                                <span class="float-end"><i class="fa fa-star"></i></span>
                                                                <span class="float-end"><i class="fa fa-star"></i></span>
                                                                <span class="float-end"><i class="fa fa-star"></i></span>
                                                                <span class="float-end"><i class="text-warning fa fa-star"></i></span>
                                                            @endif
                                                            @if($item->score == 2)
                                                                <span class="float-end"><i class="fa fa-star"></i></span>
                                                                <span class="float-end"><i class="fa fa-star"></i></span>
                                                                <span class="float-end"><i class="fa fa-star"></i></span>
                                                                <span class="float-end"><i class="text-warning fa fa-star"></i></span>
                                                                <span class="float-end"><i class="text-warning fa fa-star"></i></span>
                                                            @endif
                                                            @if($item->score == 3)
                                                                <span class="float-end"><i class="fa fa-star"></i></span>
                                                                <span class="float-end"><i class="fa fa-star"></i></span>
                                                                <span class="float-end"><i class="text-warning fa fa-star"></i></span>
                                                                <span class="float-end"><i class="text-warning fa fa-star"></i></span>
                                                                <span class="float-end"><i class="text-warning fa fa-star"></i></span>
                                                            @endif
                                                            @if($item->score == 4)
                                                                <span class="float-end"><i class="fa fa-star"></i></span>
                                                                <span class="float-end"><i class="text-warning fa fa-star"></i></span>
                                                                <span class="float-end"><i class="text-warning fa fa-star"></i></span>
                                                                <span class="float-end"><i class="text-warning fa fa-star"></i></span>
                                                                <span class="float-end"><i class="text-warning fa fa-star"></i></span>
                                                            @endif
                                                            @if($item->score == 5)
                                                                <span class="float-end"><i class="text-warning fa fa-star"></i></span>
                                                                <span class="float-end"><i class="text-warning fa fa-star"></i></span>
                                                                <span class="float-end"><i class="text-warning fa fa-star"></i></span>
                                                                <span class="float-end"><i class="text-warning fa fa-star"></i></span>
                                                                <span class="float-end"><i class="text-warning fa fa-star"></i></span>
                                                            @endif
                                                        </p>
                                                        <div class="clearfix"></div>
                                                        <p>{{$item->message}}</p>
                                                        <span class="float-end">{{$item->created_at}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <h3>{{$car->model}}</h3>
                        <style>

                            .ratings{
                                margin-right:10px;
                            }

                            .ratings i{
                                color:#cecece;
                                font-size:20px;
                            }

                            .rating-color{
                                color:#fbc634 !important;
                            }

                            .review-count{
                                font-weight:400;
                                margin-bottom:2px;
                                font-size:16px !important;
                            }
                        </style>
                        <div style="margin-bottom: 15px" class="d-flex justify-content-between align-items-center">
                            <div class="ratings">
                                @if($rate == 5)
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                @elseif($rate < 5 && $rate >= 4)
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star"></i>
                                @elseif($rate < 4 && $rate >= 3)
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                @elseif($rate < 3 && $rate >= 2)
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                @elseif($rate < 2 && $rate >= 1)
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                @else
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                @endif
                            </div>
                            <h5 class="review-count">{{$reviews->count()}} Reviews <span class="rating-color">({{$rate}}/5)</span></h5>
                        </div>
                        <div class="spacer-10"></div>

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

                        <div class="spacer-single"></div>

                        <h4>Features</h4>
                        <ul class="ul-style-2">
                            @if($car->reverse_sensor == 1)
                                <li>Reverse sensor</li>
                            @endif
                            @if($car->airConditioner == 1)
                                <li>Air Conditioner</li>
                            @endif
                            @if($car->cDPlayer == 1)
                                <li>CD Player</li>
                            @endif
                            @if($car->brakeAssist == 1)
                                <li>Brake Assist</li>
                            @endif
                        </ul>
                    </div>

                    <div class="col-lg-3">
                        <div class="de-price text-center">
                            Daily rate
                            @foreach($priceday as $item)
                                <h3>${{$item->price}}</h3>
                            @endforeach
                        </div>
                        <div class="spacer-30"></div>
                        <div class="de-box mb25">
                            <form name="contactForm" id='contact_form' method="post">
                                <h4>Booking this car</h4>

                                <div class="spacer-20"></div>

                                <div class="row">
                                    <div class="col-lg-12 mb20">
                                        <h5>Pick Up Location</h5>
                                        <select name="PickupLocation" id="mySelect"  class="form-control">
                                            <option>Chose Location</option>
                                            <option>pick up the car at the store</option>
                                            <option>pick up car at home (only 15km radius)</option>
                                        </select>
                                        <div class="jls-address-preview jls-address-preview--hidden">
                                            <div class="jls-address-preview__header">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb20">
                                        <h5>Choose a rental type</h5>
                                        <select name="rental rate" id="mySelect2"  class="form-control" onchange="updateInput()">
                                            <option selected>Choose Rental Type</option>
                                            @foreach($rentalrate as $rt)
                                                <option value="{{$rt->id}}">{{$rt->rental_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-12 mb20">
                                        <h5>Price</h5>
                                        <input type="text" id="myLable" readonly/>
                                    </div>
                                    <div class="col-lg-12 mb20">
                                        <h5>Pick Up Date & Time</h5>
                                        <div class="date-time-field">
                                            <input type="text" id="date-picker" name="Pick Up Date" value="">
                                            <select name="Pick Up Time" id="pickup-time">
                                                <option selected disabled value="Select time">Time</option>
                                                <option value="00:00">00:00</option>
                                                <option value="00:30">00:30</option>
                                                <option value="01:00">01:00</option>
                                                <option value="01:30">01:30</option>
                                                <option value="02:00">02:00</option>
                                                <option value="02:30">02:30</option>
                                                <option value="03:00">03:00</option>
                                                <option value="03:30">03:30</option>
                                                <option value="04:00">04:00</option>
                                                <option value="04:30">04:30</option>
                                                <option value="05:00">05:00</option>
                                                <option value="05:30">05:30</option>
                                                <option value="06:00">06:00</option>
                                                <option value="06:30">06:30</option>
                                                <option value="07:00">07:00</option>
                                                <option value="07:30">07:30</option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:30">08:30</option>
                                                <option value="09:00">09:00</option>
                                                <option value="09:30">09:30</option>
                                                <option value="10:00">10:00</option>
                                                <option value="10:30">10:30</option>
                                                <option value="11:00">11:00</option>
                                                <option value="11:30">11:30</option>
                                                <option value="12:00">12:00</option>
                                                <option value="12:30">12:30</option>
                                                <option value="13:00">13:00</option>
                                                <option value="13:30">13:30</option>
                                                <option value="14:00">14:00</option>
                                                <option value="14:30">14:30</option>
                                                <option value="15:00">15:00</option>
                                                <option value="15:30">15:30</option>
                                                <option value="16:00">16:00</option>
                                                <option value="16:30">16:30</option>
                                                <option value="17:00">17:00</option>
                                                <option value="17:30">17:30</option>
                                                <option value="18:00">18:00</option>
                                                <option value="18:30">18:30</option>
                                                <option value="19:00">19:00</option>
                                                <option value="19:30">19:30</option>
                                                <option value="20:00">20:00</option>
                                                <option value="20:30">20:30</option>
                                                <option value="21:00">21:00</option>
                                                <option value="21:30">21:30</option>
                                                <option value="22:00">22:00</option>
                                                <option value="22:30">22:30</option>
                                                <option value="23:00">23:00</option>
                                                <option value="23:30">23:30</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb20">
                                        <h5>Return Date & Time</h5>
                                        <div class="date-time-field">
                                            <input type="text" id="date-picker-2" name="Collection Date" value="">
                                            <select name="Collection Time" id="collection-time">
                                                <option selected disabled value="Select time">Time</option>
                                                <option value="00:00">00:00</option>
                                                <option value="00:30">00:30</option>
                                                <option value="01:00">01:00</option>
                                                <option value="01:30">01:30</option>
                                                <option value="02:00">02:00</option>
                                                <option value="02:30">02:30</option>
                                                <option value="03:00">03:00</option>
                                                <option value="03:30">03:30</option>
                                                <option value="04:00">04:00</option>
                                                <option value="04:30">04:30</option>
                                                <option value="05:00">05:00</option>
                                                <option value="05:30">05:30</option>
                                                <option value="06:00">06:00</option>
                                                <option value="06:30">06:30</option>
                                                <option value="07:00">07:00</option>
                                                <option value="07:30">07:30</option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:30">08:30</option>
                                                <option value="09:00">09:00</option>
                                                <option value="09:30">09:30</option>
                                                <option value="10:00">10:00</option>
                                                <option value="10:30">10:30</option>
                                                <option value="11:00">11:00</option>
                                                <option value="11:30">11:30</option>
                                                <option value="12:00">12:00</option>
                                                <option value="12:30">12:30</option>
                                                <option value="13:00">13:00</option>
                                                <option value="13:30">13:30</option>
                                                <option value="14:00">14:00</option>
                                                <option value="14:30">14:30</option>
                                                <option value="15:00">15:00</option>
                                                <option value="15:30">15:30</option>
                                                <option value="16:00">16:00</option>
                                                <option value="16:30">16:30</option>
                                                <option value="17:00">17:00</option>
                                                <option value="17:30">17:30</option>
                                                <option value="18:00">18:00</option>
                                                <option value="18:30">18:30</option>
                                                <option value="19:00">19:00</option>
                                                <option value="19:30">19:30</option>
                                                <option value="20:00">20:00</option>
                                                <option value="20:30">20:30</option>
                                                <option value="21:00">21:00</option>
                                                <option value="21:30">21:30</option>
                                                <option value="22:00">22:00</option>
                                                <option value="22:30">22:30</option>
                                                <option value="23:00">23:00</option>
                                                <option value="23:30">23:30</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type='submit' id='send_message' value='Book Now' class="btn-main btn-fullwidth">
                                <div class="clearfix"></div>
                            </form>
                        </div>
                        <div class="de-box">
                            <h4>Share</h4>
                            <div class="de-color-icons">
                                <span><i class="fa fa-twitter fa-lg"></i></span>
                                <span><i class="fa fa-facebook fa-lg"></i></span>
                                <span><i class="fa fa-reddit fa-lg"></i></span>
                                <span><i class="fa fa-linkedin fa-lg"></i></span>
                                <span><i class="fa fa-pinterest fa-lg"></i></span>
                                <span><i class="fa fa-stumbleupon fa-lg"></i></span>
                                <span><i class="fa fa-delicious fa-lg"></i></span>
                                <span><i class="fa fa-envelope fa-lg"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->
    <a href="#" id="back-to-top"></a>
@endsection
<script>
    var rentalMethodData = {
        @foreach ($rentalrate as $rentalMethod)
        "{{ $rentalMethod->id }}": "{{ $rentalMethod->price }}",
        @endforeach
    };
    function updateInput() {
        var select = document.getElementById("mySelect2");
        var lable = document.getElementById("myLable");
        var selectedRentalMethodId = select.value;

        lable.value = rentalMethodData[selectedRentalMethodId];
    }
</script>
