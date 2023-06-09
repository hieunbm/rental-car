<header class="transparent scroll-light has-topbar">
    <div id="topbar" class="topbar-dark text-light">
        <div class="container">
            <div class="topbar-left xs-hide">
                <div class="topbar-widget">
                    <div class="topbar-widget"><a href="#"><i class="fa fa-phone"></i>+208 333 9296</a></div>
                    <div class="topbar-widget"><a href="#"><i class="fa fa-envelope"></i>contact@rentaly.com</a></div>
                    <div class="topbar-widget"><a href="#"><i class="fa fa-clock-o"></i>Mon - Fri 08.00 - 18.00</a></div>
                </div>
            </div>

            <div class="topbar-right">
                <div class="social-icons">
                    <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                    <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                    <a href="#"><i class="fa fa-youtube fa-lg"></i></a>
                    <a href="#"><i class="fa fa-pinterest fa-lg"></i></a>
                    <a href="#"><i class="fa fa-instagram fa-lg"></i></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <div class="de-flex-col">
                            <!-- logo begin -->
                            <div id="logo">
                                <a href="index.html">
                                    <img class="logo-1" src="images/logo-light.png" alt="">
                                    <img class="logo-2" src="images/logo.png" alt="">
                                </a>
                            </div>
                            <!-- logo close -->
                        </div>
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            <li><a class="menu-item" href="{{url("/")}}">Home</a></li>
                            <li><a class="menu-item" href="{{url("/car-list")}}">Cars</a></li>
                            <li><a class="menu-item" href="{{url("/booking")}}">Booking</a></li>
                            <li><a class="menu-item" href="{{url("/about")}}">About Us</a></li>
                            <li><a class="menu-item" href="{{url("/contact")}}">Contact</a></li>
                        </ul>
                    </div>
                    <div class="de-flex-col">
                        <div class="menu_side_area">
                            @guest()
                                <a href="{{url("/login")}}"><i class="fa fa-user"></i> Login</a>
                            @endguest
                            @auth()
                                <a href="#"><i class="fa fa-user"></i> {{auth()->user()->name}}</a>
                                <form action="{{route("logout")}}" method="post">
                                    @csrf
                                    <button type="submit"><i class="fa fa-arrow-right"></i></button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>