@extends("admin.layout.layout")
@section("title","Car Type")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    <!-- Start::row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Car Type</div>
                    <div class="prism-toggle">
                        <button class="btn btn-sm btn-primary-light">Show<i
                                class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col" class="w-25">Description</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Update At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carTypes as $cT)
                            <tr>
                                <th scope="row">{{$cT->id}}</th>
                                <td>{{$cT->name}}</td>
                                <td>{{$cT->description}}</td>
                                <td><img style="width: 80px;height: 80px;object-fit: contain;" src="{{$cT->icon}}"></td>
                                <td><span class="badge bg-outline-secondary">{{$cT->created_at}}</span></td>
                                <td><span class="badge bg-outline-success">{{$cT->updated_at}}</span></td>
                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <a href="{{url("/admin/car-type/edit", ["id" => $cT->id])}}" class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i class="ri-edit-line"></i></a>
                                        <a onclick="return confirm('Xoá loại xe ?')" href="{{url("/admin/car-type/delete",["service"=>$cT->id])}}" class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"><i class="ri-delete-bin-line"></i></a>
                                    </div>
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
    <!-- End::row -->
@endsection
