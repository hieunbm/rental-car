@extends("admin.layout.layout")
@section("title","Car Type")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    {{--    Start Row--}}
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between flex-wrap">
                    <div class="card-title">Car Type</div>
                    <div class="d-flex">
                        <a href="{{url("/admin/cartype/create")}}" class="dropdown btn btn-primary btn-sm btn-wave waves-effect waves-light"> + Add Car Type</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead class="table-primary">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col" class="w-25">Description</th>
                                <th scope="col">Icon</th>
                                <th scope="col">
                                    Create at
                                    <br>
                                    Update at
                                </th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carTypes as $cT)
                                <tr>
                                    <th scope="row">{{$cT->id}}</th>
                                    <td>{{$cT->name}}</td>
                                    <td>{{$cT->description}}</td>
                                    <td><img style="width: 80px;height: 80px;object-fit: contain;" src="{{$cT->icon}}"></td>
                                    <td>
                                        {{$cT->created_at}}
                                        <br>
                                        {{$cT->updated_at}}
                                    </td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href="{{url("/admin/cartype/edit", ["id" => $cT->id])}}" class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i class="ri-edit-line"></i></a>
                                            <a onclick="confirmation(event)" href="{{url("/admin/cartype/delete",["cartype"=>$cT->id])}}" class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"><i class="ri-delete-bin-line"></i></a>
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
                        <div>Showing 6 Entries <i class="bi bi-arrow-right ms-2 fw-semibold"></i></div>
                        <div class="ms-auto">
                            {!! $carTypes->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    End Row--}}

@endsection
