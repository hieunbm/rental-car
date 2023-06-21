@extends("admin.layout.layout")
@section("title","Car Rental Contract")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    <div class="row">
        <div class="col-xl-9">
            <div class="card custom-card">
                <div class="card-header d-md-flex d-block">
                    <div class="h5 mb-0 d-sm-flex d-bllock align-items-center">
                        <div class="avatar avatar-sm"><img src="../dashboard/images/brand-logos/toggle-logo.png"
                                                           alt=""></div>
                        <div class="ms-sm-2 ms-0 mt-sm-0 mt-2">
                            <div class="h6 fw-semibold mb-0">CAR RENTAL CONTRACT : <span
                                    class="text-primary">#8140-2099</span>
                            </div>
                        </div>
                    </div>
                    <div class="ms-auto mt-md-0 mt-2">
                        <button class="btn btn-sm btn-secondary me-1" onclick="javascript:window.print();">Print<i
                                class="ri-printer-line ms-1 align-middle d-inline-block"></i></button>
                        <button class="btn btn-sm btn-primary">Save As PDF<i
                                class="ri-file-pdf-line ms-1 align-middle d-inline-block"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-12">
                                    <h4 style="text-align: center; margin-bottom: 20px">
                                        CAR RENTAL CONTRACT
                                    </h4>
                                    <div style="float: right; margin-bottom: 20px">
                                        <span>No: 2343</span>
                                        <br>
                                        <span>Contact Date: 22/34/3454</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p>- According to the Civil Code became effective as from 01st January 2006;</p>
                                    <p>- According to ability and requirement of both parties.</p>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                    <p class="text-muted mb-2">LEADER (Party A) : </p>
                                    <p class="fw-bold mb-1"> SPRUKO TECHNOLOGIES </p>
                                    <p class="mb-1 text-muted"> Mig-1-11,Manroe street </p>
                                    <p class="mb-1 text-muted"> Georgetown,Washington D.C,USA,200071 </p>
                                    <p class="mb-1 text-muted"> sprukotrust.ynex@gmail.com </p>
                                    <p class="mb-1 text-muted"> (555) 555-1234 </p>
                                    <p class="text-muted">For more information check for <a
                                            href="javascript:void(0);" class="text-primary fw-semibold"><u>GSTIN</u></a>
                                        Details.</p></div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 ms-auto mt-sm-0 mt-3">
                                    <p class="text-muted mb-2">TENDER (Party B) : </p>
                                    <p class="fw-bold mb-1">Full Name: {{$rental->customer->name}} </p>
                                    <p class="text-muted mb-1">Address: {{$rental->address}} </p>
                                    <p class="text-muted mb-1">Email: {{$rental->email}} </p>
                                    <p class="text-muted">Phone: {{$rental->customer->phone}} </p></div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <p class="fw-semibold text-muted mb-1">Invoice ID :</p>
                            <p class="fs-15 mb-1">{{$rental->id}}</p></div>
                        <div class="col-xl-3">
                            <p class="fw-semibold text-muted mb-1">Rental Date :</p>
                            <p class="fs-15 mb-1">{{$rental->rental_date}}</p>
                        </div>
                        <div class="col-xl-3">
                            <p class="fw-semibold text-muted mb-1">Return Date :</p>
                            <p class="fs-15 mb-1">{{$rental->return_date}}</p></div>
                        <div class="col-xl-3">
                            <p class="fw-semibold text-muted mb-1">Due Amount :</p>
                            <p class="fs-16 mb-1 fw-semibold">${{$rental->total_amount}}</p></div>
                        <div class="col-xl-12">
                            <div class="row">
                                <h6 class="col-12" style="text-align: center">
                                    SERVICE INFORMATION
                                </h6>
                                <div class="col-xl-3"></div>
                                <div class="col-xl-6 table-responsive">
                                    @if($rental->service->count() > 0 )
                                        <table class="table nowrap text-nowrap border mt-4">
                                            <thead>
                                            <tr>
                                                <th>SERVICE</th>
                                                <th>PRICE</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($rental->service as $item)
                                                <tr>
                                                    <td>{{$item->title}}</td>
                                                    <td>{{$item->price}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p style="text-align: center">Khoong sử dụng dịch vụ</p>
                                    @endif

                                </div>
                                <div class="col-xl-3"></div>
                            </div>

                        </div>
                        <div class="col-xl-12">
                            <div class="row">
                                <h6 class="col-12" style="text-align: center">
                                    ADDITIONAL COSTS
                                </h6>
                                <div class="col-xl-3"></div>
                                <div class="col-xl-6 table-responsive">
                                    @if($rental->incident->count() > 0)
                                        <table class="table nowrap text-nowrap border mt-4">
                                            <thead>
                                            <tr>
                                                <th>TITLE</th>
                                                <th>EXPENSE</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($rental->incident as $item)
                                                <tr>
                                                    <td>{{$item->title}}</td>
                                                    <td>{{$item->expense}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p style="text-align: center">Không có chi phí phụ</p>
                                    @endif

                                </div>
                                <div class="col-xl-3"></div>
                            </div>

                        </div>
                        <div class="col-xl-12">
                            <h6 style="text-align: center">
                                CAR INFORMATION
                            </h6>
                            <div class="table-responsive">
                                <table class="table nowrap text-nowrap border mt-4">
                                    <thead>
                                    <tr>
                                        <th>CAR</th>
                                        <th>RENTAL DATE</th>
                                        <th>RETURN DATE</th>
                                        <th>PICKUP LOCATION</th>
                                        <th>TOTAL DAYS</th>
                                        <th>TOTAL CAR BOOKING</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$rental->car->model}}</td>
                                        <td>{{$rental->rental_date}}</td>
                                        <td>{{$rental->return_date}}</td>
                                        <td>{{$rental->pickup_location}}</td>
                                        <td>{{$numberdays}}</td>
                                        <td> ${{$rental->car_price * $numberdays}}</td>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="3">
                                            <table class="table table-sm text-nowrap mb-0 table-borderless">
                                                <tbody>
                                                <tr>
                                                    <th scope="row"><p class="mb-0">Payment Status :</p></th>
                                                    <td><p class="mb-0 fw-semibold fs-15">
                                                            @if($rental->is_paid)
                                                                <span class="badge bg-success">Pain</span>
                                                            @else
                                                                <span class="badge bg-danger">UnPain</span>
                                                            @endif
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><p class="mb-0">Sub Total :</p></th>
                                                    <td><p class="mb-0 fw-semibold fs-15">${{$rental->car_price * $numberdays}}</p></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><p class="mb-0">Service Total :</p></th>
                                                    <td><p class="mb-0 fw-semibold fs-15">${{$total}}</p></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><p class="mb-0">Additional costs Total :</p></th>
                                                    <td><p class="mb-0 fw-semibold fs-15">${{$totalFee}}</p></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><p class="mb-0 fs-14">Total :</p></th>
                                                    <td><p class="mb-0 fw-semibold fs-16 text-success">${{$rental->total_amount}}</p>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <p>
                                <b>After discussion, both Parties have agreed to sign this contract on the terms and conditions as follows:</b>
                            </p>
                            <p><b>Article 1:</b> Rental period:</p>
                            <p>1.1 Rental period is {{$numberdays}} days from {{$rental->rental_date}} to {{$rental->return_date}}</p>
                            <p>1.2 Mileage Limit: {{$rental->car->km_limit}} Km/Day.</p>
                            <p>1.3 Place to pick up passengers: {{$rental->pickup_location}}.</p>
                            <p><b>Article 2:</b> Rental vehicles and charges</p>
                            <p>2.1 Rental vehicles: {{$rental->car->model}} : ${{$rental->car_price}}/day</p>
                            <p>2.2 Other charges:</p>
                            <p>- Over Limited Mileage rate (excess of .......kms/....days)    : USD ............/km.</p>
                            <p>2.3 All charges are inclusive of Value Added Tax.</p>
                            <p>2.4(if any) Car rental charges include gasoline and driver's salary, driver’s daily lunch.</p>
                            <p>2.5 Timely delivery of the vehicle will be paid by Party A.</p>
                            <p>2.6 Check the car, Receive the car , All costs and expenses occurred as the consequence of traffic accident will be at Party B's account.</p>
                            <p><b>Article 3:</b> Payment </p>
                            <p>3.1 All rates are quoted in USD.</p>
                            <p><b>Article 4:</b> Other terms and conditions</p>
                            <p>4.1 Party A is responsible for all legal documents and formalities for transportation of the above-mentioned vehicle.</p>
                            <p>4.2 Party B is not allowed to bring any illegal, flammable, or explosive materials into the vehicle.</p>
                            <p>4.3 Party B pay all fuel costs when using the vehicle.</p>
                            <p>4.4 In case of accident, any liability and settlement of claim lodged by third Parties will be the sole responsibility of Party B.</p>
                            <p>4.5 Insuring car and passengers (US$10,000 for each person) are the responsibility of  Party B.</p>
                            <p>4.6 The terms of this contract are confidential. Both Parties agree not to disclose them to any person unless applicable law requires.</p>
                        </div>
                        <div class="col-xl-12">
                            <div>
                                <label for="invoice-note" class="form-label">Note:</label>
                                <textarea class="form-control form-control-light" id="invoice-note" rows="3">Once the invoice has been verified by the accounts payable team and recorded, the only task left is to send it for approval before releasing the payment</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <b style="float: left">
                        @switch($rental->status)
                            @case(0) <span
                                class="text text-dark">Pending</span>@break
                            @case(1) <span
                                class="text text-blue">Confirmed</span>@break
                            @case(2) <span
                                class="text text-warning">In Progress</span>@break
                            @case(3) <span
                                class="text text-success">Completed</span>@break
                            @case(4) <span
                                class="text text-danger">Cancel</span>@break
                        @endswitch
                    </b>
                    @switch($rental->status)
                        @case(0)
                            <a href="{{url("admin/booking/comfirm", ["rental" => $rental->id])}}" class="btn btn-success float-right">
                                <i class="far fa-credit-card"></i>
                                Confirm
                            </a>
                            <a href="{{url("admin/booking/cancel", ["rental" => $rental->id])}}" class="btn btn-danger float-right">
                                <i class="far fa-credit-card"></i>
                                Cancel
                            </a>
                            @break
                        @case(1)
                            <a href="{{url("admin/booking/in-progress", ["rental" => $rental->id])}}" class="btn btn-success float-right">
                                <i class="far fa-credit-card"></i>
                                In Progress
                            </a>
                            <a href="{{url("admin/booking/cancel", ["rental" => $rental->id])}}" class="btn btn-danger float-right">
                                <i class="far fa-credit-card"></i>
                                Cancel
                            </a>
                            @break
                        @case(2)
                            <a href="{{url("admin/booking/complete", ["rental" => $rental->id])}}" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                Completed
                            </a>
                            <a href="#" class="btn btn-danger float-right"><i class="far fa-credit-card"></i> Submit
                                Incident
                            </a>
                            @break
                        @case(3)
                            @break
                        @case(4)
                            @break
                    @endswitch
                    <button class="btn btn-success">Download <i class="ri-download-2-line ms-1 align-middle"></i></button>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title"> Mode Of Payment</div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-xl-12"><p class="fs-14 fw-semibold"> Credit/Debit Card </p>
                            <p><span class="fw-semibold text-muted fs-12">Name On Card :</span> Json Taylor </p>
                            <p><span class="fw-semibold text-muted fs-12">Card Number :</span> 1234 5678 9087 XXXX
                            </p>
                            <p><span class="fw-semibold text-muted fs-12">Total Amount :</span> <span
                                    class="text-success fw-semibold fs-14">$2570.42</span></p>
                            <p><span class="fw-semibold text-muted fs-12">Due Date :</span> 29,Dec 2022 - <span
                                    class="text-danger fs-12 fw-semibold">30 days due</span></p>
                            <p><span class="fw-semibold text-muted fs-12">Invoice Status : <span
                                        class="badge bg-warning-transparent">Pending</span></span></p>
                            <div class="alert alert-success" role="alert"> Please Make sure to pay the invoice bill
                                within 30 days.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
