

@extends("layout.layout")
@section("content")
@section("title","Pustok - Book Store")
    <section class="hero-area hero-slider-1">
        <div class="sb-slick-slider" data-slick-setting='{
                            "autoplay": true,
                            "fade": true,
                            "autoplaySpeed": 3000,
                            "speed": 3000,
                            "slidesToShow": 1,
                            "dots":true
                            }'>
            <div class="single-slide bg-shade-whisper  ">
                <div class="container">
                    <div class="home-content text-center text-sm-left position-relative">
                        <div class="hero-partial-image image-right">
                            <img src="images\banner1.jpg" alt="">
                        </div>
                        <div class="row no-gutters ">
                            <div class="col-xl-6 col-md-6 col-sm-7">
                                <div class="home-content-inner content-left-side">
                                    <h1>H.G. Wells<br>
                                        De Vengeance</h1>
                                    <h2>Cover Up Front Of Books and Leave Summary</h2>
                                    <a href="shop-grid.html" class="btn btn-outlined--primary">
                                        $78.09 - Order Now!
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slide bg-ghost-white">
                <div class="container">
                    <div class="home-content text-center text-sm-left position-relative">
                        <div class="hero-partial-image image-left">
                            <img src="images\banner2.jpg" alt="">
                        </div>
                        <div class="row align-items-center justify-content-start justify-content-md-end">
                            <div class="col-lg-6 col-xl-7 col-md-6 col-sm-7">
                                <div class="home-content-inner content-right-side">
                                    <h1>J.D. Kurtness <br>
                                        De Vengeance</h1>
                                    <h2>Cover Up Front Of Books and Leave Summary</h2>
                                    <a href="shop-grid.html" class="btn btn-outlined--primary">
                                        $78.09 - Learn More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
        Home Features Section
        ===================================== -->
    <section class="mb--30">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="text">
                            <h5>Free Shipping Item</h5>
                            <p> Orders over $500</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-redo-alt"></i>
                        </div>
                        <div class="text">
                            <h5>Money Back Guarantee</h5>
                            <p>100% money back</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <div class="text">
                            <h5>Cash On Delivery</h5>
                            <p>Lorem ipsum dolor amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-life-ring"></i>
                        </div>
                        <div class="text">
                            <h5>Help & Support</h5>
                            <p>Call us : + 0123.4567.89</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
        Promotion Section One
        ===================================== -->
    <section class="section-margin">
        <h2 class="sr-only">Promotion Section</h2>
        <div class="container">
            <div class="row space-db--30">
                <div class="col-lg-6 col-md-6 mb--30">
                    <a href="" class="promo-image promo-overlay">
                        <img src="image\bg-images\promo-banner-with-text.jpg" alt="">
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 mb--30">
                    <a href="" class="promo-image promo-overlay">
                        <img src="image\bg-images\promo-banner-with-text-2.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
        Home Slider Tab
        ===================================== -->
    <section class="section-padding">
        <h2 class="sr-only">Home Tab Slider Section</h2>
        <div class="container">
            <div class="sb-custom-tab">

                <div class="promo-section-heading">
                    <h2>SẢN PHẨM MỚI NHẤT</h2>

                        <p>Tìm thấy {{count($new_product)}} sản phẩm</p>

                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                        <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 5,
                            "rows":2,
                            "dots":true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>



                            @foreach($new_product as $sp)
                                <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <a href="" class="author">

                                            </a>
                                            <h3><a href="{{route('detail_product',$sp->id)}}">{{$sp->name}}</a></h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                @if($sp->promotion_price != 0)
                                                    <div class="ribbon-wrapper">
                                                        <div class="ribbon-sale">Sale</div>
                                                    </div>
                                                @endif
                                                <img src="images\products\{{$sp->image}}" alt="" height="180px" width="122px">
                                                <div class="hover-contents">
                                                    @if($sp->promotion_price != 0)
                                                        <div class="ribbon-wrapper">
                                                            <div class="ribbon-sale">Sale</div>
                                                        </div>
                                                    @endif
                                                    <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                        <img src="images\products\{{$sp->images}}" alt="">
                                                    </a>
                                                    <div class="hover-btns">
                                                        <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                            <i class="fas fa-shopping-basket"></i>
                                                        </a>
                                                        <a href="wishlist.html" class="single-btn">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <a href="compare.html" class="single-btn">
                                                            <i class="fas fa-random"></i>
                                                        </a>
                                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-block">
                                                @if($sp->promotion_price==0)
                                                    <span class="price">{{number_format($sp->unit_price)}}ngàn</span>
                                                @else
                                                    <span class="price-old">{{number_format($sp->unit_price)}}ngàn</span>
                                                    <span class="price">{{number_format($sp->promotion_price)}}ngàn</span>
                                                @endif




                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach




                        </div>
                    </div>
                    <div class="tab-pane" id="men" role="tabpanel" aria-labelledby="men-tab">
                        <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 5,
                                        "rows":2,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            jpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Bpple iPad with Retina Display
                                                MD510LL/A</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-3.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-1.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Bpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Koss KPH7 Lightweight Portable
                                                Headphone</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-2.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-3.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Cpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Beats EP Wired On-Ear
                                                Headphone-Black</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-1.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-2.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Dpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Beats Solo2 Solo 2 Wired On-Ear
                                                Headphone</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-4.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-5.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Lpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Beats Solo3 Wireless On-Ear
                                                Headphones 2</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-7.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-4.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Fpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">3 Ways To Have (A) More Appealing
                                                BOOK</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-6.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-7.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Epple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">In 10 Minutes, I'll Give You The
                                                Truth About</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-5.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-6.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Fpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">5 Ways To Get Through To Your
                                                BOOK</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-8.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-9.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Gpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">What Can You Do To Save Your BOOK</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-3.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-8.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Hpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">From Destruction By Social Media?</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-9.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-11.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Gpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Find Out More About BOOK By Social
                                                Media?</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-10.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-10.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Apple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Read This Controversial BOOK By
                                                Social Media?</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-9.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-11.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="woman" role="tabpanel" aria-labelledby="woman-tab">
                        <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 5,
                                        "rows":2,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            jpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Zpple fPad with Retina Display
                                                MD510LL/A</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-1.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-1.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Bpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Koss KPH7 Lightweight Portable
                                                Headphone</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-4.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-3.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Cpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Beats EP Wired On-Ear
                                                Headphone-Black</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-3.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-2.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Dpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Beats Solo2 Solo 2 Wired On-Ear
                                                Headphone</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-1.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-5.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Lpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Beats Solo3 Wireless On-Ear
                                                Headphones 2</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-11.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-4.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Fpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">3 Ways To Have (A) More Appealing
                                                BOOK</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-10.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-7.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Epple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">In 10 Minutes, I'll Give You The
                                                Truth About</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-9.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-6.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Fpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">5 Ways To Get Through To Your
                                                BOOK</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-8.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-9.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Gpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">What Can You Do To Save Your BOOK</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-5.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-8.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Hpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">From Destruction By Social Media?</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-3.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-11.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Gpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Find Out More About BOOK By Social
                                                Media?</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-11.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-10.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Apple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Read This Controversial BOOK By
                                                Social Media? Out More</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-12.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-11.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="promo-section-heading">
                    <h2>SẢN PHẨM KHUYẾN MÃI</h2>
                    <p>Tìm thấy {{count($pro_product)}} sản phẩm khuyến mãi</p>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                        <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 5,
                            "rows":2,
                            "dots":true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>

                            @foreach($pro_product as $sp)


                                <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <a href="" class="author">
                                                {{$sp->id_type}}
                                            </a>
                                            <h3><a href="{{route('detail_product',$sp->id)}}">{{$sp->name}}</a></h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                @if($sp->promotion_price != 0)
                                                    <div class="ribbon-wrapper">
                                                        <div class="ribbon-sale">Sale</div>
                                                    </div>
                                                @endif
                                                <img src="images\products\{{$sp->image}}" alt="" height="180px" width="122px">
                                                <div class="hover-contents">
                                                    @if($sp->promotion_price != 0)
                                                        <div class="ribbon-wrapper">
                                                            <div class="ribbon-sale">Sale</div>
                                                        </div>
                                                    @endif
                                                    <a href="{{route('detail_product',$sp->id)}}" class="hover-image">

                                                        <img src="images\products\{{$sp->images}}" alt="">
                                                    </a>
                                                    <div class="hover-btns">
                                                        <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                            <i class="fas fa-shopping-basket"></i>
                                                        </a>
                                                        <a href="wishlist.html" class="single-btn">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <a href="compare.html" class="single-btn">
                                                            <i class="fas fa-random"></i>
                                                        </a>
                                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-block">
                                                @if($sp->promotion_price==0)
                                                    <span class="price">{{number_format($sp->unit_price)}}ngàn</span>
                                                @else
                                                    <span class="price-old">{{number_format($sp->unit_price)}}ngàn</span>
                                                    <span class="price">{{number_format($sp->promotion_price)}}ngàn</span>
                                                @endif




                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach



                        </div>

                    </div>
                    <div class="tab-pane" id="men" role="tabpanel" aria-labelledby="men-tab">
                        <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 5,
                                        "rows":2,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            jpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Bpple iPad with Retina Display
                                                MD510LL/A</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-3.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-1.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Bpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Koss KPH7 Lightweight Portable
                                                Headphone</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-2.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-3.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Cpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Beats EP Wired On-Ear
                                                Headphone-Black</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-1.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-2.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Dpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Beats Solo2 Solo 2 Wired On-Ear
                                                Headphone</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-4.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-5.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Lpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Beats Solo3 Wireless On-Ear
                                                Headphones 2</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-7.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-4.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Fpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">3 Ways To Have (A) More Appealing
                                                BOOK</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-6.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-7.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Epple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">In 10 Minutes, I'll Give You The
                                                Truth About</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-5.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-6.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Fpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">5 Ways To Get Through To Your
                                                BOOK</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-8.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-9.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Gpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">What Can You Do To Save Your BOOK</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-3.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-8.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Hpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">From Destruction By Social Media?</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-9.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-11.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Gpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Find Out More About BOOK By Social
                                                Media?</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-10.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-10.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Apple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Read This Controversial BOOK By
                                                Social Media?</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-9.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-11.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="woman" role="tabpanel" aria-labelledby="woman-tab">
                        <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 5,
                                        "rows":2,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            jpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Zpple fPad with Retina Display
                                                MD510LL/A</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-1.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-1.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Bpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Koss KPH7 Lightweight Portable
                                                Headphone</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-4.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-3.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Cpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Beats EP Wired On-Ear
                                                Headphone-Black</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-3.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-2.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Dpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Beats Solo2 Solo 2 Wired On-Ear
                                                Headphone</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-1.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-5.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Lpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Beats Solo3 Wireless On-Ear
                                                Headphones 2</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-11.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-4.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Fpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">3 Ways To Have (A) More Appealing
                                                BOOK</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-10.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-7.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Epple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">In 10 Minutes, I'll Give You The
                                                Truth About</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-9.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-6.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Fpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">5 Ways To Get Through To Your
                                                BOOK</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-8.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-9.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Gpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">What Can You Do To Save Your BOOK</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-5.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-8.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Hpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">From Destruction By Social Media?</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-3.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-11.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Gpple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Find Out More About BOOK By Social
                                                Media?</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-11.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-10.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Apple
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Read This Controversial BOOK By
                                                Social Media? Out More</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image\products\product-12.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="image\products\product-11.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
    <!--=================================
        Deal of the day
        ===================================== -->
    <section class="section-margin">
        <div class="container-fluid">
            <div class="promo-section-heading">
                <h2>ƯU ĐÃI SẢN PHẨM THỨC ĂN GIA CẦM</h2>
                <p>Tìm thấy {{count($sale_product)}} sản phẩm</p>
            </div>
            <div class="product-slider with-countdown  slider-border-single-row sb-slick-slider" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 6,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1400, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":575, "settings": {"slidesToShow": 2} },
                {"breakpoint":490, "settings": {"slidesToShow": 1} }
            ]'>
                @foreach($sale_product as $sp)

                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="" class="author">
                                {{$sp->name}}
                            </a>
                            <h3><a href="{{route('detail_product',$sp->id)}}">{{$sp->description}}
                                </a>
                            </h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="images\products\{{$sp->image}}" alt="">
                                <div class="hover-contents">
                                    <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                        <img src="images\products\{{$sp->images}}" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            x
                            <div class="count-down-block">
                                <div class="product-countdown" data-countdown="01/05/2020"></div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </section>
    <!--=================================
        Best Seller Product
        ===================================== -->
    <section class="section-margin bg-image section-padding-top section-padding" data-bg="image/bg-images/best-seller-bg.jpg">
        <div class="container">
            <div class="section-title section-title--bordered mb-0">
                <h2>SẢN PHẨM HOT</h2>
            </div>
            <div class="best-seller-block">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6">
                        <div class="author-image">
                            <img src="image\others\best-seller-author.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="sb-slick-slider product-slider product-list-slider multiple-row slider-border-multiple-row" data-slick-setting='{
                                    "autoplay": false,
                                    "autoplaySpeed": 8000,
                                    "slidesToShow":2,
                                    "rows":2,
                                    "dots":true
                                }' data-slick-responsive='[
                                    {"breakpoint":1200, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":992, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":768, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                ]'>

                            @foreach($new_product as $sp)
                            <div class="single-slide">
                                <div class="product-card card-style-list">
                                    <div class="card-image">
                                        <img src="images\products\{{$sp->image}}" alt="">
                                    </div>
                                    <div class="product-card--body">
                                        <div class="product-header">
                                            <a href="#" class="author">
                                                {{$sp->name}}
                                            </a>
                                            <h3><a href="{{route('detail_product',$sp->id)}}">{{$sp->description}}
                                                </a></h3>
                                        </div>
                                        <div class="price-block">
                                            @if($sp->promotion_price == 0)
                                                <span class="price">{{number_format($sp->unit_price)}} ngàn</span>
                                            @else
                                                <span class="price-old">{{number_format($sp->unit_price)}} ngàn</span>
                                                <span class="price-discount">{{number_format($sp->promotion_price)}} ngàn</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
        CHILDREN’S BOOKS
        ===================================== -->
    <section class="section-margin">
        <div class="container">
            <div class="section-title section-title--bordered">
                <h2>SẢN PHẨM DÀNH CHO CÁ</h2>
            </div>
            <div class="product-list-slider slider-two-column product-slider multiple-row sb-slick-slider slider-border-multiple-row" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow":3,
                                            "rows":2,
                                            "dots":true
                                        }' data-slick-responsive='[
                                            {"breakpoint":1200, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":768, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                        ]'>
                @foreach($new_product as $sp)

                <div class="single-slide">
                    <div class="product-card card-style-list">
                        <div class="card-image">
                            <img src="images\products\{{$sp->image}}" alt="">
                        </div>
                        <div class="product-card--body">
                            <div class="product-header">
                                <a href="#" class="author">
                                    {{$sp->name}}
                                </a>
                                <h3><a href="{{route('detail_product',$sp->id)}}">Revolutionize Your BOOK With</a></h3>
                            </div>
                            <div class="price-block">
                                @if($sp->promotion_price == 0)
                                    <span class="price">{{number_format($sp->unit_price)}} ngàn</span>
                                @else
                                    <span class="price-old">{{number_format($sp->unit_price)}} ngàn</span>
                                    <span class="price-discount">{{number_format($sp->promotion_price)}} ngàn</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--=================================
        Promotion Section Two
        ===================================== -->

    <!--=================================
        ARTS & PHOTOGRAPHY BOOKS
        ===================================== -->
    <section class="section-margin">
        <div class="container">
            <div class="section-title section-title--bordered">
                <h2>THỨC ĂN DÀNH CHO CÁ</h2>
                <p>Tìm thấy {{count($botca_product)}} sản phẩm</p>
            </div>
            <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 5,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1500, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
                @foreach($botca_product as $sp)
                    <div class="single-slide">
                        <div class="product-card">
                            <div class="product-header">
                                <a href="{{route('detail_product',$sp->id)}}" class="author">
                                <a href="{{route('detail_product',$sp->id)}}" class="author">
                                   {{$sp->name}}
                                </a>
                                <h3><a href="{{route('detail_product',$sp->id)}}">{{$sp->description}}
                                    </a></h3>
                            </div>
                            <div class="product-card--body">
                                <div class="card-image">
                                    <img src="images\products\{{$sp->image}}"  height="330px" alt="">
                                    <div class="hover-contents">
                                        <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                            <img src="images\products\{{$sp->images}}" height="330px" alt="">
                                        </a>
                                        <div class="hover-btns">
                                            <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                <i class="fas fa-shopping-basket"></i>
                                            </a>
                                            <a href="wishlist.html" class="single-btn">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                            <a href="compare.html" class="single-btn">
                                                <i class="fas fa-random"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="price-block">
                                    <div class="price-block">
                                        @if($sp->promotion_price == 0)
                                            <span class="price">{{number_format($sp->unit_price)}}</span>
                                        @else
                                            <span class="price-old">{{number_format($sp->unit_price)}}</span>
                                            <span class="price-discount">{{number_format($sp->promotion_price)}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--=================================
            Promotion Section Three
        ===================================== -->

    <!--=================================
        Home Blog Slider
        ===================================== -->
    <!--=================================
        Home Blog
        ===================================== -->
    <section class="section-margin">
        <div class="container">
            <div class="section-title">
                <h2>LATEST BLOGS</h2>
            </div>
            <div class="blog-slider sb-slick-slider" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 2,
                "dots": true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 1} }
            ]'>
                <div class="single-slide">
                    <div class="blog-card">
                        <div class="image">
                            <img src="image\others\blog-grid-1.jpg" alt="">
                        </div>
                        <div class="content">
                            <div class="content-header">
                                <div class="date-badge">
                                        <span class="date">
                                            13
                                        </span>
                                    <span class="month">
                                            Aug
                                        </span>
                                </div>
                                <h3 class="title"><a href="blog-details.html">How to Water and Care for Mounted</a>
                                </h3>
                            </div>
                            <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="#">Hastech</a></p>
                            <article class="blog-paragraph">
                                <h2 class="sr-only">blog-paragraph</h2>
                                <p>Virtual reality and 3-D technology are already well-established in the
                                    entertainment...</p>
                            </article>
                            <a href="blog-details.html" class="card-link">Read More <i class="fas fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="blog-card">
                        <div class="image">
                            <img src="image\others\blog-grid-2.jpg" alt="">
                        </div>
                        <div class="content">
                            <div class="content-header">
                                <div class="date-badge">
                                        <span class="date">
                                            19
                                        </span>
                                    <span class="month">
                                            Jan
                                        </span>
                                </div>
                                <h3 class="title"><a href="blog-details.html">Why You Never See BLOG TITLE That </a>
                                </h3>
                            </div>
                            <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="#">Hastech</a></p>
                            <article class="blog-paragraph">
                                <h2 class="sr-only">blog-paragraph</h2>
                                <p>Virtual reality and 3-D technology are already well-established in the
                                    entertainment...</p>
                            </article>
                            <a href="blog-details.html" class="card-link">Read More <i class="fas fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="blog-card">
                        <div class="image">
                            <img src="image\others\blog-grid-3.jpg" alt="">
                        </div>
                        <div class="content">
                            <div class="content-header">
                                <div class="date-badge">
                                        <span class="date">
                                            31
                                        </span>
                                    <span class="month">
                                            Aug
                                        </span>
                                </div>
                                <h3 class="title"><a href="blog-details.html">What Everyone Must Know About </a>
                                </h3>
                            </div>
                            <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="#">Hastech</a></p>
                            <article class="blog-paragraph">
                                <h2 class="sr-only">blog-paragraph</h2>
                                <p>Virtual reality and 3-D technology are already well-established in the
                                    entertainment...</p>
                            </article>
                            <a href="blog-details.html" class="card-link">Read More <i class="fas fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
        Footer
        ===================================== -->
    <!-- Modal -->
    <div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog" aria-labelledby="quickModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="product-details-modal">
                    <div class="row">
                        <div class="col-lg-5">
                            <!-- Product Details Slider Big Image-->
                            <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'>
                                <div class="single-slide">
                                    <img src="image\products\product-details-1.jpg" alt="">
                                </div>
                                <div class="single-slide">
                                    <img src="image\products\product-details-2.jpg" alt="">
                                </div>
                                <div class="single-slide">
                                    <img src="image\products\product-details-3.jpg" alt="">
                                </div>
                                <div class="single-slide">
                                    <img src="image\products\product-details-4.jpg" alt="">
                                </div>
                                <div class="single-slide">
                                    <img src="image\products\product-details-5.jpg" alt="">
                                </div>
                            </div>
                            <!-- Product Details Slider Nav -->
                            <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two" data-slick-setting='{
            "infinite":true,
              "autoplay": true,
              "autoplaySpeed": 8000,
              "slidesToShow": 4,
              "arrows": true,
              "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
              "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
              "asNavFor": ".product-details-slider",
              "focusOnSelect": true
              }'>
                                <div class="single-slide">
                                    <img src="image\products\product-details-1.jpg" alt="">
                                </div>
                                <div class="single-slide">
                                    <img src="image\products\product-details-2.jpg" alt="">
                                </div>
                                <div class="single-slide">
                                    <img src="image\products\product-details-3.jpg" alt="">
                                </div>
                                <div class="single-slide">
                                    <img src="image\products\product-details-4.jpg" alt="">
                                </div>
                                <div class="single-slide">
                                    <img src="image\products\product-details-5.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 mt--30 mt-lg--30">
                            <div class="product-details-info pl-lg--30 ">
                                <p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p>
                                <h3 class="product-title">Beats EP Wired On-Ear Headphone-Black</h3>
                                <ul class="list-unstyled">
                                    <li>Ex Tax: <span class="list-value"> £60.24</span></li>
                                    <li>Brands: <a href="#" class="list-value font-weight-bold"> Canon</a></li>
                                    <li>Product Code: <span class="list-value"> model1</span></li>
                                    <li>Reward Points: <span class="list-value"> 200</span></li>
                                    <li>Availability: <span class="list-value"> In Stock</span></li>
                                </ul>
                                <div class="price-block">
                                    <span class="price-new">£73.79</span>
                                    <del class="price-old">£91.86</del>
                                </div>
                                <div class="rating-widget">
                                    <div class="rating-block">
                                        <span class="fas fa-star star_on"></span>
                                        <span class="fas fa-star star_on"></span>
                                        <span class="fas fa-star star_on"></span>
                                        <span class="fas fa-star star_on"></span>
                                        <span class="fas fa-star "></span>
                                    </div>
                                    <div class="review-widget">
                                        <a href="">(1 Reviews)</a> <span>|</span>
                                        <a href="">Write a review</a>
                                    </div>
                                </div>
                                <article class="product-details-article">
                                    <h4 class="sr-only">Product Summery</h4>
                                    <p>Long printed dress with thin adjustable straps. V-neckline and wiring under
                                        the Dust with ruffles
                                        at the bottom
                                        of the
                                        dress.</p>
                                </article>
                                <div class="add-to-cart-row">
                                    <div class="count-input-block">
                                        <span class="widget-label">Qty</span>
                                        <input type="number" class="form-control text-center" value="1">
                                    </div>
                                    <div class="add-cart-btn">
                                        <a href="" class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add to Cart</a>
                                    </div>
                                </div>
                                <div class="compare-wishlist-row">
                                    <a href="" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
                                    <a href="" class="add-link"><i class="fas fa-random"></i>Add to Compare</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="widget-social-share">
                        <span class="widget-label">Share:</span>
                        <div class="modal-social-share">
                            <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=================================
        Brands Slider
        ===================================== -->


@endsection

