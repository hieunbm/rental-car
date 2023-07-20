<html>

<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
<table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px green;">
    <thead>
    <tr>
        <th style="text-align:left;"><img style="max-width: 150px;" src="https://f9-zpcloud.zdn.vn/3498997325777801273/0e67715cacf67ca825e7.jpg" alt="bachana tours"></th>
        <th style="text-align:right;font-weight:400;">{{$rental->updated_at->format('dS M, Y')}}</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="height:35px;"></td>
    </tr>
    <tr>
        <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
            <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Order status</span><b style="color:green;font-weight:normal;margin:0">
                    @switch($rental->status)
                        @case(0) <span
                            class="badge bg-dark text-white fw-bold">Pending</span>@break
                        @case(1) <span
                            class="badge bg-info text-black fw-bold">Confirmed</span>@break
                        @case(2) <span
                            class="badge bg-info text-black fw-bold">Delivery</span>@break
                        @case(3) <span
                            class="badge bg-warning text-black fw-bold">In Progress</span>@break
                        @case(4) <span
                            class="badge bg-warning text-black fw-bold">Processing</span>@break
                        @case(5) <span
                            class="badge bg-success text-black fw-bold">Completed</span>@break
                        @case(6) <span
                            class="badge bg-danger text-black fw-bold">Cancel</span>@break
                    @endswitch
                </b>
            </p>
            <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Transaction ID</span> #{{$rental->id}}</p>
            <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Order amount</span> $ {{$rental->total_amount}}</p>
        </td>
    </tr>
    <tr>
        <td style="height:35px;"></td>
    </tr>
    <tr>
        <td style="width:50%;padding:20px;vertical-align:top">
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Name</span> {{$rental->customer->name}}</p>
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Email</span> {{$rental->email}}</p>
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Phone</span> {{$rental->telephone}}</p>
{{--            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">ID No.</span> 2556-1259-9842</p>--}}
        </td>
        <td style="width:50%;padding:20px;vertical-align:top">
            @if($rental->address != null)
                <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Address</span> {{$rental->address}}</p>
            @endif
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Number of gusets</span> 2</p>
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Duration of your vacation</span> 25/04/2017 to 28/04/2017 (3 Days)</p>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Items</td>
    </tr>
    <tr>
        <td colspan="2" style="padding:15px;">
            <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                <span style="display:block;font-size:13px;font-weight:normal;">{{$rental->car->model}}</span>
                ${{$rental->car_price}}
                <b style="font-size:12px;font-weight:300;"> /
                    @if($rental->rental_type == "rent by day")
                        day
                    @else
                        hour
                    @endif
                </b>
            </p>
            @foreach($rental->service as $item)
                <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                    <span style="display:block;font-size:13px;font-weight:normal;">{{$item->title}}</span>
                    ${{$item->price}} <b style="font-size:12px;font-weight:300;"> </b>
                </p>
            @endforeach
            @foreach($rental->incident as $item)
                <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                    <span style="display:block;font-size:13px;font-weight:normal;">{{$item->title}}</span>
                    ${{$item->expence}} <b style="font-size:12px;font-weight:300;"> </b>
                </p>
            @endforeach
        </td>
    </tr>
    </tbody>
    <tfooter>
        <tr>
            <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                <strong style="display:block;margin:0 0 10px 0;">Regards</strong> Bachana Tours<br> Gorubathan, Pin/Zip - 735221, Darjeeling, West bengal, India<br><br>
                <b>Phone:</b> 03552-222011<br>
                <b>Email:</b> contact@bachanatours.in
            </td>
        </tr>
    </tfooter>
</table>
</body>

</html>
