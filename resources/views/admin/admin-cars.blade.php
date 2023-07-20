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
                                    <span class="avatar avatar-sm avatar-rounded" onclick="showImageList('{{$item->thumbnail}}', '{{json_encode($item->images)}}')">
                                        <img src="{{$item->thumbnail}}" alt="img">
                                    </span>
                                        @if($item->images->count() > 2)
                                            @foreach($item->images->take(2) as $tb)
                                                <span class="avatar avatar-sm avatar-rounded" onclick="showImageList('{{$item->thumbnail}}', '{{json_encode($item->images)}}')">
                                                <img src="{{$tb->thumbnail}}" alt="img">
                                            </span>
                                            @endforeach
                                            <a class="avatar avatar-sm bg-primary text-fixed-white avatar-rounded show-more-images"
                                               href="javascript:void(0);" onclick="showImageList('{{$item->thumbnail}}', '{{json_encode($item->images)}}')">
                                                +{{$item->images->count()-2}}
                                            </a>
                                        @else
                                            @foreach($item->images as $tb)
                                                <span class="avatar avatar-sm avatar-rounded" onclick="showImageList('{{$item->thumbnail}}', '{{json_encode($item->images)}}')">
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
                                    @if($item->status==0)
                                        Rentable
                                    @elseif($item->status==1)
                                        Unrentable
                                    @elseif($item->status==2)
                                        Repairing
                                    @endif
                                </td>
                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <a href="{{url("/admin/cars/edit", ["id" => $item->id])}} " class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i class="ri-edit-line"></i></a>
                                        <a onclick="return confirm('Delete product?')" href="{{url("/admin/cars/delete",["car"=>$item->id])}}" class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"><i class="ri-delete-bin-line"></i></a>
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

    <!-- Modal -->
    <div class="modal fade" id="imageListModal" tabindex="-1" role="dialog" aria-labelledby="imageListModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageListModalLabel">Image List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="imageListBody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showImageList(thumbnail, images) {
            var imagesArray = JSON.parse(images);

            // Tạo một ảnh tạm thời từ $item->thumbnail
            var tempImage = {
                thumbnail: thumbnail,
                id: -1 // Chọn một giá trị id tạm thời cho ảnh
            };

            // Thêm ảnh tạm thời vào đầu mảng imagesArray
            imagesArray.unshift(tempImage);

            var imageListHtml = '';
            for (var i = 0; i < imagesArray.length; i++) {
                imageListHtml += '<tr>';
                imageListHtml += '<td><img src="' + imagesArray[i].thumbnail + '" style="width: 80px; height: 80px; object-fit: contain"></td>';
                imageListHtml += '<td><div class="hstack gap-2 fs-15">';
                if (imagesArray[i].id === -1) {
                    // Nếu đó là ảnh tạm thời (ảnh chính của sản phẩm), hiển thị nút "Main Image"
                    imageListHtml += 'Main Image';
                } else {
                    // Nếu không phải ảnh tạm thời, hiển thị nút "Edit Image"
                    // Hiển thị nút "Delete Image" cho mỗi ảnh
                    imageListHtml += '<a href="{{url("/admin/images/delete")}}/' + imagesArray[i].id + '" class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"><i class="ri-delete-bin-line"></i></a>';
                    imageListHtml += '</div></td>';
                    imageListHtml += '</tr>';
                }
            }
            $('#imageListBody').html(imageListHtml);
            $('#imageListModal').modal('show');
        }

        // Các hàm setAsMainImage và editImage không cần thay đổi
        // Nếu có xử lý riêng cho ảnh chính, bạn có thể cập nhật logic ở đây

    </script>
@endsection
