@extends('web.layout.layout')

@section('main')
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <section id="section-hero" aria-label="section" class="jarallax">
            <img src="images/background/2.jpg" class="jarallax-img" alt="">
            <div class="v-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 offset-lg-4">
                            <div class="padding40 rounded-3 shadow-soft" data-bgcolor="#ffffff">
                                <h4>Register</h4>
                                <div class="spacer-10"></div>
                                <form id="form_register" class="form-border" method="post" action="{{route("register")}}">
                                    @csrf
                                    <div class="field-set">
                                        <input type="text" name="name" class="form-control" placeholder="Full name" />
                                    </div>
                                    <br>
                                    <div class="field-set">
                                        <input type="email" name="email" class="form-control" placeholder="Email" />
                                    </div>
                                    <br>
                                    <br>
                                    <div class="field-set">
                                        <input type="password" name="password" class="form-control" placeholder="Password" />
                                    </div>
                                    <br>
                                    <div class="field-set">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Retype Password" />
                                    </div>
                                    <br>
                                    <div id="submit">
                                        <input type="submit" id="send_message" value="Register" class="btn-main btn-fullwidth rounded-3" />
                                    </div>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
