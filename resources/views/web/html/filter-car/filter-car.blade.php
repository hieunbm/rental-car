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
            <div class="de_checkbox">
                <input id="vehicle_type_1" name="vehicle_type_1" type="checkbox" value="vehicle_type_1">
                <label for="vehicle_type_1">Car</label>
            </div>

            <div class="de_checkbox">
                <input id="vehicle_type_2" name="vehicle_type_2" type="checkbox" value="vehicle_type_2">
                <label for="vehicle_type_2">Van</label>
            </div>

            <div class="de_checkbox">
                <input id="vehicle_type_3" name="vehicle_type_3" type="checkbox" value="vehicle_type_3">
                <label for="vehicle_type_3">Minibus</label>
            </div>

            <div class="de_checkbox">
                <input id="vehicle_type_4" name="vehicle_type_4" type="checkbox" value="vehicle_type_4">
                <label for="vehicle_type_4">Prestige</label>
            </div>

        </div>
    </div>

    <div class="item_filter_group">
        <h4>Brands</h4>
        <div class="de_form">
            <div class="de_checkbox">
                <input id="car_body_type_1" name="car_body_type_1" type="checkbox"
                       value="car_body_type_1">
                <label for="car_body_type_1">Convertible</label>
            </div>

            <div class="de_checkbox">
                <input id="car_body_type_2" name="car_body_type_2" type="checkbox"
                       value="car_body_type_2">
                <label for="car_body_type_2">Coupe</label>
            </div>

            <div class="de_checkbox">
                <input id="car_body_type_3" name="car_body_type_3" type="checkbox"
                       value="car_body_type_3">
                <label for="car_body_type_3">Exotic Cars</label>
            </div>

            <div class="de_checkbox">
                <input id="car_body_type_4" name="car_body_type_4" type="checkbox"
                       value="car_body_type_4">
                <label for="car_body_type_4">Hatchback</label>
            </div>

            <div class="de_checkbox">
                <input id="car_body_type_5" name="car_body_type_5" type="checkbox"
                       value="car_body_type_5">
                <label for="car_body_type_5">Minivan</label>
            </div>

            <div class="de_checkbox">
                <input id="car_body_type_6" name="car_body_type_6" type="checkbox"
                       value="car_body_type_6">
                <label for="car_body_type_6">Pickup Truck</label>
            </div>

            <div class="de_checkbox">
                <input id="car_body_type_7" name="car_body_type_7" type="checkbox"
                       value="car_body_type_7">
                <label for="car_body_type_7">Sedan</label>
            </div>

            <div class="de_checkbox">
                <input id="car_body_type_8" name="car_body_type_8" type="checkbox"
                       value="car_body_type_8">
                <label for="car_body_type_8">Sports Car</label>
            </div>

            <div class="de_checkbox">
                <input id="car_body_type_9" name="car_body_type_9" type="checkbox"
                       value="car_body_type_9">
                <label for="car_body_type_9">Station Wagon</label>
            </div>

            <div class="de_checkbox">
                <input id="car_body_type_10" name="car_body_type_10" type="checkbox"
                       value="car_body_type_10">
                <label for="car_body_type_10">SUV</label>
            </div>

        </div>
    </div>

    <div class="item_filter_group">
        <h4>Car Seats</h4>
        <div class="de_form">
            <div class="de_checkbox">
                <input id="car_seat_1" name="car_seat_1" type="checkbox" value="car_seat_1">
                <label for="car_seat_1">2 seats</label>
            </div>

            <div class="de_checkbox">
                <input id="car_seat_2" name="car_seat_2" type="checkbox" value="car_seat_2">
                <label for="car_seat_2">4 seats</label>
            </div>

            <div class="de_checkbox">
                <input id="car_seat_3" name="car_seat_3" type="checkbox" value="car_seat_3">
                <label for="car_seat_3">6 seats</label>
            </div>

            <div class="de_checkbox">
                <input id="car_seat_4" name="car_seat_4" type="checkbox" value="car_seat_4">
                <label for="car_seat_4">6+ seats</label>
            </div>

        </div>
    </div>

    <div class="item_filter_group">
        <h4>Car Engine Capacity (cc)</h4>
        <div class="de_form">
            <div class="de_checkbox">
                <input id="car_engine_1" name="car_engine_1" type="checkbox" value="car_engine_1">
                <label for="car_engine_1">1000 - 2000</label>
            </div>

            <div class="de_checkbox">
                <input id="car_engine_2" name="car_engine_2" type="checkbox" value="car_engine_2">
                <label for="car_engine_2">2000 - 4000</label>
            </div>

            <div class="de_checkbox">
                <input id="car_engine_3" name="car_engine_3" type="checkbox" value="car_engine_3">
                <label for="car_engine_3">4000 - 6000</label>
            </div>

            <div class="de_checkbox">
                <input id="car_engine_4" name="car_engine_4" type="checkbox" value="car_engine_4">
                <label for="car_engine_4">6000+</label>
            </div>

        </div>
    </div>

    <div class="item_filter_group">
        <h4>Price ($)</h4>
        <div class="price-input">
            <div class="field">
                <span>Min</span>
                <input type="number" class="input-min" value="0">
            </div>
            <div class="field">
                <span>Max</span>
                <input type="number" class="input-max" value="2000">
            </div>
        </div>
        <div class="slider">
            <div class="progress"></div>
        </div>
        <div class="range-input">
            <input type="range" class="range-min" min="0" max="2000" value="0" step="1">
            <input type="range" class="range-max" min="0" max="2000" value="2000" step="1">
        </div>
    </div>
</div>


