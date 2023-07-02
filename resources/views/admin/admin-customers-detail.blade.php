@extends("admin.layout.layout")
@section("title","Customers Detail")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    {{--    Start Row--}}
    <div class="row">
        <div class="col-xl-9">
            <div class="card custom-card">
                <div class="card-header d-md-flex d-block">
                    <div class="h5 mb-0 d-sm-flex d-bllock align-items-center">
                        <div class="avatar avatar-sm"><img src="{{ asset('images/logo.png') }}"></div>
                        <div class="ms-sm-2 ms-0 mt-sm-0 mt-2">
                            <div class="h6 fw-semibold mb-0">ID Customer :<span
                                    class="text-primary">#{{ $customer->id }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="ms-auto mt-md-0 mt-2">
                        @switch ($customer->status)
                            @case(0)<span class="btn btn-warning-light btn-wave">Unconfirmed</span>@break
                            @case(1)<span class="btn btn-info-light btn-wave">Awaiting Confirmation</span>@break
                            @case(2)<span class="btn btn-success-light btn-wave">Verified</span>@break
                            @case(3)<span class="btn btn-danger-light btn-wave">Invalid</span>@break
                        @endswitch
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <h4 style="text-align: center; margin-bottom: 20px">
                            Verify User Information
                        </h4>
                    </div>

                    <div class="information col-12">
                        <div class="information-user col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <p class="fw-bold mb-1">Full Name:  {{ $customer->name }} </p>
                            <p class="text-muted mb-1">Phone:  {{ $customer->phone }} </p>
                            <p class="text-muted mb-1">Email:  {{ $customer->email }}</p>
                        </div>
                        <div class="information-user-date col-xl-4 col-lg-4 col-md-6 col-sm-6 ms-auto mt-sm-0 mt-3">
                            <p class="fw-bold mb-1">License Number:
                                @if($license)
                                    {{ $license->license_number }}
                                @else
                                    No license found
                                @endif
                            </p>
                            @if($license)
                                <p class="text-muted mb-1">Issue Date: {{ \Carbon\Carbon::parse($license->issue_date)->format('d/m/Y') }}</p>
                                <p class="text-muted mb-1">Expiration Date: {{ \Carbon\Carbon::parse($license->expiration_date)->format('d/m/Y') }}</p>
                            @else
                                <p class="text-muted mb-1">Issue Date: No Data</p>
                                <p class="text-muted mb-1">Expiration Date: No Data</p>
                            @endif
                        </div>
                    </div>

                    <div class="images-licenses">
                        <figure class="figure" style="margin-left: 40px">
                            @if($license && $license->thumbnail_1)
                                <img class="images-licenses-front" src="{{ $license->thumbnail_1 }}" width="320px" height="200px" style="object-fit: cover">
                                <div class="zoomed-image">
                                    <span class="close-icon">&times;</span>
                                    <img src="{{ $license->thumbnail_1 }}">
                                </div>
                                <figcaption class="figure-caption" style="font-size: 15px; padding-top: 15px">Front view of driver's license.</figcaption>
                            @else
                                <img class="images-licenses-back" width="320px" height="200px">
                                <figcaption class="figure-caption" style="font-size: 15px; padding-top: 15px">No Data</figcaption>
                            @endif
                        </figure>

                        <figure class="figure float-end" style="margin-right: 40px">
                            @if($license && $license->thumbnail_2)
                                <img class="images-licenses-back" src="{{ $license->thumbnail_2 }}" width="320px" height="200px" style="object-fit: cover">
                                <div class="zoomed-image">
                                    <span class="close-icon">&times;</span>
                                    <img src="{{ $license->thumbnail_2 }}">
                                </div>
                                <figcaption class="figure-caption" style="font-size: 15px; padding-top: 15px">Back view of driver's license.</figcaption>
                            @else
                                <img class="images-licenses-back" width="320px" height="200px">
                                <figcaption class="figure-caption" style="font-size: 15px; padding-top: 15px">No Data</figcaption>
                            @endif
                        </figure>
                    </div>

                </div>

                <div class="card-footer text-end">
                    <b style="float: left">
                        Status:
                        @switch($customer->status)
                            @case(0)<span class="text text-warning">Unconfirmed</span>@break
                            @case(1)<span class="text text-info">Awaiting Confirmation</span>@break
                            @case(2)<span class="text text-success">Verified</span>@break
                            @case(3)<span class="text text-danger">Invalid</span>@break
                        @endswitch
                    </b>
                    @switch ($customer->status)
                        @case(0)
                            @break
                        @case(1)
                            <a href="{{url("/admin/customers/confirm", ['id' => $customer->id])}}" class="btn bg-success">Confirmed</a>
                            <a href="{{url("/admin/customers/invalid", ['id' => $customer->id])}}" class="btn bg-danger">Invalid</a>
                            @break
                        @case(2)
                            @break
                        @case(3)
                            <a href="{{url("/admin/customers/confirm", ['id' => $customer->id])}}" class="btn bg-success">Confirmed</a>
                            @break
                    @endswitch
                </div>
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">Review Car</div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        @foreach($reviews as $r)
                        <div class="col-xl-12">
                            <p class="fs-14 fw-semibold"> Score: {{ $r->score }} </p>
                            <p><span class="fw-semibold text-muted fs-12">Car Name:</span> {{ $r->car->model }}
                                <a aria-label="anchor" href="{{url("/admin/cars")}}" class="btn btn-sm btn-icon btn-info-light">
                                    <i class="fa-solid fa-circle-info"></i>
                                </a>
                            </p>
                            <div class="alert alert-primary" role="alert">
                                Message: {{ $r->message }}
                            </div>
                            <hr>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    End Row--}}

    <style>
        .figure img{
            border-radius: 15px;
        }
        .information{
            display: flex;
            padding-top: 50px;
            padding-bottom: 40px;
        }
        .information-user{
            padding-left: 42px;
        }
        .images-licenses figure {
            position: relative;
            cursor: pointer;
        }

        .images-licenses figure img {
            transition: transform 0.3s ease;
        }

        .images-licenses figure .zoomed-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            display: none;
            background-color: rgba(0, 0, 0, 0.8);
            overflow: auto;
        }

        .images-licenses figure .zoomed-image img {
            display: block;
            max-width: 100%;
            max-height: 100%;
            margin: auto;
            padding: 20px;
        }

        .images-licenses figure .close-icon {
            position: fixed;
            top: 20px;
            right: 20px;
            font-size: 40px;
            color: #fff;
            cursor: pointer;
            display: none;
        }

        .images-licenses figure.zoomed .zoomed-image {
            display: block;
        }

        .images-licenses figure.zoomed .close-icon {
            display: block;
        }
    </style>
    <script>
        // Lấy tất cả các figure trong .images-licenses
        var figures = document.querySelectorAll('.images-licenses figure');

        // Đăng ký sự kiện click cho mỗi figure
        figures.forEach(function (figure) {
            var img = figure.querySelector('img');
            var zoomedImage = figure.querySelector('.zoomed-image');
            var closeIcon = figure.querySelector('.close-icon');

            // click để phóng to ảnh
            img.addEventListener('click', function () {
                figure.classList.add('zoomed');
                document.body.style.overflow = 'hidden';
            });

            //click để đóng ảnh
            closeIcon.addEventListener('click', function () {
                figure.classList.remove('zoomed');
                document.body.style.overflow = 'auto';
            });
        });
    </script>

@endsection
