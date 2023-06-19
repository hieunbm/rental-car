@extends("admin.layout.layout")
@section("title","Add Brand")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    <!-- Start:: row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Add Brand</div>
                    <div class="prism-toggle">
                        <button class="btn btn-sm btn-primary-light">Show<i
                                class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                    </div>
                </div>
                <form  method="post" action="{{url("/admin/add-brand/create")}}" enctype="multipart/form-data"  class="row row-cols-lg-auto g-3 align-items-center">
                    @csrf
                    <div class="card-body">
                        <div class="row gy-4">
                            {{--                        Name--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Name Brand</label> <input
                                    name="name" type="text" class="form-control" id="input-placeholder"
                                    placeholder="Enter Name Brand"/>
                            </div>

                            {{--                        icon--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-file" class="form-label">Upload Icon</label>
                                <input name="icon" class="form-control" type="file" id="input-file" />
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End:: row -->

@endsection
