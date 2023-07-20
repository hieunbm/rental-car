@extends('web.layout.layout')
@section("name")
    Our Cars
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
                            @include("web.html.car.cars")
                        </div>
                    </div>
                </div>
                <div class="ms-auto float-end">
                    {!! $cars->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
                </div>
            </div>
        </section>
    </div>
    <a href="#" id="back-to-top"></a>
@endsection
