@extends('web.layout.layout')
@section("name")
    My License
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
                                    <img src="images/misc/avatar.jpg" alt="">
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

                    {{--Driving licenses--}}
                    <div class="col-md-9">
                        <div class="card p-4  rounded-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="form-create-item" class="form-border" method="post" action="{{url("/account-profile-licenses")}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="de_tab tab_simple">
                                                <ul class="menu-content">
                                                    <li class="menu-content-profile"><h4><a href="{{url("/account-profile")}}">Profile</a></h4></li>
                                                    <li class="menu-content-licenses"><h4>Driving license</h4></li>
                                                @switch ($user->status)
                                                    @case(0)<span class="badge bg-warning">Unconfirmed</span>@break
                                                    @case(1)<span class="badge bg-info">Awaiting Confirmation</span>@break
                                                    @case(2)<span class="badge bg-success">Verified</span>@break
                                                    @case(3)<span class="badge bg-danger">Invalid (Please re-verify)</span>@break
                                                @endswitch
                                                </ul>

                                            <input type="hidden" id="status" name="status" value="{{ $user->status }}" />

                                            @if(session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                        <span class="close-icon"><i class="fa-solid fa-xmark"></i></span>
                                                    </div>
                                            @endif

                                            <div class="de_tab_content">
                                                <div class="tab-1">
                                                    <div class="row">
                                                        <div class="col-lg-6 mb20">
                                                            <h5>First and Last Name
                                                                <span style="color: #ACACAC;font-size:12px">( Enter the same name as on the driver's license )</span></h5>
                                                            <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Enter username" />
                                                        </div>
                                                        <div class="col-md-6 mb20">
                                                            <h5>License Number
                                                                @error('license_number')
                                                                <span class="text-danger">( {{ $message }} )</span>
                                                                @enderror
                                                            </h5>
                                                            <input type="text" name="license_number" class="form-control" placeholder="Enter your driver's license number" value="{{ old('license_number') }}"/>
                                                        </div>
                                                        <div class="col-md-6 mb20">
                                                            <h5>Issue Date
                                                                @error('issue_date')
                                                                <span class="text-danger">( {{ $message }} )</span>
                                                                @enderror
                                                            </h5>
                                                            <input type="date" name="issue_date" class="form-control" value="{{ old('issue_date') }}"/>
                                                        </div>
                                                        <div class="col-md-6 mb20">
                                                            <h5>Expiration Date
                                                                @if ($errors->has('expiration_date'))
                                                                    <span class="text-danger">( {{ $errors->first('expiration_date') }} )</span>
                                                                @endif
                                                            </h5>
                                                            <input type="date" name="expiration_date" class="form-control" value="{{ old('expiration_date') }}"/>
                                                        </div>
                                                        <div class="col-md-6 mb20">
                                                            <h5>License Front
                                                                @error('thumbnail_1')
                                                                <span class="text-danger">( {{ $message }} )</span>
                                                                @enderror
                                                            </h5>
                                                            <label for="input-file-front" class="custom-file-upload">
                                                                <div class="license-image-container">
                                                                    <img id="license-front-image" />
                                                                    <p class="upload-license">Upload license photo</p>
                                                                </div>
                                                            </label>
                                                            <input type="file" name="thumbnail_1" id="input-file-front" class="license-image form-control" onchange="handleFileSelect('input-file-front', 'license-front-image')" value="{{ old('thumbnail_1') }}"/>
                                                        </div>
                                                        <div class="col-md-6 mb20">
                                                            <h5>License Back
                                                                @error('thumbnail_2')
                                                                <span class="text-danger">( {{ $message }} )</span>
                                                                @enderror
                                                            </h5>
                                                            <label for="input-file-back" class="custom-file-upload">
                                                                <div class="license-image-container">
                                                                    <img id="license-back-image" />
                                                                    <p class="upload-license">Upload license photo</p>
                                                                </div>
                                                            </label>
                                                            <input type="file" name="thumbnail_2" id="input-file-back" class="license-image form-control" onchange="handleFileSelect('input-file-back', 'license-back-image')" value="{{ old('thumbnail_2') }}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" id="submit" class="btn-main" onclick="return confirmFormSubmission()">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--End Driving licenses--}}
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
        .menu-content-profile a{
            color: #ACACAC;
        }
        .menu-content-licenses h4{
            padding-left: 30px;
            color: #189E1C;
        }
        .de_tab_content{
            margin-top: -30px;
        }
        .license-image{
            display: none;
        }
        .badge{
            margin-top: 5px;
            margin-left: 10px;
            height: 20px;
            border-radius: 20px;
        }
        .license-image-container {
            position: relative;
            width: 280px;
            height: 170px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid rgb(238,238,238);
            border-radius: 10px;
        }

        .license-image-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }
        .upload-license{
            position: absolute;
            margin: 70px 10px;
        }
        .text-danger{
            font-size: 12px;
        }
        .close-icon{
            cursor: pointer;
            padding-left: 300px;
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
        function handleFileSelect(inputId, imageId) { //bien dang file thanh anh
            const input = document.getElementById(inputId);
            const image = document.getElementById(imageId);
            const imageContainer = image.parentNode;

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    image.src = e.target.result;
                    imageContainer.style.backgroundImage = `url(${e.target.result})`;
                    imageContainer.querySelector('.upload-license').style.display = 'none';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function confirmFormSubmission() {
            var status = parseInt(document.getElementById('status').value);
            if (status === 1 || status === 2) { // Kiểm tra trạng thái rồi hiển thị thông báo
                var confirmSubmission = confirm("Do you want to update the data again?");
                if (!confirmSubmission) {
                    return false;
                }
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
