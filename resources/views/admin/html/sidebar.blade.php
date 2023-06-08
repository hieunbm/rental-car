<aside class="app-sidebar sticky" id="sidebar">
    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="{{url("/admin")}}" class="header-logo">
            <img src="images/logo.png" alt="logo" class="desktop-dark" />
        </a>
    </div>
    <!-- End::main-sidebar-header -->
    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">
        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path></svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Main</span></li>
                <!-- End::slide__category -->
                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="fa-solid fa-house side-menu__icon"></i> <span class="side-menu__label">Dashboards<span class="badge bg-warning-transparent ms-2">2</span></span> <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1"><a href="javascript:void(0)">Dashboards</a></li>
                        <li class="slide"><a href="{{url("/admin")}}" class="side-menu__item">Overview</a></li>
                        <li class="slide"><a href="#" class="side-menu__item">Action for overview</a></li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Booking</span></li>
                <!-- End::slide__category -->
                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item"> <i class="fa-solid fa-car-on side-menu__icon"></i> <span class="side-menu__label">Booking</span> <i class="fe fe-chevron-right side-menu__angle"></i> </a>
                    <ul class="slide-menu child1">
                        <li class="slide"><a href="{{url("/admin/booking")}}" class="side-menu__item">Booking</a></li>
                        <li class="slide"><a href="#" class="side-menu__item">Booking Details</a></li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Cars</span></li>
                <!-- End::slide__category -->
                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item"> <i class="fa-solid fa-car side-menu__icon"></i> <span class="side-menu__label">Cars</span> <i class="fe fe-chevron-right side-menu__angle"></i> </a>
                    <ul class="slide-menu child1 mega-menu">
                        <li class="slide"><a href="{{url("/admin/cars")}}" class="side-menu__item">Cars</a></li>
                        <li class="slide"><a href="{{url("/admin/car-type")}}" class="side-menu__item">Car Type</a></li>
                        <li class="slide"><a href="{{url("/admin/add-car")}}" class="side-menu__item">Add Cars</a></li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Brands</span></li>
                <!-- End::slide__category -->
                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item"> <i class="fa-solid fa-building side-menu__icon"></i> <span class="side-menu__label">Brands</span> <i class="fe fe-chevron-right side-menu__angle"></i> </a>
                    <ul class="slide-menu child1 mega-menu">
                        <li class="slide"><a href="{{url("/admin/brands")}}" class="side-menu__item">Brands</a></li>
                        <li class="slide"><a href="{{url("/admin/add-brand")}}" class="side-menu__item">Add Brands</a></li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Contact Query</span></li>
                <!-- End::slide__category -->
                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item"> <i class="fa-solid fa-users side-menu__icon"></i> <span class="side-menu__label">Contact Query</span> <i class="fe fe-chevron-right side-menu__angle"></i> </a>
                    <ul class="slide-menu child1 mega-menu">
                        <li class="slide"><a href="{{url("/admin/contact-query")}}" class="side-menu__item">Contact Query</a></li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Customers</span></li>
                <!-- End::slide__category -->
                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item"> <i class="fa-solid fa-user side-menu__icon"></i> <span class="side-menu__label">Customers</span> <i class="fe fe-chevron-right side-menu__angle"></i> </a>
                    <ul class="slide-menu child1 mega-menu">
                        <li class="slide"><a href="{{url("/admin/customers")}}" class="side-menu__item">Customers</a></li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Services</span></li>
                <!-- End::slide__category -->
                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item"> <i class="fa-solid fa-truck-fast side-menu__icon"></i> <span class="side-menu__label">Services</span> <i class="fe fe-chevron-right side-menu__angle"></i> </a>
                    <ul class="slide-menu child1 mega-menu">
                        <li class="slide"><a href="{{url("/admin/services")}}" class="side-menu__item">Services</a></li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Incidents</span></li>
                <!-- End::slide__category -->
                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item"> <i class="fa-solid fa-indent side-menu__icon"></i> <span class="side-menu__label">Incidents</span> <i class="fe fe-chevron-right side-menu__angle"></i> </a>
                    <ul class="slide-menu child1 mega-menu">
                        <li class="slide"><a href="{{url("/admin/incidents")}}" class="side-menu__item">Incidents</a></li>
                    </ul>
                </li>
                <!-- End::slide -->

            </ul>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg>
            </div>
        </nav>
        <!-- End::nav -->
    </div>
    <!-- End::main-sidebar -->
</aside>
