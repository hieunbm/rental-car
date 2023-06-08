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
                                <th scope="col">Customer ID</th>
                                <th scope="col">Car ID</th>
                                <th scope="col">Rental Date & Time</th>
                                <th scope="col">Return Date & Time</th>
                                <th scope="col">Pickup Location</th>
                                <th scope="col">Message</th>
                                <th scope="col">Rental Type</th>
                                <th scope="col">Price</th>
                                <th scope="col">Incident ID</th>
                                <th scope="col">Additional Fee</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>#INV111611</td>
                                <td>
                                    <div class="btn-list">
                                        <a>1</a>
                                        <a aria-label="anchor" href="{{url("/admin/customers")}}" class="btn btn-sm btn-icon btn-info-light">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-list">
                                        <a>1</a>
                                        <a aria-label="anchor" href="{{url("/admin/cars")}}" class="btn btn-sm btn-icon btn-info-light">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>14-05-2023</td>
                                <td>14-05-2023</td>
                                <td>Ha Noi</td>
                                <td>null</td>
                                <td>null</td>
                                <td>$98</td>
                                <td>
                                    <div class="btn-list">
                                        <a>3</a>
                                        <a aria-label="anchor" href="{{url("/admin/incidents")}}" class="btn btn-sm btn-icon btn-info-light">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>$10</td>
                                <td>$108</td>
                                <td><span class="badge bg-success">Paid</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex align-items-center">
                        <div>Showing 6 Entries <i class="bi bi-arrow-right ms-2 fw-semibold"></i></div>
                        <div class="ms-auto">
                            <nav aria-label="Page navigation" class="pagination-style-4">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled"><a class="page-link" href="javascript:void(0);">
                                            Prev </a></li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                    <li class="page-item"><a class="page-link text-primary" href="javascript:void(0);">
                                            next </a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End::row -->

@endsection
