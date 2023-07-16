@extends("admin.layout.layout")
@section("title","Brands")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    <!-- Start::row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between flex-wrap">
                    <div class="card-title">Brands</div>
                    <div class="d-flex">
                        <a href="{{url("admin/add-brand")}}" class="dropdown btn btn-primary btn-sm btn-wave waves-effect waves-light"> + Add brand</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Update at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brand as $items )
                                <tr>
                                    <th>{{$items->id}}</th>
                                    <td>{{$items->name}}</td>
                                    <td><img src="{{$items->icon}}" style="width: 80px; height: 80px; object-fit: contain"></td>
                                    <td>{{$items->created_at}}</td>
                                    <td>{{$items->updated_at}}</td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href="{{url("/admin/add-brand/edit", ["id" => $items->id])}}" class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i class="ri-edit-line"></i></a>
                                            <a onclick="confirmation(event)" href="{{url("/admin/add-brand/delete",["brand"=>$items->id])}}" class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"><i class="ri-delete-bin-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex align-items-center">
                        <div>Showing 12 Entries <i class="bi bi-arrow-right ms-2 fw-semibold"></i></div>
                        <div class="ms-auto">
                            {!! $brand->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End::row -->
@endsection
