@extends('web.layout.layout')
@section("name","Invoice")
@section("main")
    <style>
        .toast-container .toast {background-size: 7%!important;}

        .toast-success {background-size: 7%!important;}

    </style>
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <!-- section begin -->
        @include('web.html.breadcrumb')
        <!-- section close -->


        <section id="section-settings" class="bg-gray-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 mb30">
                        <div class="card p-4 rounded-5">
                            <div class="profile_avatar">
                                <div class="profile_img">
                                    <img src="images/misc/avatar.jpg" alt="">
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
                                <li><a href="{{url("/account-favorite-cars")}}"><i class="fa fa-heart"></i>My Favorite Cars</a></li>
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
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="container mb-5 mt-3">
                                    <div class="row d-flex align-items-baseline">
                                        <div class="col-xl-9">
                                            <p style="color: #7e8d9f;font-size: 20px;">Invoice &gt;&gt; <strong>ID:
                                                    #{{$rental->id}}</strong></p>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <div id="logo">
                                                    <a href="index.html">
                                                        <img class="logo-2" src="images/logo.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-8">
                                                <ul class="list-unstyled">
                                                    <li class="text-muted">To: <span style="color:#8f8061 ;">{{$rental->customer->name}}</span>
                                                    </li>
                                                    @if($rental->address != null)
                                                        <li class="text-muted">Address: {{$rental->address}}</li>
                                                    @endif
                                                    <li class="text-muted"><i class="fas fa-phone"></i> {{$rental->telephone}}</li>
                                                </ul>
                                            </div>
                                            <div class="col-xl-4">
                                                <ul class="list-unstyled">
                                                    <li class="text-muted">
                                                        <i class="fas fa-circle" style="color:#8f8061 ;"></i>
                                                        <span class="fw-bold">Creation Date: </span>{{$rental->created_at}}
                                                    </li>
                                                    <li class="text-muted">
                                                        <i class="fas fa-circle" style="color:#8f8061;"></i>
                                                        <span class="me-1 fw-bold">Status:</span>
                                                        @switch($rental->status)
                                                            @case(0) <span
                                                                class="badge bg-dark text-white fw-bold">Pending</span>@break
                                                            @case(1) <span
                                                                class="badge bg-info text-black fw-bold">Confirmed</span>@break
                                                            @case(2) <span
                                                                class="badge bg-info text-black fw-bold">Delivery</span>@break
                                                            @case(3) <span
                                                                class="badge bg-warning text-black fw-bold">In Progress</span>@break
                                                            @case(4) <span
                                                                class="badge bg-warning text-black fw-bold">Processing</span>@break
                                                            @case(5) <span
                                                                class="badge bg-success text-black fw-bold">Completed</span>@break
                                                            @case(6) <span
                                                                class="badge bg-danger text-black fw-bold">Cancel</span>@break
                                                        @endswitch
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row my-2 mx-1 justify-content-center">
                                                <div class="col-md-2 mb-4 mb-md-0">
                                                    <div class="bg-image ripple rounded-5 mb-4 overflow-hidden d-block" data-ripple-color="light">
                                                        <img
                                                            src="{{$rental->car->thumbnail}}"
                                                            class="w-100" height="100px" alt="Elegant shoes and shirt"/>
                                                        <a href="#">
                                                            <div class="hover-overlay">
                                                                <div class="mask" style="background-color: hsla(0, 0%, 98.4%, 0.2)">

                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 mb-4 mb-md-0">
                                                    <p class="fw-bold">{{$rental->car->model}}</p>
                                                    <p class="mb-1">
                                                        <span class="text-muted me-2">Seats:</span><span>{{$rental->car->seats}}</span>
                                                    </p>
                                                    <p>
                                                        <span class="text-muted me-2">License Plate:</span><span>{{$rental->car->license_plate}}</span>
                                                    </p>
                                                </div>
                                                <div class="col-md-3 mb-4 mb-md-0">
                                                    <h5 class="mb-2">
                                                        <span class="align-middle">$ {{$rental->car->price}} /Day</span>
                                                    </h5>

                                                </div>
                                        </div>
                                        <div class="row mb-5">
                                            <div class="col-xl-3">
                                                <p class="fw-semibold text-muted mb-1">Invoice ID :</p>
                                                <p class="fs-15 mb-1">{{$rental->id}}</p></div>
                                            <div class="col-xl-3">
                                                <p class="fw-semibold text-muted mb-1">Rental Date :</p>
                                                <p class="fs-15 mb-1">{{$rental->rental_date}}</p>
                                            </div>
                                            <div class="col-xl-3">
                                                <p class="fw-semibold text-muted mb-1">Return Date :</p>
                                                <p class="fs-15 mb-1">{{$rental->return_date}}</p></div>
                                            <div class="col-xl-3">
                                                <p class="fw-semibold text-muted mb-1">Due Amount :</p>
                                                <p class="fs-16 mb-1 fw-semibold">${{$rental->total_amount}}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-5">
                                            <div class="row">
                                                <h6 class="col-12" style="text-align: center">
                                                    SERVICE INFORMATION
                                                </h6>
                                                <div class="col-xl-3"></div>
                                                <div class="col-xl-6 table-responsive">
                                                    @if($rental->service->count() > 0 )
                                                        <table class="table nowrap text-nowrap border mt-4">
                                                            <thead>
                                                            <tr>
                                                                <th>SERVICE</th>
                                                                <th>PRICE</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($rental->service as $item)
                                                                <tr>
                                                                    <td>{{$item->title}}</td>
                                                                    <td>{{$item->price}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <p style="text-align: center">Do not use the service</p>
                                                    @endif

                                                </div>
                                                <div class="col-xl-3"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <h6 class="col-12" style="text-align: center">
                                                ADDITIONAL COSTS
                                            </h6>
                                            <div class="col-xl-3"></div>
                                            <div class="col-xl-6 table-responsive">
                                                @if($rental->incident->count() > 0)
                                                    <table class="table nowrap text-nowrap border mt-4">
                                                        <thead>
                                                        <tr>
                                                            <th>TITLE</th>
                                                            <th>EXPENSE</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($rental->incident as $item)
                                                            <tr>
                                                                <td>{{$item->title}}</td>
                                                                <td>{{$item->expense}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                @else
                                                    <p style="text-align: center">No extra costs</p>
                                                @endif
                                            </div>
                                            <div class="col-xl-3"></div>
                                        </div>
                                        <div class="row mb-5">
                                            <div class="table-responsive">
                                                <table class="table nowrap text-nowrap border mt-4">
                                                    <thead>
                                                    <tr>
                                                        <th>PICKUP LOCATION</th>
                                                        <th>DAYS(HOURS)</th>
                                                        <th>RENTAL TYPE</th>
                                                        <th>CAR PRICE</th>
                                                        <th>SUBTOTAL</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>{{$rental->pickup_location}}</td>
                                                        <td>{{$rental->expected}}</td>
                                                        <td>{{$rental->rental_type}}</td>
                                                        <td>{{$rental->car_price}}</td>
                                                        <td> ${{$rental->car_price * $rental->expected}}</td>
                                                    <tr>
                                                        <td colspan="3"></td>
                                                        <td colspan="3">
                                                            <table class="table table-sm text-nowrap mb-0 table-borderless">
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row"><p class="mb-0">Deposit Status :</p></th>
                                                                    <td><p class="mb-0 fw-semibold fs-15">
                                                                            @if($rental->is_desposit_paid)
                                                                                <span class="badge bg-success">Pain</span>
                                                                            @else
                                                                                <span class="badge bg-danger">UnPain</span>
                                                                            @endif
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row"><p class="mb-0">Pay rent Status :</p></th>
                                                                    <td><p class="mb-0 fw-semibold fs-15">
                                                                            @if($rental->is_rent_paid)
                                                                                <span class="badge bg-success">Pain</span>
                                                                            @else
                                                                                <span class="badge bg-danger">UnPain</span>
                                                                            @endif
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row"><p class="mb-0">Car Return Status :</p></th>
                                                                    <td><p class="mb-0 fw-semibold fs-15">
                                                                            @if($rental->is_car_returned)
                                                                                <span class="badge bg-success">Pain</span>
                                                                            @else
                                                                                <span class="badge bg-danger">UnPain</span>
                                                                            @endif
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row"><p class="mb-0">Return the deposit :</p></th>
                                                                    <td><p class="mb-0 fw-semibold fs-15">
                                                                            @if($rental->is_desposit_returned)
                                                                                <span class="badge bg-success">Pain</span>
                                                                            @else
                                                                                <span class="badge bg-danger">UnPain</span>
                                                                            @endif
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row"><p class="mb-0">Sub Total :</p></th>
                                                                    <td><p class="mb-0 fw-semibold fs-15">${{$rental->car_price * $rental->expected}}</p></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row"><p class="mb-0">Service Total :</p></th>
                                                                    <td><p class="mb-0 fw-semibold fs-15">${{$total}}</p></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row"><p class="mb-0">Additional costs Total :</p></th>
                                                                    <td><p class="mb-0 fw-semibold fs-15">${{$totalFee}}</p></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row"><p class="mb-0 fs-14">Total :</p></th>
                                                                    <td><p class="mb-0 fw-semibold fs-16 text-success">${{$rental->total_amount}}</p>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row mb-5">
                                            @if($rental->message != null)
                                                <p class="mt-5 ml10"><strong>Message:</strong> {{$rental->message}}</p>
                                            @endif
                                        </div>

                                            @switch($rental->status)
                                                @case(0)
                                                    <a href="{{url("/booking/cancel/".$rental->id)}}" class="btn btn-danger float-right">
                                                        <i class="far fa-credit-card"></i>
                                                        Cancel
                                                    </a>
                                                    @break
                                                @case(1)
                                                    @break
                                                @case(2)
                                                    <a href="{{url("/receive", ["rental" => $rental->id])}}" class="btn btn-success float-right">
                                                        <i class="far fa-credit-card"></i>
                                                        Receive Car
                                                    </a>
                                                    @break
                                                @case(3)
                                                    @break
                                                @case(4)
                                                    @break
                                                @case(5)
                                                    @if(!$rental->is_reviewed)
                                                    <a href="{{url("/review", ["rental" => $rental->id])}}" class="btn btn-success float-right">
                                                        <i class="far fa-credit-card"></i>
                                                        Review Car
                                                    </a>
                                                    @endif

                                                    @break
                                            @endswitch
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
