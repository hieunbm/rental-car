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
                                <h4>Login</h4>
                                <div class="spacer-10"></div>
                                <form id="form_register" class="form-border" method="post" action="{{route("login")}}">
                                    @csrf
                                    <div class="field-set">
                                        <input type="email" name="email" id="name" class="form-control" placeholder="email" />
                                    </div>
                                    <br>
                                    <div class="field-set">
                                        <input type="password" name="password" id="name" class="form-control" placeholder="password" />
                                    </div>
                                    <br>
                                    <div id="submit">
                                        <input type="submit" id="send_message" value="Sign In" class="btn-main btn-fullwidth rounded-3" />
                                    </div>
                                </form>
                                <br>
                                <div>Don't have an account? <a href="{{url("/register")}}">&nbsp;Register now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
