
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <base href="{{asset('')}}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <script src="admin/js/ckeditor.js"></script>
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="css\plugins.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css\main.css">
    <link rel="shortcut icon" type="image/x-icon" href="image\favicon.bin">
</head>

<body>
<div class="site-wrapper" id="top">

@include("layout.header_blog")

<!--=================================
        Deal of the day
        ===================================== -->
    @yield("content")
</div>
<!--=================================
    Brands Slider
    ===================================== -->

<!--=================================
    Footer Area
    ===================================== -->


@include("layout.footer")

<!-- Use Minified Plugins Version For Fast Page Load -->

<script src="admin/js/main.js"></script>
<script src="js\custom.js"></script>
<script src="js\ajax-mail.js"></script>
<script src="js\plugins.js"></script>

</body>

</html>

