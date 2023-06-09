@extends("admin.layout.layout")
@section("title","Service")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    {{--    Start Row--}}
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header"><div class="card-title">Services</div></div>
                <div class="card-body">
                    <div id="grid-sorting">
                        <div class="table-responsive">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Wedding Car Rental</td>
                                    <td class="child1">This service provides beautiful and luxurious cars to serve on the wedding day.</td>
                                    <td>$89</td>
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
