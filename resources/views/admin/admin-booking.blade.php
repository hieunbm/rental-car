@extends("admin.layout.layout")
@section("title","Booking")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    <!-- Start::row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between flex-wrap">
                    <div class="card-title">Booking</div>
                    <div class="d-flex">
                        <div class="me-3"><input class="form-control form-control-sm" type="text"
                                                 placeholder="Search Here" aria-label=".form-control-sm example"/></div>
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                               class="btn btn-primary btn-sm btn-wave waves-effect waves-light"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Sort By<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="javascript:void(0);">New</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Popular</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Relevant</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">ID Booking</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Car</th>
                                <th scope="col">
                                    Rental Date & Time
                                    <br>
                                    Return Date & Time
                                </th>
                                <th scope="col">Incident</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Payment method</th>
                                <th scope="col">Is paid</th>
                                <th scope="col">Status</th>
                                <th scope="col">View</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rentals as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>
                                        <div class="btn-list">
                                            <a>{{$item->customer->name}}</a>
                                            <a aria-label="anchor" href="{{url("/admin/customers")}}" class="btn btn-sm btn-icon btn-info-light">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-list">
                                            <a>{{$item->car->model}}</a>
                                            <a aria-label="anchor" href="{{url("/admin/cars")}}" class="btn btn-sm btn-icon btn-info-light">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        {{$item->rental_date}}
                                        <br>
                                        {{$item->return_date}}
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>${{$item->total_amount}}</td>
                                    <td>{{$item->payment_method}}</td>
                                    <td>
                                        @if($item->is_paid)
                                            <span class="badge bg-success">Pain</span>
                                        @else
                                            <span class="badge bg-danger">UnPain</span>
                                        @endif
                                    </td>
                                    <td>
                                        @switch($item->satus)
                                            @case(0) <span
                                                class="text text-dark">Pending</span>@break
                                            @case(1) <span
                                                class="text text-blue">Comfirm</span>@break
                                            @case(2) <span
                                                class="text text-warning">In Progress</span>@break
                                            @case(3) <span
                                                class="text text-success">Complete</span>@break
                                            @case(4) <span
                                                class="text text-danger">Cancel</span>@break
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{url("/admin/booking-detail", ["rental" => $item->id])}}" class="badge bg-info">View</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex align-items-center">
                        <div>Showing 6 Entries <i class="bi bi-arrow-right ms-2 fw-semibold"></i></div>
                        <div class="ms-auto">
                            {!! $rentals->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End::row -->

@endsection
