<div class="col-lg-3">
    <div class="item_filter_group">
        <h4>Search Car</h4>
        <form action="/car-search" method="get">
            <div class="input-group">
                <input type="text" value="{{app("request")->input('q')}}" name="q" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" style="border-color: rgb(222,222,222)" />
                <button style="font-size: 12px" type="submit" class="btn btn-primary">search</button>
            </div>
        </form>
    </div>

    <div class="item_filter_group">
        <h4>Car Type</h4>
        <div class="de_form">
            @foreach($carTypes as $item1)
                <div class="de_checkbox">
                    <a class="icon-link icon-link-hover" href="{{url("/car-filter/type",["carType"=>$item1->slug])}}">
                        <button type="button" class="btn btn-outline-success btn-sm"><span>{{$item1->name}}</span>
                            <img src="{{$item1->icon}}" class="img-fluid" alt="" width="28px">
                        </button>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="item_filter_group">
        <h4>Brands</h4>
        <div class="de_form">
            @foreach($brands as $item)
            <div class="de_checkbox">
                <a class="icon-link icon-link-hover" href="{{url("/car-filter/brand",["brand"=>$item->slug])}}">
                    <button type="button" class="btn btn-outline-success btn-sm">{{$item->name}}
                        <img src="{{$item->icon}}" class="img-fluid" alt="" width="28px">
                    </button>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="item_filter_group">
        <h4>Car Seats</h4>
        <div class="de_form">
            @foreach($seatsOptions as $seatsOption)
                <div class="de_checkbox">
                    <a class="icon-link icon-link-hover" href="{{ url('/car-filter/seats', ['seats' => $seatsOption]) }}">
                        <button type="button" class="btn btn-outline-success btn-sm">
                            Seats: {{ $seatsOption }}
                        </button>
                    </a>
                </div>
            @endforeach
        </div>
    </div>


    <div class="item_filter_group">
        <h4>Price ($)</h4>
        <form action="{{ url('/car-filter/price') }}" method="get" id="price-filter-form">
            <div class="price-input">
                <div class="field">
                    <span>Min:</span>
                    <input type="number" class="input-min" name="min_price" value="{{ app('request')->input('min_price', 0) }}">
                </div>
                <div class="field">
                    <span>Max:</span>
                    <input type="number" class="input-max" name="max_price" value="{{ app('request')->input('max_price', 500) }}">
                </div>
            </div>
            <div class="slider">
                <div class="progress"></div>
            </div>
            <div class="range-input">
                <input type="range" class="range-min" min="0" max="500" name="min_price_range" value="{{ app('request')->input('min_price', 0) }}" step="1">
                <input type="range" class="range-max" min="0" max="500" name="max_price_range" value="{{ app('request')->input('max_price', 500) }}" step="1">
            </div>
            <button type="submit" class="btn btn-primary btn-filter">Filter</button>
        </form>
    </div>
</div>
<style>
    .de_checkbox{
        margin-left: -25px;
        padding-bottom: 8px;
    }
    .btn-outline-success{
        border-radius: 8px;
        border: 2px solid rgb(120,202,92);
        color: #727272;
        width: 200px;
    }
    .btn-outline-success:hover {
        border-color: rgb(120,202,92);
        background-color: rgb(120,202,92);
    }
    .btn-filter{
        margin-top: 15px;
    }
</style>

