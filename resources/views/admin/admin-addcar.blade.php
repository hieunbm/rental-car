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
                <div class="card-header justify-content-between">
                    <div class="card-title">Add Car</div>
                    <div class="prism-toggle">
                        <button class="btn btn-sm btn-primary-light">Show<i
                                class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                    </div>
                </div>

                <form class="row row-cols-lg-auto g-3 align-items-center">
                    <div class="card-body">
                        <div class="row gy-4">
                            {{--                        Lisense_plate--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter License Plate</label> <input
                                    type="text" class="form-control" id="input-placeholder"
                                    placeholder="Enter License Plate"/>
                            </div>

                            {{--                        Model--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Model</label> <input type="text"
                                                                                                             class="form-control"
                                                                                                             id="input-placeholder"
                                                                                                             placeholder="Enter Model"/>
                            </div>

                            {{--                        Brand--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Choose Brand</label>
                                <select class="form-select default-pill" aria-label="Default select example">
                                    <option value="1">Audi</option>
                                    <option value="2">BMW</option>
                                    <option value="3">Lexus</option>
                                </select>
                            </div>

                            {{--                        Car Type--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Choose Car Type</label>
                                <select class="form-select default-pill" aria-label="Default select example">
                                    <option value="1">SUV</option>
                                    <option value="2">Coupe</option>
                                    <option value="3">Sedan</option>
                                </select>
                            </div>

                            {{--                        Thumbnail--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-file" class="form-label">Upload Photos</label>
                                <input class="form-control" type="file" id="input-file" multiple/>
                            </div>

                            {{--                        FuelType--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Fuel Type</label> <input
                                    type="text" class="form-control" id="input-placeholder"
                                    placeholder="Enter Fuel Type"/>
                            </div>

                            {{--                        modelYear--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-month" class="form-label">Enter year of manufacture</label>
                                <input type="month" class="form-control" id="input-month"/>
                            </div>

                            {{--                        reverse sensor--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Reverse Sensor</label>
                                <select class="form-select default-pill" aria-label="Default select example">
                                    <option value="1">Have</option>
                                    <option value="2">No</option>
                                </select>
                            </div>

                            {{--  airConditioner  --}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-number" class="form-label">Enter Air Conditioner</label> <input
                                    type="number" class="form-control" id="input-number"
                                    placeholder="Enter Air Conditioner"/>
                            </div>

                            {{--                        driverAirbag--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-number" class="form-label">Enter Airbag</label> <input type="number"
                                                                                                         class="form-control"
                                                                                                         id="input-number"
                                                                                                         placeholder="Enter Airbag"/>
                            </div>

                            {{--                        cdPlayer--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-number" class="form-label">Enter Cd</label> <input type="number"
                                                                                                     class="form-control"
                                                                                                     id="input-number"
                                                                                                     placeholder="Enter Cd"/>
                            </div>

                            {{--                        brakeAssist--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-number" class="form-label">Enter Brake Assist</label> <input
                                    type="number" class="form-control" id="input-number"
                                    placeholder="Enter Brake Assist"/>
                            </div>

                            {{--                        Status--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-placeholder" class="form-label">Enter Car Status</label> <input
                                    type="text" class="form-control" id="input-placeholder"
                                    placeholder="Enter Car Status"/>
                            </div>

                            {{--                        description--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="text-area" class="form-label">Enter Car Description</label>
                                <textarea class="form-control" id="text-area" rows="1"></textarea>
                            </div>

                            {{--                        Rate--}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-number" class="form-label">Enter Rate</label> <input type="number"
                                                                                                       class="form-control"
                                                                                                       id="input-number"
                                                                                                       placeholder="Enter Rate"/>
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
    <!-- End:: row -->

@endsection
