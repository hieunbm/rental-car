@extends('web.layout.layout')
@section("name")
    My Orders
@endsection
@section("main")
    <!-- content begin -->
    <div class="no-bottom no-top zebra" id="content">
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
                                    <img src="images/profile/1.jpg" alt="">
                                </div>
                                <div class="profile_name">
                                    <h4>
                                        {{$user->name}}
                                        <span class="profile_username text-gray">{{$user->email}}</span>
                                    </h4>
                                </div>
                            </div>
                            <div class="spacer-20"></div>
                            <ul class="menu-col">
                                <li><a href="{{url("/account-dashboard")}}"><i class="fa fa-home"></i>Dashboard</a></li>
                                <li><a href="{{url("/account-profile")}}"><i class="fa fa-user"></i>My Profile</a></li>
                                <li><a href="{{url("/account-booking")}}" class="active"><i class="fa fa-calendar"></i>My Orders</a></li>
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

{{--                        Pending--}}
                        <div class="card p-4 rounded-5 mb25">
                            <h4 class="rounded-pill" style="width: 180px;background-color: rgb(13,110,253);color: white;text-align: center">Pending Orders</h4>
                            @if($pendingOrders->isEmpty())
                                <p class="text-center" style="margin-top: 20px;">If there is an order in this status, it will be displayed here!</p>
                            @else
                            <table class="table de-table">
                                <thead>
                                <tr>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Order ID</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Car Name</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pick Up Location</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pick Up Date</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Return Date</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Total Amount</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pay</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">View</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pendingOrders as $order)
                                    <tr>
                                        <td><div class="badge bg-gray-100 text-dark">#{{ $order->id }}</div></td>
                                        <td><span class="bold">{{ $order->car->model }}</span></td>
                                        <td>{{ $order->address }}, {{ $order->pickup_location }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->rental_date)->format('m/d/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->return_date)->format('m/d/Y') }}</td>
                                        <td>${{ $order->total_amount }}</td>
                                        <td>
                                            @if($order->is_paid)
                                                <span class="text-success">Paid</span>
                                            @else
                                                <span class="text-danger">unPaid</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url("/order-invoice/".$item->id)}}" class="badge bg-info">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
{{--                        End Pending--}}

{{--                        Confirmed--}}
                        <div class="card p-4 rounded-5 mb25">
                            <h4 class="rounded-pill" style="width: 180px;background-color: rgb(108,117,125);color: white;text-align: center">Confirmed Orders</h4>
                            @if($confirmedOrders->isEmpty())
                                <p class="text-center" style="margin-top: 20px;">If there is an order in this status, it will be displayed here!</p>
                            @else
                            <table class="table de-table">
                                <thead>
                                <tr>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Order ID</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Car Name</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pick Up Location</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pick Up Date</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Return Date</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Total Amount</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pay</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">View</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($confirmedOrders as $order)
                                    <tr>
                                        <td><div class="badge bg-gray-100 text-dark">#{{ $order->id }}</div></td>
                                        <td><span class="bold">{{ $order->car->model }}</span></td>
                                        <td>{{ $order->address }}, {{ $order->pickup_location }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->rental_date)->format('m/d/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->return_date)->format('m/d/Y') }}</td>
                                        <td>${{ $order->total_amount }}</td>
                                        <td>
                                            @if($order->is_paid)
                                                <span class="text-success">Paid</span>
                                            @else
                                                <span class="text-danger">unPaid</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url("/order-invoice/".$order->id)}}" class="badge bg-info">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
{{--                        End Confirmed--}}

{{--                        Shipping--}}
                        <div class="card p-4 rounded-5 mb25">
                            <h4 class="rounded-pill" style="width: 180px;background-color: rgb(255,192,8);color: white;text-align: center">In Progress Orders</h4>
                            @if($inProgress->isEmpty())
                                <p class="text-center" style="margin-top: 20px;">If there is an order in this status, it will be displayed here!</p>
                            @else
                            <table class="table de-table">
                                <thead>
                                <tr>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Order ID</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Car Name</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pick Up Location</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pick Up Date</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Return Date</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Total Amount</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pay</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">View</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($inProgress as $order)
                                    <tr>
                                        <td><div class="badge bg-gray-100 text-dark">#{{ $order->id }}</div></td>
                                        <td><span class="bold">{{ $order->car->model }}</span></td>
                                        <td>{{ $order->address }}, {{ $order->pickup_location }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->rental_date)->format('m/d/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->return_date)->format('m/d/Y') }}</td>
                                        <td>${{ $order->total_amount }}</td>
                                        <td>
                                            @if($order->is_paid)
                                                <span class="text-success">Paid</span>
                                            @else
                                                <span class="text-danger">unPaid</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url("/order-invoice/".$order->id)}}" class="badge bg-info">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>

                        {{--                        End Shipping--}}

{{--                        Completed--}}
                        <div class="card p-4 rounded-5 mb25">
                            <h4 class="rounded-pill" style="width: 180px;background-color: rgb(25,135,84);color: white;text-align: center">Completed Orders</h4>
                            @if($completedOrders->isEmpty())
                                <p class="text-center" style="margin-top: 20px;">If there is an order in this status, it will be displayed here!</p>
                            @else
                            <table class="table de-table">
                                <thead>
                                <tr>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Order ID</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Car Name</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pick Up Location</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pick Up Date</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Return Date</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Total Amount</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pay</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">View</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($completedOrders as $order)
                                    <tr>
                                        <td><div class="badge bg-gray-100 text-dark">#{{ $order->id }}</div></td>
                                        <td><span class="bold">{{ $order->car->model }}</span></td>
                                        <td>{{ $order->address }}, {{ $order->pickup_location }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->rental_date)->format('m/d/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->return_date)->format('m/d/Y') }}</td>
                                        <td>${{ $order->total_amount }}</td>
                                        <td>
                                            @if($order->is_paid)
                                                <span class="text-success">Paid</span>
                                            @else
                                                <span class="text-danger">unPaid</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url("/order-invoice/".$order->id)}}" class="badge bg-info">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>

                        {{--                        End Completed--}}

{{--                        Cancel--}}
                        <div class="card p-4 rounded-5 mb25">
                            <h4 class="rounded-pill" style="width: 180px;background-color: rgb(220,53,69);color: white;text-align: center">Cancel Orders</h4>
                            @if($cancelledOrders->isEmpty())
                                <p class="text-center" style="margin-top: 20px;">If there is an order in this status, it will be displayed here!</p>
                            @else
                            <table class="table de-table">
                                <thead>
                                <tr>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Order ID</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Car Name</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pick Up Location</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pick Up Date</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Return Date</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Total Amount</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">Pay</span></th>
                                    <th scope="col"><span class="text-uppercase fs-12 text-gray">View</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cancelledOrders as $order)
                                    <tr>
                                        <td><div class="badge bg-gray-100 text-dark">#{{ $order->id }}</div></td>
                                        <td><span class="bold">{{ $order->car->model }}</span></td>
                                        <td>{{ $order->address }}, {{ $order->pickup_location }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->rental_date)->format('m/d/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->return_date)->format('m/d/Y') }}</td>
                                        <td>${{ $order->total_amount }}</td>
                                        <td>
                                            @if($order->is_paid)
                                                <span class="text-success">Paid</span>
                                            @else
                                                <span class="text-danger">unPaid</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url("/order-invoice/".$order->id)}}" class="badge bg-info">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>

                        {{--                        End Cancel--}}

                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->
    <a href="#" id="back-to-top"></a>
@endsection
