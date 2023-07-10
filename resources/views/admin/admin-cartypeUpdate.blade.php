@extends("admin.layout.layout")
@section("title","Edit Car Type")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    <!-- Start:: row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Update Car Type</div>
                </div>
                <form  method="post" action="{{url("/admin/cartype/edit", $carTypes->id)}}" enctype="multipart/form-data"  class="row row-cols-lg-auto g-3 align-items-center">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row gy-4">
                            {{--                        Name--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Name Car Type</label>
                                <input value="{{$carTypes->name}}" name="name" type="text" class="form-control" id="input-placeholder" placeholder="Enter Name Car Type"/>
                            </div>

                            {{--                        icon--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-file" class="form-label">Upload Icon</label>
                                <input value="{{$carTypes->icon}}" name="icon" class="form-control" type="file" id="input-file" />
                                <span style="display: flex;justify-content: center"><img style="width: 250px;height: 200px;object-fit: contain;" src="{{$carTypes->icon}}"></span>
                            </div>

                            {{--                        Description--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Description</label>
                                <input value="{{$carTypes->description}}" name="description" type="text" class="form-control" id="input-placeholder" placeholder="Enter Description"/>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Car Type</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End:: row -->

@endsection
