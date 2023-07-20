@extends("admin.layout.layout")
@section("title","Overview")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xxl-5 col-xl-12">
            <div class="row">

{{--                Don thue xe va doanh thu today--}}
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="card custom-card hrm-main-card primary">
                        <div class="card-body">
                            <div class="d-flex align-items-top">
                                <div class="me-3">
                                    <span class="avatar bg-primary-gradient"> <i class="fa-solid fa-car-on"></i></span>
                                </div>
                                <div class="flex-fill">
                                    <span class="fw-semibold text-muted d-block mb-2">Total Car Rental Today</span>
                                    <h5 class="fw-semibold mb-2">{{ $totalCarRentalOrdersToday }} <span style="font-size: 12px">({{ $paidOrdersCount }} Paid)</span></h5>
                                    <p class="mb-0"><span class="badge bg-primary-transparent">Today</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="card custom-card hrm-main-card secondary">
                        <div class="card-body">
                            <div class="d-flex align-items-top">
                                <div class="me-3">
                                    <span class="avatar bg-secondary-gradient"> <i class="fa-solid fa-money-bill-wave"></i> </span>
                                </div>
                                <div class="flex-fill">
                                    <span class="fw-semibold text-muted d-block mb-2">Today's total revenue</span>
                                    <h5 class="fw-semibold mb-2">${{ $totalRevenueToday }}</h5>
                                    <p class="mb-0"><span class="badge bg-secondary-transparent">Today</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

{{--                Don thue xe va doanh thu cua toan bo thoi gian--}}
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="card custom-card hrm-main-card" style="color: #28BF95">
                        <div class="card-body">
                            <div class="d-flex align-items-top">
                                <div class="me-3">
                                    <span class="avatar bg-success-gradient"> <i class="fa-solid fa-car-on"></i> </span>
                                </div>
                                <div class="flex-fill">
                                    <span class="fw-semibold text-muted d-block mb-2">Total rental orders (Full Time)</span>
                                    <h5 class="fw-semibold mb-2">{{ $totalCarRentalOrdersAllTime }} <span style="font-size: 12px">({{ $paidOrdersCountAllTime }} Paid)</span></h5>
                                    <p class="mb-0"><span class="badge bg-primary-transparent">All Time</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="card custom-card hrm-main-card" style="color: #49B6F5;height: 140px">
                        <div class="card-body">
                            <div class="d-flex align-items-top">
                                <div class="me-3">
                                    <span class="avatar bg-info-gradient"> <i class="fa-solid fa-money-check-dollar"></i> </span>
                                </div>
                                <div class="flex-fill">
                                    <span class="fw-semibold text-muted d-block mb-2">Total Revenue</span>
                                    <h5 class="fw-semibold mb-2">${{ $totalRevenueAll }} <span class="text-info-emphasis" style="font-size: 12px;position: absolute;padding-top: 28px;margin-left: -93px">(${{ $totalRevenueAllTime }} Reality)</span></h5>
                                    <p class="mb-0"><span class="badge bg-secondary-transparent" style="margin-top: 20px">All Time</span></p>
                                </div>
                                    <div>
                                        @if ($totalRevenueAll > 0)
                                                <?php $rentersPercentage = ($totalRevenueAllTime / $totalRevenueAll) * 100; ?>
                                            <span class="fs-10 fw-semibold text-success">{{ number_format($rentersPercentage, 2) }}%</span>
                                        @else
                                            <span class="fs-10 fw-semibold text-error">0%</span>
                                        @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

{{--                Tong luong nguoi dung--}}
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="card custom-card hrm-main-card warning">
                        <div class="card-body">
                            <div class="d-flex align-items-top">
                                <div class="me-3">
                                    <span class="avatar bg-warning-gradient"> <i class="fa-solid fa-users"></i> </span>
                                </div>
                                <div class="flex-fill">
                                    <span class="fw-semibold text-muted d-block mb-2">Total Clients</span>
                                    <h5 class="fw-semibold mb-2">{{ $totalClients }} <span style="font-size: 12px">({{ $totalRenters }} Rented)</span></h5>
                                    <p class="mb-0"><span class="badge bg-warning-transparent">All Time</span></p>
                                </div>
                                <div>
                                    @if ($totalClients > 0)
                                            <?php $rentersPercentage = ($totalRenters / $totalClients) * 100; ?>
                                        <span class="fs-10 fw-semibold text-success">{{ number_format($rentersPercentage, 2) }}%</span>
                                    @else
                                        <span class="fs-10 fw-semibold text-error">0%</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

{{--                Tong so xe va so xe dang duoc thue--}}
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="card custom-card hrm-main-card danger">
                        <div class="card-body">
                            <div class="d-flex align-items-top">
                                <div class="me-3">
                                    <span class="avatar bg-danger-gradient"> <i class="fa-solid fa-car"></i> </span>
                                </div>
                                <div class="flex-fill">
                                    <span class="fw-semibold text-muted d-block mb-2">Total Car</span>
                                    <h5 class="fw-semibold mb-2">{{ $totalCar }} <span style="font-size: 12px">({{ $totalRentersCar }} Renting)</span></h5>
                                    <p class="mb-0"><span class="badge bg-danger-transparent">All Time</span></p>
                                </div>
                                <div>
                                    @if ($totalCar > 0)
                                            <?php $rentersPercentage = ($totalRentersCar / $totalCar) * 100; ?>
                                        <span class="fs-10 fw-semibold text-success">{{ number_format($rentersPercentage, 2) }}%</span>
                                    @else
                                        <span class="fs-10 fw-semibold text-error">0%</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

