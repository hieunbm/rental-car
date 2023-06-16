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
                            <li><span>Model Year:</span>{{$c->modelYear}}</li>
                            <li><span>Seats:</span>{{$c->seats}}</li>
                            <li><span>Transmission:</span>{{$c->transmission}}</li>
                            <li><span>Fuel:</span>{{$c->fuelType}}</li>
                            @if($c->reverse_sensor == 1)
                                <li>Reverse sensor<i class="fa fa-check" style="color: #199e1c; margin-left: 5px" aria-hidden="true"></i></li>
                            @else
                                <li>Reverse sensor<i class="fa fa-times" style="margin-left: 5px" aria-hidden="true"></i></li>
                            @endif
                            @if($c->airConditioner == 1)
                                <li>Air Conditioner<i class="fa fa-check" style="color: #199e1c; margin-left: 5px" aria-hidden="true"></i></li>
                            @else
                                <li>Air Conditioner<i class="fa fa-times" style="margin-left: 5px" aria-hidden="true"></i></li>
                            @endif
                            @if($c->cDPlayer == 1)
                                <li>CD Player<i class="fa fa-check" style="color: #199e1c; margin-left: 5px" aria-hidden="true"></i></li>
                            @else
                                <li>CD Player<i class="fa fa-times" style="margin-left: 5px" aria-hidden="true"></i></li>
                            @endif
                            @if($c->brakeAssist == 1)
                                <li>Brake Assist<i class="fa fa-check" style="color: #199e1c; margin-left: 5px" aria-hidden="true"></i></li>
                            @else
                                <li>Brake Assist<i class="fa fa-times" style="margin-left: 5px" aria-hidden="true"></i></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="d-price">
                <style>

                    .ratings {
                        margin-right: 10px;
                    }

                    .ratings i {
                        color: #cecece;
                        font-size: 20px;
                    }

                    .rating-color {
                        color: #fbc634 !important;
                    }

                    .review-count {
                        font-weight: 400;
                        margin-bottom: 2px;
                        font-size: 16px !important;
                    }
                </style>
                <div style="margin-bottom: 15px"
                     class="d-flex justify-content-between align-items-center">
                    <div class="ratings">
                        @php
                            $rate = $rates[$c->id] ?? 0;
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
                    <h5 class="review-count">{{ $reviews->where('car_id', $c->id)->count() }} Reviews</h5>
                </div>
                <div style="margin-bottom: 25px">
                    Daily rate from <span>{{ $c->price }}</span>
                    <a class="btn-main" href="{{url("/car",["car"=>$c->slug])}}">Rent Now</a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endforeach
