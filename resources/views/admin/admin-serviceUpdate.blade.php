@extends("admin.layout.layout")
@section("title","Update Service")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    <!-- Start:: row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Update Service</div>
                </div>

                <form method="post" action="{{url("/admin/services/edit", $service->id)}}" class="row row-cols-lg-auto g-3 align-items-center">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row gy-4">
                            {{--                        Title  --}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Name Service</label>
                                <input value="{{$service->title}}" type="text" name="title" class="form-control" placeholder="Enter Name Service"/>
                            </div>

                            {{--                        description--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="text-area" class="form-label">Enter Car Description</label>
                                <textarea class="form-control" name="description" id="text-area" rows="1">
                                    {{$service->description}}
                                </textarea>
                            </div>

                            {{--                        price--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Price</label>
                                <input value="{{$service->price}}" type="number" class="form-control" name="price" placeholder="Enter Price" />
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Service</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End:: row -->
@endsection

