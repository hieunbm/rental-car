@extends("admin.layout.layout")
@section("main")
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Overview</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Overview</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- Start::row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between flex-wrap">
                    <div class="card-title">Booking</div>
                    <div class="d-flex">
                        <div class="me-3"><input class="form-control form-control-sm" type="text" placeholder="Search Here" aria-label=".form-control-sm example" /></div>
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
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
                                <th scope="col">S.No</th>
                                <th scope="col">ID Booking</th>
                                <th scope="col">Client</th>
                                <th scope="col">Pick Up Date & Time</th>
                                <th scope="col">Return Date & Time</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>#INV111611</td>
                                <td>
                                    <div class="d-flex align-items-center lh-1">
                                        <div class="me-2">
                                            <span class="avatar avatar-md avatar-rounded"> <img src="../dashboard/images/faces/1.jpg" alt="" /> </span>
                                        </div>
                                        <div><span class="d-block fw-semibold mb-1">Rena Mark</span> <span class="text-muted fs-12">renamark123@demo</span></div>
                                    </div>
                                </td>
                                <td>14-05-2023</td>
                                <td>14-05-2023</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>
                                    <div class="btn-list">
                                        <a aria-label="anchor" href="javascript:void(0);" class="btn btn-sm btn-icon btn-info-light"><i class="ri-pencil-line"></i></a>
                                    </div>
                                </td>
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
                                    <li class="page-item disabled"><a class="page-link" href="javascript:void(0);"> Prev </a></li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                    <li class="page-item"><a class="page-link text-primary" href="javascript:void(0);"> next </a></li>
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
