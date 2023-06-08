@extends("admin.layout.layout")
@section("title","Cars")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    <!-- Start::row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Car Type</th>
                            <th scope="col">Name Car</th>
                            <th scope="col">Status</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td><span class="badge bg-primary-transparent">Audi</span></td>
                            <td><a href="{{url("/admin/car-type")}}"><span
                                        class="badge bg-primary-transparent">Minibus</span></a></td>
                            <td>Audi A3</td>
                            <td><span class="badge bg-success">Paid</span></td>
                            <td>
                                <div class="avatar-list-stacked">
                        <span class="avatar avatar-sm avatar-rounded">
                            <img src="../dashboard/images/faces/2.jpg" alt="img">
                        </span>
                                    <span class="avatar avatar-sm avatar-rounded">
                            <img src="../dashboard/images/faces/8.jpg" alt="img">
                        </span>
                                    <span class="avatar avatar-sm avatar-rounded">
                            <img src="../dashboard/images/faces/2.jpg" alt="img">
                        </span>
                                    <a class="avatar avatar-sm bg-primary text-fixed-white avatar-rounded"
                                       href="javascript:void(0);">
                                        +4
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="hstack gap-2 fs-15">
                                    <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-success"><i
                                            class="ri-download-2-line"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info"><i
                                            class="ri-edit-line"></i></a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End::row -->

@endsection
