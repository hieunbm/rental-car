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
                <div class="card-header justify-content-between">
                    <div class="card-title">Add Gallery</div>
                    <div class="prism-toggle">
                        <button class="btn btn-sm btn-primary-light">Show<i
                                class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                    </div>
                </div>

                <form action="{{url("admin/add-car/images")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                    <label for="input-placeholder" class="form-label">Choose Car</label>
                                    <select name="car_id" class="form-select default-pill" aria-label="Default select example">
                                        @foreach($cars as $c)
                                            <option value="{{$c->id}}">{{$c->model}} {{$c->license_plate}}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-6">
                                <label for="input-thumbnail" class="form-label">Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control" id="input-thumbnail" required>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Add Gallery</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End: Row -->
@endsection
