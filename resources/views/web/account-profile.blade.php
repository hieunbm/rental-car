@extends('web.layout.layout')
@section("name")
    My Profile
@endsection
@section("main")
    <!-- content begin -->
    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        @include('web.html.breadcrumb')
        <!-- section close -->

        <section id="section-settings" class="bg-gray-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 mb30">
                        <div class="card p-4 rounded-5">
                            <div class="profile_avatar">
                                <div class="profile_img">
                                    <img src="images/profile/1.jpg" alt="">
                                </div>
                                <div class="profile_name">
                                    <h4>
                                        {{auth()->user()->name}}
                                        <span class="profile_username text-gray">{{auth()->user()->email}}</span>
                                    </h4>
                                </div>
                            </div>
                            <div class="spacer-20"></div>
                            <ul class="menu-col">
                                <li><a href="{{url("/account-dashboard")}}"><i class="fa fa-home"></i>Dashboard</a></li>
                                <li><a href="{{url("/account-profile")}}" class="active"><i class="fa fa-user"></i>My Profile</a></li>
                                <li><a href="{{url("/account-booking")}}"><i class="fa fa-calendar"></i>My Orders</a></li>
                                <li>
                                    <form action="{{route("logout")}}" method="post">
                                        @csrf
                                        <button style="border: none; background-color: white; width: 100%;text-align: left;margin-left: 5px"
                                                class="menu-item" type="submit"><i class="fa fa-sign-out"></i>Sign out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{--Update Infomation Profile--}}
                    <div class="col-lg-9">
                        <div class="card p-4  rounded-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="form-create-item" class="form-border" method="post" action="{{url("/account-profile")}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="de_tab tab_simple">

                                            <ul class="menu-content">
                                                <li class="menu-content-profile"><h4>Profile</h4></li>
                                                <li class="menu-content-licenses"><h4><a href="{{url("/account-profile-licenses")}}">Driving license</a></h4></li>
                                                @error('success')
                                                <span class="text-danger">( {{ $message }} )</span>
                                                @enderror
                                            </ul>

                                            @if(session('success'))
                                                <div class="col-lg-6 mb20">
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                        <span class="close-icon"><i class="fa-solid fa-xmark"></i></span>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="de_tab_content">
                                                <div class="tab-1">
                                                    <div class="row">
                                                        <div class="col-lg-6 mb20">
                                                            <h5>Username</h5>
                                                            <input type="text" name="name" value="{{$user->name}}"  class="form-control"/>
                                                        </div>
                                                        <div class="col-lg-6 mb20">
                                                            <h5>Email Address
                                                                @error('email')
                                                                <span class="text-danger">( {{ $message }} )</span>
                                                                @enderror</h5>
                                                            <input type="text" name="email" value="{{$user->email}}" class="form-control"/>
                                                        </div>
                                                        <div class="col-md-6 mb20">
                                                            <h5>Phone Number
                                                                @error('phone')
                                                                <span class="text-danger">( {{ $message }} )</span>
                                                                @enderror
                                                            </h5>
                                                            <input type="text" name="phone" value="{{$user->phone}}" class="form-control"/>
                                                        </div>
                                                        <div class="col-lg-6 mb20">
                                                            <h5>Old Password
                                                                @error('old_password')
                                                                <span class="text-danger">( {{ $message }} )</span>
                                                                @enderror
                                                            </h5>
                                                            <input type="password" name="old_password" id="old_password" class="form-control" placeholder="********" value="{{ old('old_password') }}"/>
                                                            <i class="fa-solid fa-eye" id="toggle-old-password" onclick="togglePasswordVisibility('old_password', 'toggle-old-password')"></i>
                                                        </div>
                                                        <div class="col-lg-6 mb20">
                                                            <h5>New Password
                                                                @error('new_password')
                                                                <span class="text-danger">( {{ $message }} )</span>
                                                                @enderror</h5>
                                                            <input type="password" name="new_password" id="new_password" class="form-control" placeholder="********" value="{{ old('new_password') }}"/>
                                                            <i class="fa-solid fa-eye" id="toggle-new-password" onclick="togglePasswordVisibility('new_password', 'toggle-new-password')"></i>
                                                        </div>
                                                        <div class="col-lg-6 mb20">
                                                            <h5>Re-enter New Password
                                                                @error('new_password')
                                                                <span class="text-danger">( {{ $message }} )</span>
                                                                @enderror
                                                            </h5>
                                                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" placeholder="********"/>
                                                            <i class="fa-solid fa-eye" id="toggle-confirm-password" onclick="togglePasswordVisibility('new_password_confirmation', 'toggle-confirm-password')"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" id="submit" class="btn-main">Update profile</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--End Update Infomation Profile--}}
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->


    <style>
        .menu-content{
            list-style: none;
            display: flex;
        }
        .menu-content-profile{
            margin-left: -32px;
        }
        .menu-content-profile h4{
            color: #189E1C;
        }
        .menu-content-licenses a{
            padding-left: 30px;
            color: #ACACAC;
        }
        .de_tab_content{
            margin-top: -30px;
        }
        .text-danger{
            font-size: 12px;
        }
        .fa-eye{
            position: absolute;
            margin-top: -41px;
            margin-left: 400px;
        }
        .fa-eye-slash{
            position: absolute;
            margin-top: -41px;
            margin-left: 400px;
        }
        .close-icon{
            cursor: pointer;
            padding-left: 160px;
        }
        .alert.alert-success {
            position: relative;
            border-radius: 5px;
            padding: 10px;
            animation-name: fadeOut;
            animation-duration: 0.5s;
            animation-delay: 4.5s;
            animation-fill-mode: forwards;
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
                transform: scale(1);
                border-color: #189E1C;
            }

            50% {
                opacity: 0.5;
                transform: scale(1.1);
                border-color: #189E1C;
            }

            100% {
                opacity: 0;
                transform: scale(1.2);
                border-color: transparent;
            }
        }
    </style>
    <a href="#" id="back-to-top"></a>
    <script>
        function togglePasswordVisibility(inputId, iconId) { //nhấn icon eye để hiển thị mật khẩu
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

        var closeIcons = document.querySelectorAll('.close-icon'); //đóng thông báo
        closeIcons.forEach(function(icon) {
            icon.addEventListener('click', function() {
                var alert = this.parentElement;
                alert.style.display = 'none';
            });
        });
        setTimeout(function() {
            var alert = document.querySelector('.alert.alert-success'); //sau 5s tu dong mat
            if (alert) {
                alert.style.animationName = 'fadeOut';
                setTimeout(function() {
                    alert.remove();
                }, 500);
            }
        }, 5000);
    </script>

@endsection
