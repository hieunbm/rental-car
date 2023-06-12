@extends("web.layout.layout")
@section("title","Dashboard")
@section("main")
    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        @include('web.html.breadcrumb')
        <!-- section close -->
@auth()
        <section id="section-cars" class="bg-gray-100">
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
                                        {{auth()->user()->name}}
                                        <span class="profile_username text-gray">{{auth()->user()->email}}</span>
                                    </h4>
                                </div>
                            </div>
                            <div class="spacer-20"></div>
                            <ul class="menu-col">
                                <li><a href="{{url("/account-dashboard")}}" class="active"><i class="fa fa-home"></i>Dashboard</a></li>
                                <li><a href="{{url("/account-profile")}}"><i class="fa fa-user"></i>My Profile</a></li>
                                <li><a href="{{url("/account-booking")}}"><i class="fa fa-calendar"></i>My Orders</a></li>
                                <li><a href="login.html"><i class="fa fa-sign-out"></i>Sign Out</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-4 col-6 mb25 order-sm-1">
                                <div class="card p-4 rounded-5">
                                    <div class="symbol mb40">
                                        <i class="fa id-color fa-2x fa-calendar-check-o"></i>
                                    </div>
                                    <span class="h1 mb0">{{$rentalUpComing}}</span>
                                    <span class="text-gray">Upcoming Orders</span>
                                </div>
                            </div>


                            <div class="col-lg-4 col-6 mb25 order-sm-1">
                                <div class="card p-4 rounded-5">
                                    <div class="symbol mb40">
                                        <i class="fa id-color fa-2x fa-calendar"></i>
                                    </div>
                                    <span class="h1 mb0">{{$rentalCount}}</span>
                                    <span class="text-gray">Total Orders</span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-6 mb25 order-sm-1">
                                <div class="card p-4 rounded-5">
                                    <div class="symbol mb40">
                                        <i class="fa id-color fa-2x fa-calendar-times-o"></i>
                                    </div>
                                    <span class="h1 mb0">{{$rentalCancel}}</span>
                                    <span class="text-gray">Cancel Orders</span>
                                </div>
                            </div>
                        </div>

                        <div class="card p-4 rounded-5 mb25">
                            <h4>My Recent Orders</h4>

                            <table class="table de-table">
                                <thead>
                                <tr>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Order ID</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Car Name</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pick Up Location</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Rental Date</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Return Date</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Status</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rental as $us)
                                <tr>
                                    <td><span class="d-lg-none d-sm-block">Order ID</span><div class="badge bg-gray-100 text-dark">{{$us->id}}</div></td>
                                    <td><span class="d-lg-none d-sm-block">Car Name</span><span class="bold">{{$us->car->model}}</span></td>
                                    <td><span class="d-lg-none d-sm-block">Pick Up Location</span>{{$us->pickup_location}}</td>
                                    <td><span class="d-lg-none d-sm-block">Rental Date</span>{{$us->rental_date}}</td>
                                    <td><span class="d-lg-none d-sm-block">Return Date</span>{{$us->return_date}}</td>
                                    <td>@switch($us->status)
                                            @case(0)<div class="badge rounded-pill bg-warning">scheduled</div>@break
                                            @case(1)<div class="badge rounded-pill bg-success">completed</div>@break
                                            @case(2)<div class="badge rounded-pill bg-danger">cancelled</div>@break</td>
                                    @endswitch
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->

    <a href="#" id="back-to-top"></a>
    @endauth
@endsection
