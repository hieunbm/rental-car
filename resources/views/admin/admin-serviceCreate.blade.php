@extends("admin.layout.layout")
@section("title","Create Service")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    <!-- Start:: row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Add Service</div>
                </div>

                <form method="post" action="{{url("/admin/services/create")}}" class="row row-cols-lg-auto g-3 align-items-center">
                    @csrf
                    <div class="card-body">
                        <div class="row gy-4">
                            {{--                        Title  --}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Name Service</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Name Service"/>
                            </div>

                            {{--                        description--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="text-area" class="form-label">Enter Car Description</label>
                                <textarea class="form-control" name="description" id="text-area" rows="1"></textarea>
                            </div>

                            {{--                        price--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Enter Price" />
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Add Service</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End:: row -->
@endsection
