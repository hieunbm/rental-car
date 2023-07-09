@extends("web.layout.layout")
@section("title","Dashboard")
@section("main")
    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        @include('web.html.breadcrumb')
        <!-- section close -->
        @auth()
            <section id="section-settings" class="bg-gray-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 mb30">
                            <div class="card p-4 rounded-5">
                                <div class="profile_avatar">
                                    <div class="profile_img">
                                        <img src="images/profile/1.jpg" alt="">
                                    </div>
                                    <div class="profile_name">
                                        <h4>
                                            Monica Lucas
                                            <span class="profile_username text-gray">monica@rentaly.com</span>
                                        </h4>
                                    </div>
                                </div>
                                <div class="spacer-20"></div>
                                <ul class="menu-col">
                                    <li><a href="{{url("/account-dashboard")}}"><i class="fa fa-home"></i>Dashboard</a></li>
                                    <li><a href="{{url("/account-profile")}}"><i class="fa fa-user"></i>My Profile</a></li>
                                    <li><a href="{{url("/account-booking")}}"><i class="fa fa-calendar"></i>My Orders</a></li>
                                    <li><a href="{{url("/account-favorite-cars")}}" class="active"><i class="fa fa-heart"></i>My Favorite Cars</a></li>
                                    <li>
                                        <form action="{{route("logout")}}" method="post">
                                            @csrf
                                            <button style="border: none; background-color: white; width: 100%;text-align: left;margin-left: 5px"
                                                    class="menu-item" type="submit"><i class="fa fa-sign-out"></i>Sign out
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @foreach($cars as $c)
                            <div class="col-lg-9">
                                <div class="de-item-list no-border mb30">
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
                                        Daily rate from <span>$265</span>
                                        <a class="btn-main" href="car-single.html">Rent Now</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
    </div>
    <!-- content close -->

    <a href="#" id="back-to-top"></a>
    @endauth
@endsection
