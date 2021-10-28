@extends("layout.layout")
@section("title","Pustok - Type Product")
@section("content")
    <section class="breadcrumb-section">
        <h2 class="sr-only">{{$tenloai[0]->name}}</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item active"><a href="">Loại Sản Phẩm {{$tenloai[0]->name}} </a></li>

                    </ol>
                </nav>
            </div>
        </div>
    </section>
<main class="inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-2">
                <div class="shop-toolbar with-sidebar mb--30">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-2 col-sm-6">
                            <!-- Product View shop-product-wrap with-pagination row space-db--30 shop-border listMode -->
                            <div class="product-view-mode">
                                <a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
                                <a href="#" class="sorting-btn" data-target="grid-four">
											<span class="grid-four-icon">
												<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
											</span>
                                </a>

                            </div>
                        </div>



                    </div>
                </div>
                <div class="shop-toolbar d-none">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-2 col-sm-6">
                            <!-- Product View Mode -->
                            <div class="product-view-mode">
                                <a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
                                <a href="#" class="sorting-btn" data-target="grid-four">
											<span class="grid-four-icon">
												<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
											</span>
                                </a>

                            </div>
                        </div>



                    </div>
                </div>
                <div class="shop-product-wrap grid with-pagination row space-db--30 shop-border">
                   @foreach($sp_theoloai as $sp)
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-card">
                                <div class="product-grid-content">
                                    <div class="product-header">
                                        <a href="{{route('detail_product',$sp->id)}}" class="author"
                                           style="  width: 200px;
                                                        overflow: hidden;
                                                        white-space: nowrap;
                                                        text-overflow: ellipsis;"
                                        >
                                           {{$sp->name}}
                                        </a>
                                        <h3><a href="{{route('detail_product',$sp->id)}}">Loại sản phẩm</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="..\storage\app\public\{{$sp->image}}" alt="">
                                            <div class="hover-contents">
                                                <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                    <img src="..\storage\app\public\{{$sp->image}}" alt="">
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
                        </div>
                    @endforeach

                </div>
                <!-- Pagination Block -->

                <div class="row pt--30">

                    <div class="col-md-12">
                        <div class="pagination-block">
                            <ul class="pagination-btns flex-center">
                                <li><a href="" class="single-btn prev-btn ">|<i class="zmdi zmdi-chevron-left"></i> </a></li>
                                <li><a href="" class="single-btn prev-btn "><i class="zmdi zmdi-chevron-left"></i> </a></li>

                                {{$sp_theoloai->links()}}
                                <li><a href="" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                <li><a href="" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i>|</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
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
                                                <li>Brands: <a href="#" class="list-value font-weight-bold">
                                                        Canon</a></li>
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
                                                <p>Long printed dress with thin adjustable straps. V-neckline
                                                    and wiring under the Dust with ruffles at the bottom
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
                                                <a href="" class="add-link"><i class="fas fa-heart"></i>Add to
                                                    Wish List</a>
                                                <a href="" class="add-link"><i class="fas fa-random"></i>Add to
                                                    Compare</a>
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
            </div>
            <div class="col-lg-3  mt--40 mt-lg--0">
                <div class="inner-page-sidebar">
                    <!-- Accordion -->
                    <div class="single-block">
                        <h3 class="sidebar-title">Phân loại sản phẩm</h3>
                        <ul class="sidebar-menu--shop">


                           @foreach($type_pro as $sp)
                               @if($sp->id != 2)
                                <li><a href="{{route('typecatelory',$sp->id)}}"
                                       style="  width: 200px;
                                                        overflow: hidden;
                                                        white-space: nowrap;
                                                        text-overflow: ellipsis;"
                                    >{{$sp->name}} </a></li>
                                @endif
                            @endforeach


                        </ul>
                    </div>
                    <!-- Price -->

                    <!-- Size -->

                    <!-- Color -->


                </div>
            </div>
        </div>
    </div>
</main>
<!--=================================
Brands Slider
===================================== -->

<!--=================================
Footer Area
===================================== -->
@endsection
