@extends("admin.layout.layout")
@section("title","Edit Incident")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    <!-- Start:: row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Update Incident</div>
                </div>

                <form method="post" action="{{url("/admin/incidents/edit",  $incident->id)}}" class="row row-cols-lg-auto g-3 align-items-center">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row gy-4">
                            {{--                        Title  --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Name Service</label>
                                <input type="text" value="{{$incident->title}}" name="title" class="form-control" placeholder="Enter Name Service"/>
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
                                <textarea class="form-control" style="height: 180px" name="description" id="text-area" rows="1">{{$incident->title}}</textarea>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <span style="display: flex;justify-content: center"><img style="width: 250px;height: 200px;object-fit: contain;" src="{{$incident->thumbnail}}"></span>
                            </div>

                            {{--                        expense--}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Price</label>
                                <input type="number" value="{{$incident->expense}}" class="form-control" name="expense" placeholder="Enter Price" />
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Incident</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End:: row -->
@endsection


