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
                                        @error('email')
                                        <span style="font-size: 12px; font-weight: bold" class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}" style="background-color: rgba(0, 0, 0, .025);border: solid 2px #eeeeee;height: 45px;"/>
                                    </div>
                                    <br>
                                    <div class="field-set">
                                        @error('password')
                                        <span style="font-size: 12px; font-weight: bold" class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="{{ old('password') }}"/>
                                        <i class="fas fa-eye" id="toggle-password" onclick="togglePasswordVisibility('password', 'toggle-password')"></i>
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

    <style>
        .fa-eye {
            position: absolute;
            margin-top: -41px;
            margin-left: 300px;
        }
        .fa-eye-slash {
            position: absolute;
            margin-top: -41px;
            margin-left: 300px;
        }
    </style>

    <script>
        function togglePasswordVisibility(inputId, iconId) {
            var input = document.getElementById(inputId);
            var icon = document.getElementById(iconId);

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
@endsection
