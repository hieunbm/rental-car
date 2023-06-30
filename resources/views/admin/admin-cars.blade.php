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
                            <th scope="col">Fuel Type</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Km Limit</th>
                            <th scope="col">Model Year</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cars as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td><span class="badge bg-primary-transparent">{{$item->brands->name}}</span></td>
                            <td><a href="{{url("/admin/car-type")}}"><span
                                        class="badge bg-primary-transparent">{{$item->carType->name}}</span></a></td>
                            <td>{{$item->model}}</td>
                            <td><span class="badge bg-success">{{$item->fuelType}}</span></td>
                            <td>
                                <div class="avatar-list-stacked">
                                    <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{$item->thumbnail}}" alt="img">
                                            </span>
                                    @if($item->images->count() > 2)
                                        @foreach($item->images->take(2) as $tb)
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{$tb->thumbnail}}" alt="img">
                                            </span>
                                        @endforeach
                                    <a class="avatar avatar-sm bg-primary text-fixed-white avatar-rounded"
                                       href="javascript:void(0);">
                                        +{{$item->images->count()-2}}
                                    </a>
                                    @else
                                        @foreach($item->images as $tb)
                                            <span class="avatar avatar-sm avatar-rounded">
                            <img src="{{$tb->thumbnail}}" alt="img">
                        </span>
                                        @endforeach
                                    @endif
                                </div>
                            </td>
                            <td>
                                ${{$item->price}}
                            </td>
                            <td>
                                {{$item->km_limit}}
                            </td>
                            <td>
                                {{$item->modelYear}}
                            </td>
                            <td>
                                {{$item->status}}
                            </td>
                            <td>
                                <div class="hstack gap-2 fs-15">
                                    <a href="{{url("/admin/cars/edit", ["id" => $item->id])}}" class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i class="ri-edit-line"></i></a>
                                    <a onclick="return confirm('Xoá sản phẩm?')" href="{{url("/admin/cars/delete",["car"=>$item->id])}}" class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"><i class="ri-delete-bin-line"></i></a>
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
    <!-- End::row -->

@endsection
