@extends("admin.layout.layout")
@section("title","Customers")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

{{--    Start Row--}}
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Customers</div>

                    <div class="d-flex flex-wrap">
                        <div class="dropdown my-1">
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                                Sort By<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="width: 180px">
                                <li><a class="dropdown-item" href="{{ url('/admin/customers?status=0') }}">Unconfirmed</a></li>
                                <li><a class="dropdown-item" href="{{ url('/admin/customers?status=1') }}">Awaiting Confirmation</a></li>
                                <li><a class="dropdown-item" href="{{ url('/admin/customers?status=2') }}">Verified</a></li>
                                <li><a class="dropdown-item" href="{{ url('/admin/customers?status=3') }}">Invalid</a></li>
                                <li><a class="dropdown-item" href="{{ url('/admin/customers') }}">All</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="grid-sorting">
                        <div class="table-responsive">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name, Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">License Number</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">See More</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center lh-1">
                                            <div>
                                                <span class="d-block fw-semibold mb-1">{{ $item->name }}</span>
                                                <span class="text-muted fs-12">{{ $item->email }}</span></div>
                                            </div>
                                    </td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        @foreach($license as $number)
                                            @if($number->user_id == $item->id)
                                                {{ $number->license_number }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @switch ($item->status)
                                            @case(0)<span class="badge bg-warning">Unconfirmed</span>@break
                                            @case(1)<span class="badge bg-info-gradient">Awaiting Confirmation</span>@break
                                            @case(2)<span class="badge bg-success">Verified</span>@break
                                            @case(3)<span class="badge bg-danger">Invalid</span>@break
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{url("/admin/customers-detail", ["id" => $item->id])}}" class="badge bg-info">View</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex align-items-center">
                        <div>Showing 6 Entries <i class="bi bi-arrow-right ms-2 fw-semibold"></i></div>
                        <div class="ms-auto">
                            {!! $cars->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    End Row--}}

@endsection
