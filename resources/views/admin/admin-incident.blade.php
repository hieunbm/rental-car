@extends("admin.layout.layout")
@section("title","Incident")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    {{--    Start Row--}}
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header"><div class="card-title">Incident</div></div>
                <div class="card-body">
                    <div id="grid-sorting">
                        <div class="table-responsive">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Rental ID</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="btn-list">
                                            <a>1</a>
                                            <a aria-label="anchor" href="{{url("/admin/booking-detail")}}" class="btn btn-sm btn-icon btn-info-light">
                                                <i class="ri-pencil-line"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td><span class="btn btn-warning btn-wave">Broken Headlight</span></td>
                                    <td>The rental car is having a problem with the headlights</td>
                                </tr>
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
