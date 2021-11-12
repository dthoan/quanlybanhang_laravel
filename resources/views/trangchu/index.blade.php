@extends("layout.layout")
@section("content")
@section("title","Shop Beauty")

<!--=================================
        Home Features Section
        ===================================== -->
<section class="mb--5">
    <div class="container">
        <div class="row">
            @foreach($type_pro as $type)
            @if($type->id != 2)
            <div style="margin: 5px;">
                <a href="{{route('typecatelory',$type->id)}}" style="padding: 10px;border-radius: 5px;color: yellowgreen;">
                    <h6>{{$type->name}}</h5>
                </a>
            </div>

            @endif
            @endforeach



        </div>
    </div>
</section>

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
                                    <h3><a href="{{route('detail_product',$sp->id)}}" style="  width: 200px;
                                                        overflow: hidden;
                                                        white-space: nowrap;
                                                        text-overflow: ellipsis;">{{$sp->name}}</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        {{-- @if($sp->promotion_price != 0)--}}
                                        {{-- <div class="ribbon-wrapper">--}}
                                        {{-- <div class="ribbon-sale">Sale</div>--}}
                                        {{-- </div>--}}
                                        {{-- @endif--}}
                                        <img src="..\storage\app\public\{{(isset($sp->images[0])?$sp->images[0]:"banner1.jpg")}}" alt="" height="180px" width="122px">
                                        <div class="hover-contents">
                                            @if($sp->promotion_price != 0)
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon-sale">Sale</div>
                                            </div>
                                            @endif
                                            <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                <img src="..\storage\app\public\{{(isset($sp->images[0])?$sp->images[0]:"banner1.jpg")}}" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
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
                <h2>SẢN PHẨM BÁN CHẠY</h2>

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

                        @foreach($botca_product as $sp)


                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" {{$sp->typeName}} </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}" style="  width: 200px;
                                                        overflow: hidden;
                                                        white-space: nowrap;
                                                        text-overflow: ellipsis;">{{$sp->name}}</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">

                                        <img src="..\storage\app\public\{{(isset($sp->images[0])?$sp->images[0]:"banner1.jpg")}}" alt="" height="180px" width="122px">
                                        <div class="hover-contents">
                                            <!-- @if($sp->promotion_price != 0)
                                                        <div class="ribbon-wrapper">
                                                            <div class="ribbon-sale">Sale</div>
                                                        </div>
                                                    @endif -->
                                            <a href="{{route('detail_product',$sp->id)}}" class="hover-image">

                                                <img src="..\storage\app\public\{{(isset($sp->images[0])?$sp->images[0]:"banner1.jpg")}}" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        @if($sp->promotion_price==0)
                                        <span class="price">{{number_format($sp->unit_price)}}ngàn</span>
                                        @else
                                        <span class="price">{{number_format($sp->unit_price)}}ngàn</span>
                                        <span class="price-old">{{number_format($sp->promotion_price)}}ngàn</span>
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
                                                <!-- <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a> -->
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
                                                <!-- <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a> -->
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
                                                <!-- <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a> -->
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
                                                <!-- <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a> -->
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
                                                <!-- <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a> -->
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
                                                <!-- <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a> -->
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
                                                <!-- <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a> -->
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
                                                <!-- <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a> -->
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
                                                <!-- <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a> -->
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
                                                <!-- <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a> -->
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
                                                <!-- <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a> -->
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
                                                <!-- <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a> -->
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
                                                <!-- <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a> -->
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
                                                <!-- <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a> -->
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
                                                <!-- <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a> -->
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

<section class="section-margin bg-image section-padding-top section-padding" data-bg="image/bg-images/best-seller-bg.jpg">
    <div class="container">
        <div class="section-title section-title--bordered mb-0">
            <h2>SẢN PHẨM HOT</h2>
        </div>
        <div class="best-seller-block">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="author-image">
                        <img src="image\aa.png" alt="">
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

                        @foreach($new_product1 as $sp)
                        <div class="single-slide">
                            <div class="product-card card-style-list">
                                <div class="card-image">
                                    <img src="..\storage\app\public\{{(isset($sp->images[0])?$sp->images[0]:"banner1.jpg")}}" alt="">
                                </div>
                                <div class="product-card--body">
                                    <div class="product-header">
                                        <a href="#" class="author" style="  width: 200px;
                                                        overflow: hidden;
                                                        white-space: nowrap;
                                                        text-overflow: ellipsis;">
                                            {{$sp->name}}
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">{{$sp->typeName}}
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

     

<section class="section-margin">
    <div class="container">
        <div class="section-title section-title--bordered">
            <h2>SẢN PHẨM CHĂM SÓC DA</h2>
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
            @foreach($new_product4 as $sp)

            <div class="single-slide">
                <div class="product-card card-style-list">
                    <div class="card-image">
                        <img src="..\storage\app\public\{{(isset($sp->images[0])?$sp->images[0]:"banner1.jpg")}}" alt="">
                    </div>
                    <div class="product-card--body">
                        <div class="product-header">
                            <a href="#" class="author" style="  width: 200px;
                                                        overflow: hidden;
                                                        white-space: nowrap;
                                                        text-overflow: ellipsis;">
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




@endsection