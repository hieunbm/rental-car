<!doctype html>
<html lang="en">
<head>
    @include('web.html.head')
</head>
<body>
<body>
<div id="wrapper">

    <!-- page preloader begin -->
    <div id="de-preloader"></div>
    <!-- page preloader close -->

    <!-- header begin -->
    @include('web.html.header')
    <!-- header close -->
    <!-- content begin -->
    @yield("main")
    <!-- content close -->
    <a href="#" id="back-to-top"></a>
    <!-- footer begin -->
    @include('web.html.footer')
    <!-- footer close -->
</div>

<!-- Javascript Files
================================================== -->
@include('web.html.scripts')
</body>
</body>
</html>
