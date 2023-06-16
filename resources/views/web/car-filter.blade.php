@extends('web.layout.layout')
@section("name")
    @if(isset($selectedBrand))
        Brand: {{ $selectedBrand }}
    @elseif(isset($selectedCarType))
        Car Type: {{ $selectedCarType }}
    @elseif(isset($selectedCarPrice))
        Car Price: {{ $selectedCarPrice }}
    @elseif(isset($selectedSeats))
        Seats : {{ $selectedSeats }}
    @endif
@endsection
@section("main")
    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        @include('web.html.breadcrumb')
        <!-- section close -->

        <section id="section-cars">
            <div class="container">
                <div class="row">
                    {{--Filter Car--}}
                    @include('web.html.car.filter-car')
                    {{--End Filter Car--}}

                    <div class="col-lg-9">
                        <div class="row">
                            @if($cars->isEmpty())
                                <div class="col-lg-12" style="text-align: center">
                                    {{--thong bao neu khong tim thay xe--}}
                                       @if(isset($selectedBrand))
                                           <p>No car found have brand {{ $selectedBrand }}!</p>
                                        @elseif(isset($selectedCarType))
                                            <p>No car found have type {{ $selectedCarType }}!</p>
                                        @elseif(isset($selectedCarPrice))
                                           <p>No car found for {{ $selectedCarPrice }}!</p>
                                        @elseif(isset( $selectedSeats ))
                                            <p>No car found have {{ $selectedSeats }} seats!</p>
                                        @endif
                                   @else
                                </div>
                                @include("web.html.car.cars")
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <a href="#" id="back-to-top"></a>
@endsection
