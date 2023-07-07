@extends("admin.layout.layout")
@section("title", "Add Gallery")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    <!-- Start: Row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <div class="card-header justify-content-between">
                            <div class="card-title"><a href="{{url("/admin/add-car")}}">Add Car Details</a></div>
                        </div>
                    </li>
                    <li class="nav-item" role="presentation">
                        <div class="card-header justify-content-between">
                            <div class="card-title"><a href="{{url("/admin/add-car/images")}}">Add Gallery</a></div>
                        </div>
                    </li>
                </ul>

                <form id="my-dropzone" class="dropzone" action="{{url("admin/add-car/images")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row gy-4">
                            <div class="col-md-6">
                               <div class="choose-car">
                                <label for="input-placeholder" class="form-label">Choose Car</label>
                                    <select name="car_id" class="form-select default-pill" aria-label="Default select example">
                                        @foreach($cars as $c)
                                            <option value="{{$c->id}}">{{$c->model}} {{$c->license_plate}}</option>
                                        @endforeach
                                    </select>
                               </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <span id="error-message">Please choose a photo</span>
                </form>
            </div>
        </div>
    </div>
    <!-- End: Row -->
<style>
    .choose-car{
        position: absolute;
        margin-left: -600px;
    }
    .dropzone{
        width: 500px;
        margin-left: 600px;
        position: relative;
    }
    .btn-primary{
        margin-left: -580px;
        margin-top: 60px;
        position: absolute;
    }
    #error-message{
        color: red;
        display: none;
        margin-top: -80px;
        position: absolute;
    }
</style>

    <script>
        var myDropzone = new Dropzone("#my-dropzone", {
            url: "{{url("admin/add-car/images")}}",
            paramName: "thumbnail[]", // Tên trường tệp tin
            maxFilesize: 2, // Kích thước tệp tối đa (MB)
            maxFiles: 7, // Số lượng tệp tối đa được chấp nhận
            acceptedFiles: ".jpeg,.jpg,.png", // Loại tệp được chấp nhận
            parallelUploads: 7, // Số lượng tệp được tải lên cùng một lúc
            autoProcessQueue: false, // Không tự động tải lên khi chọn tệp
            dictDefaultMessage: "Detailed photo upload",
            init: function() {
                var dropzone = this;
                var errorMessage = document.querySelector("#error-message");

                // Khi người dùng nhấp vào nút Submit
                document.querySelector("form").addEventListener("submit", function(e) {
                    e.preventDefault();

                    // Kiểm tra xem có tệp nào trong hàng đợi không
                    if (dropzone.getQueuedFiles().length > 0) {
                        dropzone.processQueue();
                    } else {
                        errorMessage.style.display = "block"; // Hiển thị thông báo lỗi
                    }
                });

                // Xử lý khi tải lên thành công
                dropzone.on("success", function(file, response) {
                    console.log(response);
                    // Chuyển hướng trang sau khi tải lên thành công
                    window.location.href = "{{ url('/admin/cars') }}";
                });

                // Xử lý khi lỗi tải lên
                dropzone.on("error", function(file, errorMessage) {
                    console.error(errorMessage);
                });
            }
        });
    </script>
@endsection
