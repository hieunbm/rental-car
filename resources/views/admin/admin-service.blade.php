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
                <div class="card-header justify-content-between flex-wrap">
                    <div class="card-title">Services</div>
                    <div class="d-flex">
                        <a href="{{url("/admin/services/create")}}" class="dropdown btn btn-primary btn-sm btn-wave waves-effect waves-light"> + Add service</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead class="table-primary">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">
                                    CREATE AT
                                    <br>
                                    UPDATE AT
                                </th>
                                <th scope="col">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($service as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>
                                        {{$item->created_at}}
                                        <br>
                                        {{$item->updated_at}}
                                    </td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href="{{url("/admin/services/edit", ["id" => $item->id])}}" class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i class="ri-edit-line"></i></a>
                                            <a onclick="return confirm('Xoá sản phẩm?')" href="{{url("/admin/services/delete",["service"=>$item->id])}}" class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"><i class="ri-delete-bin-line"></i></a>
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
                            {!! $service->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    End Row--}}

@endsection
