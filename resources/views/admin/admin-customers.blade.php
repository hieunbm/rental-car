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
                                    <th scope="col">Address</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Car Review</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex align-items-center lh-1">
                                            <div>
                                                <span class="d-block fw-semibold mb-1">Rena Mark</span>
                                                <span class="text-muted fs-12">renamark123@demo</span></div>
                                            </div>
                                    </td>
                                    <td>098765432456</td>
                                    <td>Address, City, Country</td>
                                    <td>
                                        <span class="badge bg-success">Already Rented</span>
                                    </td>
                                    <td>
                                        <p style="font-weight: bold">Scope:
                                            <span style="font-weight: 100">5</span>
                                        </p>
                                        <p style="font-weight: bold">Message:
                                            <span style="font-weight: 100">Lorem Ipsum is simply dummy text</span>
                                        </p>
                                    </td></tr>
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
