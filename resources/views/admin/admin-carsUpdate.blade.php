@extends("admin.layout.layout")
@section("title","Update Car")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    <!-- Start:: row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                    <li class="nav-item" role="presentation">
                        <div class="card-header justify-content-between">
                            <div class="card-title">Update Car</div>
                        </div>
                    </li>
                <form action="{{url("/admin/cars/edit", $cars->id)}}" method="post" class="row row-cols-lg-auto g-3 align-items-center" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row gy-4">
                            {{--                        License_plate--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter License Plate</label> <input
                                    type="text" name="license_plate" value="{{$cars->license_plate}}" class="form-control" id="input-placeholder"
                                    placeholder="Enter License Plate"/>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            {{--                        Model--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Model</label> <input value="{{$cars->model}}" name="model" type="text"
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
                                        <option value="{{$br->id}}" @if($cars->brand_id == $br->id) selected @endif>
                                            {{$br->name}}
                                        </option>
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
                                        <option value="{{$ct->id}}"@if($cars->carTypes_id == $ct->id) selected @endif>
                                            {{$ct->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            {{--                        Thumbnail--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-file" class="form-label">Upload Photos</label>
                                <input value="{{$cars->thumbnail}}" class="form-control" name="thumbnail" type="file" id="input-file"/>
                                <span style="display: flex;justify-content: center"><img style="width: 250px;height: 200px;object-fit: contain;" src="{{$cars->thumbnail}}"></span>
                            </div>
                            {{--                        FuelType--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Fuel Type</label> <input
                                    type="text" name="fuelType" value="{{$cars->fuelType}}" class="form-control" id="input-placeholder"
                                    placeholder="Enter Fuel Type"/>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            {{--                        Transmission--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Transmission</label> <input
                                    type="text" name="transmission" value="{{$cars->transmission}}" class="form-control" id="input-placeholder"
                                    placeholder="Enter Transmission"/>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            {{--                        KmLimit--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-number" class="form-label">Enter Km Limit</label> <input name="km_limit" type="number"
                                                                                                           class="form-control" value="{{$cars->km_limit}}"
                                                                                                           id="input-number"
                                                                                                           placeholder="Enter Km Limit"/>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            {{--                        modelYear--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-month" class="form-label">Enter year of manufacture</label>
                                <input name="modelYear" type="number" class="form-control" value="{{$cars->modelYear}}" id="input-number" placeholder="Enter Model Year"/>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            {{--                        Seat--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-number" class="form-label">Enter Seat</label> <input name="seats" type="number"
                                                                                                       class="form-control"
                                                                                                       id="input-number" value="{{$cars->seats}}"
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
                                @if($cars->reverse_sensor==0)
                                <input class="form-check-input ms-2" type="checkbox" name="reverse_sensor" value="{{$cars->reverse_sensor}}">
                                @else
                                    <input class="form-check-input ms-2" type="checkbox" name="reverse_sensor" value="{{$cars->reverse_sensor}}" checked="1">
                                @endif
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                                <span class="mb-3 px-0 text-muted">Reverse sensor</span>

                                <br>
                                    @if($cars->airConditioner==0)
                                <input class="form-check-input ms-2" type="checkbox" name="airConditioner" value="{{$cars->airConditioner}}" >
                                    @else
                                <input class="form-check-input ms-2" type="checkbox" name="airConditioner" value="{{$cars->airConditioner}}" checked="1" >
                                    @endif
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                                <span class="mb-3 px-0 text-muted">Air Conditioner</span>
                                <br>
                                    @if($cars->driverAirbag==0)
                                <input class="form-check-input ms-2" type="checkbox" name="driverAirbag" value="{{$cars->driverAirbag}}" >
                                    @else
                                <input class="form-check-input ms-2" type="checkbox" name="driverAirbag" value="{{$cars->driverAirbag}}" checked="1" >
                                    @endif
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                                <span for="input-number" class="form-label">Driver Air Bag</span>
                                <br>
                                    @if($cars->cDPlayer==0)
                                <input class="form-check-input ms-2" type="checkbox" name="cDPlayer" value="{{$cars->cDPlayer}}">
                                    @else
                                <input class="form-check-input ms-2" type="checkbox" name="cDPlayer" value="{{$cars->cDPlayer}}" checked="1">
                                    @endif
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                                <span for="input-number" class="form-label">CD Player</span>

                                <br>
                                    @if($cars->brakeAssist==0)
                                <input class="form-check-input ms-2" type="checkbox" name="brakeAssist" value="{{$cars->brakeAssist}}">
                                    @else
                                <input class="form-check-input ms-2" type="checkbox" name="brakeAssist" value="{{$cars->brakeAssist}}" checked="1">
                                    @endif
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                                <span for="input-number" class="form-label">Brake Assist</span>

                            </div>
                            {{--                        description--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="text-area" class="form-label">Enter Car Description</label>
                                <textarea name="description" class="form-control" id="text-area" rows="1">{{$cars->description}}</textarea>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            {{--                                Rent by Day--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-number" class="form-label">Price Rent By Day</label> <input value="{{$priceday->price}}" name="rentalrate_price_day" type="number"
                                                                                                              class="form-control"
                                                                                                              id="input-number"
                                                                                                              placeholder="Enter Price"/>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            {{--                                Rent by hour--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-number" class="form-label">Price Rent By Hours</label> <input value="{{$pricehour->price}}" name="rentalrate_price_hours" type="number"
                                                                                                                class="form-control"
                                                                                                                id="input-number"
                                                                                                                placeholder="Enter Price"/>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>
                            {{--                                Desposit--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-number" class="form-label">Price Desposit</label> <input value="{{$cars->desposit}}" name="desposit" type="number"
                                                                                                           class="form-control"
                                                                                                           id="input-number"
                                                                                                           placeholder="Enter Desposit"/>
                                @error("name")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Car</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End:: row -->

@endsection
