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
                <div class="card-header"><div class="card-title">Customers</div></div>
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
                                            @case(1)<span class="badge bg-success">Verified</span>@break
                                            @case(2)<span class="badge bg-danger">Invalid</span>@break
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
            </div>
        </div>
    </div>
{{--    End Row--}}

@endsection