{{--                Thống kê các phương thức thanh toán--}}
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">Payment methods</div>
                        </div>
                        <div class="card-body">
                            <div class="row gy-md-0 gy-3">
                                <div class="col-xxl-6 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="d-flex align-items-top">
                                        <div class="me-3">
                                            <span class="avatar avatar-rounded bg-light text-primary"> <i class="ti ti-files fs-18"></i> </span>
                                        </div>
                                        <div>
                                            <span class="d-block mb-1 text-muted">VN Pay</span>
                                            <h6 class="fw-semibold mb-0">{{ $totalVNPayPayments }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="d-flex align-items-top">
                                        <div class="me-3">
                                            <span class="avatar avatar-rounded bg-light text-secondary"> <i class="ti ti-file-check fs-18"></i> </span>
                                        </div>
                                        <div>
                                            <span class="d-block mb-1 text-muted">PAYPAL</span>
                                            <h6 class="fw-semibold mb-0">{{ $totalPayPalPayments }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-4 col-lg-4 col-md-4 col-sm-12" style="margin-top: 30px">
                                    <div class="d-flex align-items-top">
                                        <div class="me-3">
                                            <span class="avatar avatar-rounded bg-light text-warning"> <i class="ti ti-file-dislike fs-18"></i> </span>
                                        </div>
                                        <div>
                                            <span class="d-block mb-1 text-muted">MOMO</span>
                                            <h6 class="fw-semibold mb-0">{{ $totalMomoPayments }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12" style="margin-top: 30px">
                                    <div class="d-flex align-items-top">
                                        <div class="me-3">
                                            <span class="avatar avatar-rounded bg-light text-warning"> <i class="ti ti-file-dislike fs-18"></i> </span>
                                        </div>
                                        <div>
                                            <span class="d-block mb-1 text-muted">COD</span>
                                            <h6 class="fw-semibold mb-0">{{ $totalCODPayments }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

{{--        Bieu do --}}
        <div class="col-xxl-7 col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">Revenue And Rental Chart</div>
                    <div class="btn-group ms-auto">
                        <ul class="nav nav-pills justify-content-end nav-style-3 mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page" href="#home-right" aria-selected="true">Week</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#services-right" aria-selected="true">Month Ago</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#month-right" aria-selected="true">12 Month</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active text-muted" id="home-right" role="tabpanel">
                            <div id="chart-line"></div>
                            <div id="chart-line2"></div>
                            <div id="chart-area"></div>
                        </div>
                        <div class="tab-pane text-muted" id="services-right" role="tabpanel">
                            <div id="stepline-chart"></div>
                            <p class="float-end" style="padding-top: 30px"><span class="btn btn-primary-gradient">Total: ${{ number_format(array_sum(array_values($totalAmountByDay30Days)), 2) }}</span></p>
                        </div>
                        <div class="tab-pane text-muted" id="month-right" role="tabpanel">
                            <div id="column-datalabels"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End::row-1 -->

    <!-- Start::row-3 -->
{{--    Top xe--}}
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between flex-wrap">
                    <div class="card-title">The Most Rented Cars</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Car ID</th>
                                <th scope="col">Name Car</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Status</th>
                                <th scope="col">Number of rentals</th>
                                <th scope="col">Total amount earned</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mostRentedCarDetails as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>#{{$item->id}}</td>
                                    <td>
                                        <div class="d-flex align-items-center lh-1">
                                            <div class="me-2">
                                                <span class="avatar avatar-md avatar-rounded"> <img src="{{$item->thumbnail}}" alt=""/> </span>
                                            </div>
                                            <div>
                                                <span class="d-block fw-semibold mb-1">{{$item->model}}</span>
                                                <span class="text-muted fs-12">{{$item->license_plate}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$item->brand->name}}</td>
                                    <td>
                                        @switch ($item->status)
                                            @case(0)<span class="badge bg-secondary-transparent">Not being rented</span>@break
                                            @case(1)<span class="badge bg-primary-transparent">Currently for rent</span>@break
                                        @endswitch
                                    </td>
                                    <td>{{ $item->rental_count }}</td>
                                    <td>${{ $item->total_amount_earned }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End::row-3 -->

    <div style="display: none">{{ number_format(array_sum(array_values($totalAmountByDay7Days)), 2) }}</div>
    <div style="display: none">{{ number_format(array_sum(array_values($successfulRentalsByDay7Days)), 2) }}</div>
    <div style="display: none">{{ number_format(array_sum(array_values($canceledRentalsByDay7Days)), 2) }}</div>
    <div style="display: none">{{ number_format(array_sum(array_values($revenueByMonth)), 2) }}</div>
@endsection
<script>
    var totalAmountByDay7Days = <?php echo json_encode($totalAmountByDay7Days); ?>;
    var successfulRentalsByDay7Days = <?php echo json_encode($successfulRentalsByDay7Days); ?>;
    var canceledRentalsByDay7Days = <?php echo json_encode($canceledRentalsByDay7Days); ?>;
    var totalAmountByDay30Days = <?php echo json_encode($totalAmountByDay30Days); ?>;
    var revenueByMonth = <?php echo json_encode($revenueByMonth); ?>;
    var currentYear = (new Date()).getFullYear();
</script>


