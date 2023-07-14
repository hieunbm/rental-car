@extends('web.layout.layout')
@section("name","Review")
@section("main")
    <style>
        .card {
            width: 800px;
            box-shadow: 3px 3px 9px #e9ecef;
            border-radius: 12px;
            padding-top: 15px;
            border: solid 1px #dddddd;
        }

        .circle-image img {

            border: 6px solid #fff;
            border-radius: 100%;
            padding: 0px;
            top: -28px;
            position: relative;
            width: 70px;
            height: 70px;
            border-radius: 100%;
            z-index: 1;
            background: #e7d184;
            cursor: pointer;

        }

        .rate {

            border-bottom-right-radius: 12px;
            border-bottom-left-radius: 12px;

        }


        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center
        }

        .rating > input {
            display: none
        }

        .rating > label {
            position: relative;
            width: 1em;
            font-size: 30px;
            font-weight: 300;
            color: #FFD600;
            cursor: pointer
        }

        .rating > label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating > label:hover:before,
        .rating > label:hover ~ label:before {
            opacity: 1 !important
        }

        .rating > input:checked ~ label:before {
            opacity: 1
        }

        .rating:hover > input:checked ~ label:before {
            opacity: 0.4
        }


        .buttons {
            top: 36px;
            position: relative;
        }


        .rating-submit {
            border-radius: 15px;
            color: #fff;
            height: 49px;
        }


        .rating-submit:hover {

            color: #fff;
        }

        .comment-area textarea {
            margin-left: 95px;
            width: 600px;
            resize: none;
            border: 1px solid #ad9f9f;
        }
    </style>
    <!-- content begin -->
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <!-- section begin -->
        @include('web.html.breadcrumb')
        <!-- section close -->

        <section aria-label="section">
            <div class="container">
                <div class="row g-custom-x">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <form name="contactForm" id="contact_form" class="form-border" method="post">
                            @csrf
                            <div class="card text-center mb-5">
                                <div class="row" style="margin-left: 85px; margin-right: 85px">
                                    <div class="col-md-3 mb-4 mb-md-0">
                                        <div class="bg-image ripple rounded-5 mb-4 overflow-hidden d-block" data-ripple-color="light">
                                            <img
                                                src="{{$rental->car->thumbnail}}"
                                                class="w-100" height="100px" alt="Elegant shoes and shirt"/>
                                            <a href="#">
                                                <div class="hover-overlay">
                                                    <div class="mask" style="background-color: hsla(0, 0%, 98.4%, 0.2)"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <div class="row" style="text-align: left">
                                            <p class="col-lg-12 fw-bold">{{$rental->car->model}}</p>
                                            <p class="col-lg-12 mb-1">
                                                <span class="text-muted me-2">Seats:</span><span>{{$rental->car->seats}}</span>
                                            </p>
                                            <p>
                                                <span class="col-lg-12 text-muted me-2">License Plate:</span><span>{{$rental->car->license_plate}}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-4 mb-md-0">
                                        <h5 class="mb-2">
                                            <span class="align-middle">$ {{$rental->car->price}} /Day</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="comment-area">
                                    <textarea class="form-control" name="message" placeholder="what is your view?" rows="4"></textarea>
                                </div>
                                <div class="rate bg-success py-3 text-white mt-3">
                                    <h6 class="mb-0">Rate your car</h6>
                                    <div class="rating" id="rating">
                                        <input type="radio" name="score" value="5" id="5"><label for="5">☆</label>
                                        <input type="radio" name="score" value="4" id="4"><label for="4">☆</label>
                                        <input type="radio" name="score" value="3" id="3"><label for="3">☆</label>
                                        <input type="radio" name="score" value="2" id="2"><label for="2">☆</label>
                                        <input type="radio" name="score" value="1" id="1"><label for="1">☆</label>
                                    </div>
                                    <div class="buttons px-4 mt-0">
                                        <button class="btn btn-warning btn-block rating-submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->
    <a href="#" id="back-to-top"></a>
    <style type=""></style>
@endsection

