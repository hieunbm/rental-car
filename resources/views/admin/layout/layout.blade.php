<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    @include("admin.html.head")

</head>

<body>

<!-- Start Switcher -->
@include("admin.html.switch")
<!-- End Switcher -->


<div class="page">

    <!-- app-header -->
    @include("admin.html.header")
    <!-- /app-header -->

    <!-- Start::app-sidebar -->
    @include("admin.html.sidebar")
    <!-- End::app-sidebar -->

    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            @yield("main")
        </div>
    </div>
    <!-- End::app-content -->

    <!-- Search Start -->
    @include("admin.html.search")
{{-- chú thích: ở phần header sẽ có đường dẫn đến phần search này (trang web này nó làm hơi oái ăm lại làm riêng cái search ở dưới này chứ không phải trong cùng header =)))   --}}
    <!-- Search Start -->

    <!-- Footer Start -->
    @include("admin.html.footer")
    <!-- Footer End -->
</div>

<!-- ScrollTop Start -->
<div class="scrollToTop">
    <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
</div>
<div id="responsive-overlay"></div>
<!-- ScrollTop End -->

<!-- Js Start -->
@include("admin.html.scripts")
<!-- Js End -->

</body>
</html>
