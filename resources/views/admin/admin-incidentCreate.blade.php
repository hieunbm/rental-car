@extends("admin.layout.layout")
@section("title","Create Incident")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    <!-- Start:: row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Add Incident</div>
                </div>

                <form method="post" action="{{url("/admin/incidents/create", ["rental" => $rental->id])}}" class="row row-cols-lg-auto g-3 align-items-center">
                    @csrf
                    <div class="card-body">
                        <div class="row gy-4">
                            {{--                        Title  --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Name Service</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Name Service"/>
                                @error("title")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            {{--                        thumbnail  --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-file" class="form-label">Upload Thumbnail</label>
                                <input name="thumbnail" class="form-control" type="file" id="input-file" />
                                @error("thumbnail")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            {{--                        description--}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="text-area" class="form-label">Enter Car Description</label>
                                <textarea class="form-control" name="description" id="text-area" rows="1"></textarea>
                                @error("description")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12"></div>

                            {{-- expense --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Price</label>
                                <input type="number" class="form-control" name="expense" placeholder="Enter Price" />
                                @error("expense")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Add Incident</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End:: row -->
@endsection


