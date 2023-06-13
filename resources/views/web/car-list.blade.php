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

                        <div class="col-lg-12">
                            <div class="de-item-list mb30">
                                <div class="d-img">
                                    <img src="images/cars/jeep-renegade.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <h4>Jeep Renegade</h4>
                                        <div class="d-atr-group">
                                            <ul class="d-atr">
                                                <li><span>Seats:</span>4</li>
                                                <li><span>Luggage:</span>2</li>
                                                <li><span>Doors:</span>4</li>
                                                <li><span>Fuel:</span>Petrol</li>
                                                <li><span>Horsepower:</span>500</li>
                                                <li><span>Engine:</span>3000</li>
                                                <li><span>Drive:</span>4x4</li>
                                                <li><span>Type:</span>Hatchback</li>
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

                        <div class="col-lg-12">
                            <div class="de-item-list mb30">
                                <div class="d-img">
                                    <img src="images/cars/bmw-m5.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <h4>Mini Cooper</h4>
                                        <div class="d-atr-group">
                                            <ul class="d-atr">
                                                <li><span>Seats:</span>4</li>
                                                <li><span>Luggage:</span>2</li>
                                                <li><span>Doors:</span>4</li>
                                                <li><span>Fuel:</span>Petrol</li>
                                                <li><span>Horsepower:</span>500</li>
                                                <li><span>Engine:</span>3000</li>
                                                <li><span>Drive:</span>4x4</li>
                                                <li><span>Type:</span>Hatchback</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-price">
                                    Daily rate from <span>$244</span>
                                    <a class="btn-main" href="car-single.html">Rent Now</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="de-item-list mb30">
                                <div class="d-img">
                                    <img src="images/cars/ferrari-enzo.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <h4>Ferarri Enzo</h4>
                                        <div class="d-atr-group">
                                            <ul class="d-atr">
                                                <li><span>Seats:</span>4</li>
                                                <li><span>Luggage:</span>2</li>
                                                <li><span>Doors:</span>4</li>
                                                <li><span>Fuel:</span>Petrol</li>
                                                <li><span>Horsepower:</span>500</li>
                                                <li><span>Engine:</span>3000</li>
                                                <li><span>Drive:</span>4x4</li>
                                                <li><span>Type:</span>Hatchback</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-price">
                                    Daily rate from <span>$167</span>
                                    <a class="btn-main" href="car-single.html">Rent Now</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="de-item-list mb30">
                                <div class="d-img">
                                    <img src="images/cars/ford-raptor.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <h4>Ford Raptor</h4>
                                        <div class="d-atr-group">
                                            <ul class="d-atr">
                                                <li><span>Seats:</span>4</li>
                                                <li><span>Luggage:</span>2</li>
                                                <li><span>Doors:</span>4</li>
                                                <li><span>Fuel:</span>Petrol</li>
                                                <li><span>Horsepower:</span>500</li>
                                                <li><span>Engine:</span>3000</li>
                                                <li><span>Drive:</span>4x4</li>
                                                <li><span>Type:</span>Hatchback</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-price">
                                    Daily rate from <span>$147</span>
                                    <a class="btn-main" href="car-single.html">Rent Now</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="de-item-list mb30">
                                <div class="d-img">
                                    <img src="images/cars/mini-cooper.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <h4>Mini Cooper</h4>
                                        <div class="d-atr-group">
                                            <ul class="d-atr">
                                                <li><span>Seats:</span>4</li>
                                                <li><span>Luggage:</span>2</li>
                                                <li><span>Doors:</span>4</li>
                                                <li><span>Fuel:</span>Petrol</li>
                                                <li><span>Horsepower:</span>500</li>
                                                <li><span>Engine:</span>3000</li>
                                                <li><span>Drive:</span>4x4</li>
                                                <li><span>Type:</span>Hatchback</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-price">
                                    Daily rate from <span>$238</span>
                                    <a class="btn-main" href="car-single.html">Rent Now</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="de-item-list mb30">
                                <div class="d-img">
                                    <img src="images/cars/vw-polo.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <h4>VW Polo</h4>
                                        <div class="d-atr-group">
                                            <ul class="d-atr">
                                                <li><span>Seats:</span>4</li>
                                                <li><span>Luggage:</span>2</li>
                                                <li><span>Doors:</span>4</li>
                                                <li><span>Fuel:</span>Petrol</li>
                                                <li><span>Horsepower:</span>500</li>
                                                <li><span>Engine:</span>3000</li>
                                                <li><span>Drive:</span>4x4</li>
                                                <li><span>Type:</span>Hatchback</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-price">
                                    Daily rate from <span>$106</span>
                                    <a class="btn-main" href="car-single.html">Rent Now</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="de-item-list mb30">
                                <div class="d-img">
                                    <img src="images/cars/chevrolet-camaro.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <h4>Chevrolet Camaro</h4>
                                        <div class="d-atr-group">
                                            <ul class="d-atr">
                                                <li><span>Seats:</span>4</li>
                                                <li><span>Luggage:</span>2</li>
                                                <li><span>Doors:</span>4</li>
                                                <li><span>Fuel:</span>Petrol</li>
                                                <li><span>Horsepower:</span>500</li>
                                                <li><span>Engine:</span>3000</li>
                                                <li><span>Drive:</span>4x4</li>
                                                <li><span>Type:</span>Hatchback</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-price">
                                    Daily rate from <span>$245</span>
                                    <a class="btn-main" href="car-single.html">Rent Now</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="de-item-list mb30">
                                <div class="d-img">
                                    <img src="images/cars/hyundai-staria.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <h4>Hyundai Staria</h4>
                                        <div class="d-atr-group">
                                            <ul class="d-atr">
                                                <li><span>Seats:</span>4</li>
                                                <li><span>Luggage:</span>2</li>
                                                <li><span>Doors:</span>4</li>
                                                <li><span>Fuel:</span>Petrol</li>
                                                <li><span>Horsepower:</span>500</li>
                                                <li><span>Engine:</span>3000</li>
                                                <li><span>Drive:</span>4x4</li>
                                                <li><span>Type:</span>Hatchback</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-price">
                                    Daily rate from <span>$191</span>
                                    <a class="btn-main" href="car-single.html">Rent Now</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="de-item-list mb30">
                                <div class="d-img">
                                    <img src="images/cars/toyota-rav.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <h4>Toyota Rav 4</h4>
                                        <div class="d-atr-group">
                                            <ul class="d-atr">
                                                <li><span>Seats:</span>4</li>
                                                <li><span>Luggage:</span>2</li>
                                                <li><span>Doors:</span>4</li>
                                                <li><span>Fuel:</span>Petrol</li>
                                                <li><span>Horsepower:</span>500</li>
                                                <li><span>Engine:</span>3000</li>
                                                <li><span>Drive:</span>4x4</li>
                                                <li><span>Type:</span>Hatchback</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-price">
                                    Daily rate from <span>$114</span>
                                    <a class="btn-main" href="car-single.html">Rent Now</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="de-item-list mb30">
                                <div class="d-img">
                                    <img src="images/cars/bentley.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <h4>Bentley</h4>
                                        <div class="d-atr-group">
                                            <ul class="d-atr">
                                                <li><span>Seats:</span>4</li>
                                                <li><span>Luggage:</span>2</li>
                                                <li><span>Doors:</span>4</li>
                                                <li><span>Fuel:</span>Petrol</li>
                                                <li><span>Horsepower:</span>500</li>
                                                <li><span>Engine:</span>3000</li>
                                                <li><span>Drive:</span>4x4</li>
                                                <li><span>Type:</span>Hatchback</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-price">
                                    Daily rate from <span>$299</span>
                                    <a class="btn-main" href="car-single.html">Rent Now</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="de-item-list mb30">
                                <div class="d-img">
                                    <img src="images/cars/lexus.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <h4>Lexus</h4>
                                        <div class="d-atr-group">
                                            <ul class="d-atr">
                                                <li><span>Seats:</span>4</li>
                                                <li><span>Luggage:</span>2</li>
                                                <li><span>Doors:</span>4</li>
                                                <li><span>Fuel:</span>Petrol</li>
                                                <li><span>Horsepower:</span>500</li>
                                                <li><span>Engine:</span>3000</li>
                                                <li><span>Drive:</span>4x4</li>
                                                <li><span>Type:</span>Hatchback</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-price">
                                    Daily rate from <span>$131</span>
                                    <a class="btn-main" href="car-single.html">Rent Now</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="de-item-list mb30">
                                <div class="d-img">
                                    <img src="images/cars/range-rover.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <h4>Range Rover</h4>
                                        <div class="d-atr-group">
                                            <ul class="d-atr">
                                                <li><span>Seats:</span>4</li>
                                                <li><span>Luggage:</span>2</li>
                                                <li><span>Doors:</span>4</li>
                                                <li><span>Fuel:</span>Petrol</li>
                                                <li><span>Horsepower:</span>500</li>
                                                <li><span>Engine:</span>3000</li>
                                                <li><span>Drive:</span>4x4</li>
                                                <li><span>Type:</span>Hatchback</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-price">
                                    Daily rate from <span>$228</span>
                                    <a class="btn-main" href="car-single.html">Rent Now</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <a href="#" id="back-to-top"></a>
@endsection
