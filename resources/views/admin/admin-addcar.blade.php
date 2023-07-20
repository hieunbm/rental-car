@extends("admin.layout.layout")
@section("title","Add Car")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    <!-- Start:: row -->
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
                <form action="{{url("/admin/add-car")}}" method="post" class="row row-cols-lg-auto g-3 align-items-center" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row gy-4">
                            {{--                        Lisense_plate--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter License Plate</label> <input
                                    type="text" name="license_plate" class="form-control" id="input-placeholder"
                                    placeholder="Enter License Plate"/>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            {{--                        Model--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Model</label> <input name="model" type="text"
                                                                                                             class="form-control"
                                                                                                             id="input-placeholder"
                                                                                                             placeholder="Enter Model"/>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>


                            {{--                        Brand--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Choose Brand</label>
                                <select name="brand_id" class="form-select default-pill" aria-label="Default select example">
                                    @foreach($brands as $br)
                                    <option value="{{$br->id}}">{{$br->name}}</option>
                                    @endforeach
                                </select>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            {{--                        Car Type--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Choose Car Type</label>
                                <select name="carType_id" class="form-select default-pill" aria-label="Default select example">
                                    @foreach($carTypes as $ct)
                                        <option value="{{$ct->id}}">{{$ct->name}}</option>
                                    @endforeach
                                </select>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            {{--                        Thumbnail--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-file" class="form-label">Upload Photos</label>
                                <input class="form-control" name="thumbnail" type="file" id="input-file"/>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            {{--                        FuelType--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Fuel Type</label> <input
                                    type="text" name="fuelType" class="form-control" id="input-placeholder"
                                    placeholder="Enter Fuel Type"/>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            {{--                        Transmission--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Transmission</label> <input
                                    type="text" name="transmission" class="form-control" id="input-placeholder"
                                    placeholder="Enter Transmission"/>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            {{--                        KmLimit--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-number" class="form-label">Enter Km Limit</label> <input min="0" name="km_limit" type="number"
                                                                                                       class="form-control"
                                                                                                       id="input-number"
                                                                                                       placeholder="Enter Km Limit"/>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            {{--                        modelYear--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-month" class="form-label">Enter year of manufacture</label>
                                <input name="modelYear" min="1" type="number" class="form-control" id="input-number" placeholder="Enter Model Year"/>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>


                            {{--                        Seat--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-number"  class="form-label">Enter Seat</label> <input min="1" name="seats" type="number"
                                                                                                       class="form-control"
                                                                                                       id="input-number"
                                                                                                       placeholder="Enter Seat"/>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            {{--                        Status--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Status</label>
                                <select name="status" class="form-select default-pill" aria-label="Default select example">
                                    <option value="0">Rentable</option>
                                    <option value="1">Unrentable</option>
                                    <option value="2">Repairing</option>
                                </select>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            {{--                        reverse sensor--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <input class="form-check-input ms-2" type="checkbox" name="reverse_sensor" value="1">

                            <span class="mb-3 px-0 text-muted">Reverse sensor</span>

                                <br>
                                <input class="form-check-input ms-2" type="checkbox" name="airConditioner" value="1">

                                <span class="mb-3 px-0 text-muted">Air Conditioner</span>
                                <br>
                                <input class="form-check-input ms-2" type="checkbox" name="driverAirbag" value="1">

                                <span for="input-number" class="form-label">Driver Air Bag</span>
                                <br>
                                <input class="form-check-input ms-2" type="checkbox" name="cDPlayer" value="1" >

                                <span for="input-number" class="form-label">CD Player</span>

                                <br>
                                <input class="form-check-input ms-2" type="checkbox" name="brakeAssist" value="1">

                                <span for="input-number" class="form-label">Brake Assist</span>

                            </div>
                            {{--                        description--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="text-area" class="form-label">Enter Car Description</label>
                                <textarea name="description" class="form-control" id="text-area" rows="1"></textarea>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            {{--                                Rent by Day--}}
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-number" class="form-label">Price Rent By Day</label> <input min="1" name="rentalrate_price_day" type="number"
                                                                                                       class="form-control"
                                                                                                       id="input-number"
                                                                                                       placeholder="Enter Rate"/>
                                    @error("name")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                            </div>
                            {{--                                Rent by hour--}}
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-number" class="form-label">Price Rent By Hour</label> <input min="1" name="rentalrate_price_hours" type="number"
                                                                                                       class="form-control"
                                                                                                       id="input-number"
                                                                                                       placeholder="Enter Rate"/>
                                    @error("name")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                            </div>
                            {{--                                Desposit--}}
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-number" class="form-label">Price Desposit</label> <input min="1" name="desposit" type="number"
                                                                                                       class="form-control"
                                                                                                       id="input-number"
                                                                                                       placeholder="Enter Desposit"/>
                                    @error("name")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Add Car</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Sử dụng jQuery để theo dõi sự kiện khi checkbox thay đổi trạng thái
        $(document).ready(function () {
            $('input[type="checkbox"]').change(function () {
                // Nếu checkbox được chọn, giá trị của input là 1; nếu không, giá trị là 0
                $(this).val(this.checked ? 1 : 0);
            });
        });
    </script>
    <!-- End:: row -->

@endsection
