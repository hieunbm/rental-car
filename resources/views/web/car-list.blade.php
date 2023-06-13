@extends('web.layout.layout')
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
                                            @foreach($cars as $c)
                                                <div class="col-lg-12">
                                                    <div class="de-item-list mb30">
                                                        <div class="d-img">
                                                            <img src="{{$c->thumbnail}}" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="d-info">
                                                            <div class="d-text">
                                                                <h4>{{$c->model}}</h4>
                                                                <div class="d-atr-group">
                                                                    <ul class="d-atr">
                                                                        <li><span>Seats:</span>{{$c->airConditioner}}</li>
                                                                        <li><span>License Plate:</span>{{$c->license_plate}}</li>
                                                                        <li><span>Transmission:</span>{{$c->transmission}}</li>
                                                                        <li><span>Fuel:</span>{{$c->fuelType}}</li>
                                                                        <li><span>Driver Airbag:</span>{{$c->driverAirbag}}</li>
                                                                        <li><span>CD Player:</span>{{$c->cDPlayer}}</li>
                                                                        <li><span>Brake Assist:</span>{{$c->brakeAssist}}</li>
                                                                        <li><span>Reserve sensor:</span>{{$c->reserve_sensor}}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-price">
                                                            <div style="margin-bottom: 15px" class="d-flex justify-content-between align-items-center">
                                                                <div class="ratings">
                                                                    <i class="fa fa-star rating-color"></i>
                                                                    <i class="fa fa-star rating-color"></i>
                                                                    <i class="fa fa-star rating-color"></i>
                                                                    <i class="fa fa-star rating-color"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                                <h5 class="review-count">12 Reviews</h5>
                                                            </div>
                                                            <div style="margin-bottom: 25px">
                                                                Daily rate from <span>$265</span>
                                                                <a class="btn-main" href="car-single.html">Rent Now</a>
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
@endsection
