@extends('web.layout.layout')
@section("name","Search: ".app("request")->input('q'))
@section("main")
    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        @include('web.html.breadcrumb')
        <!-- section close -->

        <section id="section-cars">
            <div class="container">
                <div class="row">
                    {{--Filter Car--}}
                    @include('web.html.filter-car.filter-car')
                    {{--End Filter Car--}}

                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-12" style="text-align: center">
                                <p>Found {{ $count }} cars</p>
                            </div>

                            @foreach($cars as $item)
                            <div class="col-lg-12">
                                <div class="de-item-list mb30">
                                    <div class="d-img">
                                        <img src="{{ $item->thumbnail }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="d-info">
                                        <div class="d-text">
                                            <h4>{{ $item->model }}</h4>
                                            <div class="d-atr-group">
                                                <ul class="d-atr">
                                                    <li><span>Seats:</span>{{$item->airConditioner}}</li>
                                                    <li><span>LicensePlate:</span>{{$item->license_plate}}</li>
                                                    <li><span>Transmission:</span>{{$item->transmission}}</li>
                                                    <li><span>Fuel:</span>{{$item->fuelType}}</li>
                                                    <li><span>Driver Airbag:</span>{{$item->driverAirbag}}</li>
                                                    <li><span>CD Player:</span>{{$item->cDPlayer}}</li>
                                                    <li><span>Brake Assist:</span>{{$item->brakeAssist}}</li>
                                                    <li><span>Reverse sensor:</span>{{$item->reverse_sensor}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-price">
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
                                                @php
                                                    $rate = $rates[$item->id] ?? 0;
                                                @endphp

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
                                            <h5 class="review-count">{{ $reviews->where('car_id', $item->id)->count() }} Reviews</h5>
                                        </div>
                                        <div style="margin-bottom: 25px">
                                            Daily rate from
                                            @foreach($priceday->where('car_id', $item->id) as $price)
                                            <span>${{ $price->price }}</span>
                                            @endforeach
                                            <a class="btn-main" href="{{url("/car",["car"=>$item->slug])}}">Rent Now</a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <a href="#" id="back-to-top"></a>
@endsection
