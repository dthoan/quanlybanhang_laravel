@extends('layouts.layoutMaster')
@section('content')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mb--40 mb-lg--0">
                    <div class="blog-list-cards">
                        <div class="blog-card card-style-list">
                            <div class="row">
                                <div class="col-md-5">
                                    <a href="blog-details.html" class="image d-block">
                                        <img src="image\others\blog-grid-3.jpg" alt="">
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-content">
                                        <h3 class="title"><a href="blog-details.html">Use BLOG TITLE To Make Someone
                                                Fall In Love</a></h3>
                                        <p class="post-meta"><span>13/08/2017 </span> | <a href="#">Hastech</a></p>
                                        <article>
                                            <h2 class="sr-only">
                                                Blog Article
                                            </h2>
                                            <p>Maria Denardo is the Fashion Director at theFashionSpot. Prior to
                                                joining tFS, she worked as...</p>
                                            <a href="blog-details.html" class="blog-link">Read More</a>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-card card-style-list">
                            <div class="row">
                                <div class="col-md-5">
                                    <a href="blog-details.html" class="image d-block">
                                        <img src="image\others\blog-grid-4.jpg" alt="">
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <div class="card-content">
                                        <h3 class="title"><a href="blog-details.html">Ho To (Do) BLOG TITLE Without
                                                Your Office(House).</a></h3>
                                        <p class="post-meta"><span>28/10/2017 </span> | <a href="#">Hastech</a></p>
                                        <article>
                                            <h2 class="sr-only">
                                                Blog Article
                                            </h2>
                                            <p>Maria Denardo is the Fashion Director at theFashionSpot. Prior to
                                                joining tFS, she worked as...</p>
                                            <a href="blog-details.html" class="blog-link">Read More</a>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-card card-style-list">
                            <div class="row">
                                <div class="col-md-5">
                                    <a href="blog-details.html" class="image d-block">
                                        <img src="image\others\blog-grid-1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <div class="card-content">
                                        <h3 class="title"><a href="blog-details.html">How to Grow Epiphytic Tropical
                                                Plants</a></h3>
                                        <p class="post-meta"><span>30/10/2017 </span> | <a href="#">Hastech</a></p>
                                        <article>
                                            <h2 class="sr-only">
                                                Blog Article
                                            </h2>
                                            <p>Maria Denardo is the Fashion Director at theFashionSpot. Prior to
                                                joining tFS, she worked as...</p>
                                            <a href="blog-details.html" class="blog-link">Read More</a>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-card card-style-list">
                            <div class="row">
                                <div class="col-md-5">
                                    <a href="blog-details.html" class="image d-block">
                                        <img src="image\others\blog-grid-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <div class="card-content">
                                        <h3 class="title"><a href="blog-details.html">Want A Thriving Business?
                                                Focus On BLOG TITLE!</a></h3>
                                        <p class="post-meta"><span>22/01/2017 </span> | <a href="#">Hastech</a></p>
                                        <article>
                                            <h2 class="sr-only">
                                                Blog Article
                                            </h2>
                                            <p>Maria Denardo is the Fashion Director at theFashionSpot. Prior to
                                                joining tFS, she worked as...</p>
                                            <a href="blog-details.html" class="blog-link">Read More</a>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-page-sidebar">
                        <div class="single-block">
                            <h2 class="sidebar-title mb--30">Search</h2>
                            <div class="site-mini-search">
                                <input type="text" placeholder="Search">
                                <button><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <div class="single-block">
                            <h2 class="sidebar-title mb--30">BLOG ARCHIVES</h2>
                            <ul class="sidebar-list mb--30">
                                <li><a href="#"> March 2015 (1)</a></li>
                                <li><a href="#">December 2014 (3)</a></li>
                                <li> <a href="#">November 2014 (4)</a></li>
                                <li><a href="#">September 2014 (1)</a></li>
                                <li><a href="#">August 2014 (1)</a></li>
                            </ul>
                        </div>
                        <div class="single-block ">
                            <h2 class="sidebar-title mb--30">RECENT POSTS</h2>
                            <ul class="sidebar-list">
                                <li><a href="#"> Blog image post</a></li>
                                <li><a href="#">Post with Gallery</a></li>
                                <li> <a href="#">Post with Audio</a></li>
                                <li><a href="#">Post with Video</a></li>
                                <li><a href="#">Maecenas ultricies</a></li>
                            </ul>
                        </div>
                        <div class="single-block ">
                            <h2 class="sidebar-title mb--30">Tags</h2>
                            <ul class="sidebar-tag-list">
                                <li><a href="#"> Chilled</a></li>
                                <li><a href="#">Dark</a></li>
                                <li> <a href="#">Euro</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Hardware</a></li>
                                <li><a href="#">Hat</a></li>
                                <li><a href="#">Hipster</a></li>
                                <li><a href="#">Holidays</a></li>
                                <li><a href="#">Light</a></li>
                                <li><a href="#">Mac</a></li>
                                <li><a href="#">Place</a></li>
                                <li><a href="#">T-Shirt</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Video-2</a></li>
                                <li><a href="#">White</a></li>
                            </ul>
                        </div>
                        <!-- Promo Block -->
                        <div class="single-block">
                            <a href="" class="promo-image sidebar">
                                <img src="image\others\home-side-promo.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

@endsection
