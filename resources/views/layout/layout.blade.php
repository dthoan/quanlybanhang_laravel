
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <base href="{{asset('')}}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="css\plugins.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css\main.css">
    <link rel="shortcut icon" type="image/x-icon" href="image\favicon.bin">
</head>

<body>
<div class="site-wrapper" id="top">

        @include("layout.header")

    <!--=================================
        Deal of the day
        ===================================== -->
            @yield("content")
</div>
<!--=================================
    Brands Slider
    ===================================== -->
<section class="section-margin">
    <h2 class="sr-only">Brand Slider</h2>
    <div class="container">
        <div class="brand-slider sb-slick-slider border-top border-bottom" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 6
                                            }' data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 4} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 3} },
                {"breakpoint":480, "settings": {"slidesToShow": 2} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
            <div class="single-slide">
                <img src="image\others\brand-1.jpg" alt="">
            </div>
            <div class="single-slide">
                <img src="image\others\brand-2.jpg" alt="">
            </div>
            <div class="single-slide">
                <img src="image\others\brand-3.jpg" alt="">
            </div>
            <div class="single-slide">
                <img src="image\others\brand-4.jpg" alt="">
            </div>
            <div class="single-slide">
                <img src="image\others\brand-5.jpg" alt="">
            </div>
            <div class="single-slide">
                <img src="image\others\brand-6.jpg" alt="">
            </div>
            <div class="single-slide">
                <img src="image\others\brand-1.jpg" alt="">
            </div>
            <div class="single-slide">
                <img src="image\others\brand-2.jpg" alt="">
            </div>
        </div>
    </div>
</section>
<!--=================================
    Footer Area
    ===================================== -->


@include("layout.footer")

<!-- Use Minified Plugins Version For Fast Page Load -->
<script src="js\plugins.js"></script>
<script src="js\ajax-mail.js"></script>
<script src="js\custom.js"></script>
</body>

</html>
