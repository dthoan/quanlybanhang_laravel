@extends("layout.layout")
@section("title","Pustok - Product Details")
@section("content")


<main class="inner-page-sec-padding-bottom">
    <div class="container">

        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active"><a href="">Loại Sản Phẩm: {{$ten_chude->name}}  </a></li>

                </ol>
            </nav>
        </div>

        <div class="row  mb--60">
            <div class="col-lg-5 mb--30">
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
                        <img src="..\storage\app\public\{{$detail_product->image}}" alt="">
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
                        <img src="..\storage\app\public\{{$detail_product->images}}" alt="">
                    </div>

                </div>
            </div>
            <div class="col-lg-7">
                <div class="product-details-info pl-lg--30 ">
                    <p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p>
                    <h3 class="product-title">{{$detail_product->name}}</h3>
                    <ul class="list-unstyled">
                        @if($detail_product->promotion_price == 0)
                            <span class="list-value text-danger"><b>Giá Bán:  {{number_format($detail_product->unit_price)}}</b></span>
                        @else

                            <span class="list-value text-danger"><b>Giá Bán: {{number_format($detail_product->promotion_price)}}</b></span>
                        @endif


                        <li>Loại Sản Phẩm:  <span class="list-value ">{{$ten_chude->name}} </span></li>
                        <li>Đánh Giá:  <span class="list-value"> 200</span></li>
                        <li>số Lượng có sẵn:
                                @if($detail_product->quanlity <= 0)
                                    <span class="list-value text-danger">Hết hàng</span>
                                @else
                                    <span class="list-value">{{$detail_product->quanlity}}</span>
                                @endif

                            </li>
                    </ul>
                    <div class="price-block">
                        @if($detail_product->promotion_price == 0)
                            <span class="price">{{number_format($detail_product->unit_price)}}</span>
                        @else
                            <span class="price-old">{{number_format($detail_product->unit_price)}}</span>
                            <span class="price-discount">{{number_format($detail_product->promotion_price)}}</span>
                        @endif
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
                        <p> {{$detail_product->description}} </p>
                    </article>
                    <div class="add-to-cart-row">
                        <div class="count-input-block">
                            <span class="widget-label">Số Lượng</span>
                            <input type="number" class="form-control text-center" min="1"  step="1" value="1" >

                        </div>
                        <div class="add-cart-btn">
                            <a href="{{route('themgiohang',$detail_product->id)}}" class="btn btn-outlined--primary"><span class="plus-icon">+</span>Thêm Vào Giỏ Hàng</a>
                        </div>
                    </div>
                    <div class="compare-wishlist-row">
                        <a href="" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
                        <a href="" class="add-link"><i class="fas fa-random"></i>Add to Compare</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="sb-custom-tab review-tab section-padding">
            <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
                        {{$detail_product->description}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="true">
                       Đánh Giá Của Khách Hàng
                    </a>
                </li>
            </ul>
            <div class="tab-content space-db--20" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                    <article class="review-article">
                        <h1 class="sr-only">Mô tả</h1>
                        <p> {{$detail_product->description}}</p>
                    </article>
                </div>
                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                    <div class="review-wrapper">
                        <h2 class="title-lg mb--20">Đánh Giá của khách hàng</h2>

                        @foreach($show_comment as $noidung_comment)
                        <div class="review-comment mb--20">
                            <div class="avatar">
                                <img src="image\icon\author-logo.png" alt="">
                            </div>
                            <div class="text">
                                <div class="rating-block mb--15">
                                    <span class="ion-android-star-outline star_on"></span>
                                    <span class="ion-android-star-outline star_on"></span>
                                    <span class="ion-android-star-outline star_on"></span>
                                    <span class="ion-android-star-outline"></span>
                                    <span class="ion-android-star-outline"></span>
                                </div>

                                <h6 class="author">ADMIN – <span class="font-weight-400">March 23, 2015</span>
                                </h6>

                                <p>{{$noidung_comment->body_post}}</p>

                            </div>
                        </div>

                        @endforeach
                        <h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
                        <div class="rating-row pt-2">
                            <p class="d-block">Your Rating</p>
                            <span class="rating-widget-block">
                                        <input type="radio" name="star" id="star1">
                                        <label for="star1"></label>
                                        <input type="radio" name="star" id="star2">
                                        <label for="star2"></label>
                                        <input type="radio" name="star" id="star3">
                                        <label for="star3"></label>
                                        <input type="radio" name="star" id="star4">
                                        <label for="star4"></label>
                                        <input type="radio" name="star" id="star5">
                                        <label for="star5"></label>
                                    </span>


                            <form action="{{route('detail_product',$detail_product->id)}}" class="mt--15 site-form " method="POST">

                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input type="hidden" name="productId" value="{{$detail_product->id}}"/>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group"  name="body_post">

                                            <label for="message">Comment</label>
                                            <textarea name="body_post" id="body_post" cols="30" rows="10" class="form-control"></textarea>

                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="name">Name *</label>
                                            <input type="text" id="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="text" id="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input type="text" id="website" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <button type="submit" class="btn btn-black">
                                            Post Comment
                                        </button>
                                    </div>
                                </div>
                            </form>




                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--=================================
RELATED PRODUCTS BOOKS
===================================== -->
    <section class="">
        <div class="container">
            <div class="section-title section-title--bordered">
                <h2>SẢN PHẨM LIÊN QUAN</h2>
            </div>
            <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 4,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} }
            ]'>
                @foreach($sp_tuongtu as $sp)

                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="{{route('detail_product',$sp->id)}}" class="author">
                               {{$sp->name}}
                            </a>
                            <h3><a href="{{route('detail_product',$sp->id)}}">{{$sp->description}}</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="images\products\{{$sp->image}}" alt="" height="340px">
                                <div class="hover-contents">
                                    <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                        <img src="images\products\{{$sp->images}}" alt="" height="340px">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
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
    <div class="row pt--30">

        <div class="col-md-12">
            <div class="pagination-block">
                <ul class="pagination-btns flex-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                   {{$sp_tuongtu->links()}}
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <!-- Modal -->

</main>

@endsection

