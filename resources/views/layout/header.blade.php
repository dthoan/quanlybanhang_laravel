


<div class="site-header d-none d-lg-block">
    <div class="header-middle pt--10 pb--10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 ">
                    <a href="{{route('trangchu')}}" class="site-brand">
                        <img src="image\logo.png" alt="">
                    </a>
                </div>
                <div class="col-lg-3">
                    <div class="header-phone ">
                        <div class="icon">
                            <i class="fas fa-headphones-alt"></i>
                        </div>
                        <div class="text">
                            <p>Liên hệ: </p>
                            <p class="font-weight-bold number">+01-202-555-0181</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-navigation flex-lg-right">
                        <ul class="main-menu menu-right ">
                            <li class="menu-item">
                                <a href="javascript:void(0)">Trang chủ</a>
{{--                                <ul class="sub-menu">--}}
{{--                                    <li> <a href="{{route('trangchu')}}">Sản Phẩm Mới</a></li>--}}
{{--                                    <li> <a href="{{route('trangchu')}}">Sản Phẩm Bán Chạy</a></li>--}}
{{--                                    <li> <a href="{{route('trangchu')}}">Sản Phẩm Khuyến Mãi</a></li>--}}

{{--                                </ul>--}}
                            </li>
                            <!-- Shop -->
                            <li class="menu-item has-children">
                                <a href="javascript:void(0)">Shop <i class="fas fa-chevron-down dropdown-arrow"></i></a>
                                <ul class="sub-menu zzzz">
                                    @foreach($type_pro as $type)
                                        @if($type->id != 2)
                                            <li><a href="{{route("typecatelory",$type->id)}}">{{$type->name}}</a></li>
                                        @endif
                                    @endforeach

                                </ul>
                            </li>
                            <!-- Pages -->
                            <li class="menu-item">
                                <a href="{{route('blog')}}">Diễn đàn</a>
                            </li>
                            <!-- Blog -->
{{--                            <li class="menu-item">--}}
{{--                                <a href="{{route('about')}}">Diễn đàn</a>--}}
{{--                            </li>--}}
                            <li class="menu-item">
                                <a href="{{route('contact')}}">Trợ giúp</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom pb--10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <nav class="category-nav   ">
                        <div>
                            <a href="javascript:void(0)" class="category-trigger"><i class="fa fa-bars"></i>
                                Phân Loại Sản Phẩm</a>
                            <ul class="category-menu">

                                @foreach($type_pro as $type)
                                    <li class="cat-item ">
                                        <a href="{{route("typecatelory",$type->id)}}">{{$type->name}}</a>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-5">
                    <form action="{{route('search')}}" method="get" class="header-search-block">
                        <input type="text" name="key" placeholder="Nhập Sản Phẩm Cần Tìm.." value="{{(isset($_GET['key']))?$_GET['key']:""}}">
                        <button type="submit">Tìm Kiếm</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="main-navigation flex-lg-right">
                        <div class="cart-widget">
                            <div class="login-block">


                        @if(Auth::check())
                                <a href="{{route('logout')}}" class="font-weight-bold">Chào Bạn {{Auth::user()->full_name}}</a><br>
                                    <span>Hoặc</span><a href="{{route('logout')}}">Đăng Xuất</a>
                        @else
                                 <a href="{{route('trangchuLogin')}}" class="font-weight-bold">Đăng Nhập</a> <br>
                                 <span>Hoặc</span><a href="{{route('trangchuRegister')}}">Đăng Ký</a>

                        @endif
                            </div>



                            <div class="cart-block">
                                <div class="cart-total">
                                            <span class="text-number">
                                              {{ $totalqty ?? ''}}
                                            </span>
                                    <span class="text-item">
                                                Giỏ Hàng
                                            </span>
                                    <span class="price">
                                        ${{number_format($totalprice ?? 0)}}
                                                <i class="fas fa-chevron-down"></i>
                                            </span>
                                </div>

                                @if(isset(Auth::user()->id))
                                        <div class="cart-dropdown-block">
                                            @if(isset($product))
                                                @foreach($product  as $sp)
                                                    <div class=" single-cart-block ">
                                                        <div class="cart-product">
                                                            <a href="{{route('cart')}}" class="image">
                                                                <img src="..\storage\app\public\{{$sp->image}}" alt="">
                                                            </a>
                                                            <div class="content">
                                                                <h3 class="title" style=" width: 50px;
                                                                                    overflow: hidden;
                                                                                    white-space: nowrap;
                                                                                    text-overflow: ellipsis;"
                                                                ><a href="product-details.html">{{$sp->name}}</a></h3>
                                                                <p class="price">
                                                                    <span class="price">{{$sp->quatity}} × </span>
                                                                    {{number_format($sp->price)}}
                                                                </p>
                                                            </div>
                                                            <button class="pull-right"     >
                                                                @if(isset(Auth::user()->id))
                                                                    <a href="{{route('reduceItem',$sp->id )}}" style="margin-left: 5px;" class="fas fa-times"></a>
                                                                @else
                                                                    <a href="{{route('delItem',$sp->id )}}" style="margin-left: 5px;" class="fas fa-times"></a>
                                                                @endif
                                                                <a href="{{route('themgiohang',$sp->id )}}" class="fas fa-plus"></a>
                                                            </button>
                                                        </div>

                                                    </div>
                                                @endforeach
                                            @endif

                                            <p>Tổng tiền: {{number_format($totalprice ?? 0)}}</p>
                                            <div class=" single-cart-block ">
                                                <div class="btn-block">
                                                    <a href="{{route("cart")}}" class="btn">

                                                        Giỏ Hàng ({{$totalqty ?? 0}})

                                                        <i class="fas fa-chevron-right"></i></a>
                                                    <a href="{{route('checkout')}}" class="btn btn--primary">Đặt Hàng<i class="fas fa-chevron-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                @elseif(Session('cart') !== null)
                                        <div class="cart-dropdown-block">

                                            @foreach($product as $sp)
                                                <div class=" single-cart-block ">
                                                    <div class="cart-product">
                                                        <a href="{{route('cart')}}" class="image">
                                                            <img src="..\storage\app\public\{{$sp['item']['image']}}" alt="">
                                                        </a>
                                                        <div class="content">
                                                            <h3 class="title" style=" width: 50px;
                                                                                    overflow: hidden;
                                                                                    white-space: nowrap;
                                                                                    text-overflow: ellipsis;"
                                                            ><a href="product-details.html">{{$sp['item']['name']}}</a></h3>
                                                            <p class="price">
                                                                <span class="price">{{$sp['qty']}} × </span>
                                                                @if($sp['item']['promotion_price'] == 0)
                                                                    {{number_format($sp['item']['unit_price'])}}
                                                                @else
                                                                    {{number_format($sp['item']['promotion_price'])}}
                                                                @endif
                                                            </p>


                                                        </div>
                                                        <button class="pull-right"     >

                                                            <a href="{{route('delItem',$sp['item']['id'] )}}" style="margin-left: 5px;" class="fas fa-times"></a>
                                                            <a href="{{route('themgiohang',$sp['item']['id'] )}}" class="fas fa-plus"></a>


                                                        </button>
                                                    </div>

                                                </div>
                                            @endforeach
                                            <p>Tổng tiền: {{number_format($totalprice ?? '')}}</p>
                                            <div class=" single-cart-block ">
                                                <div class="btn-block">
                                                    <a href="{{route("cart")}}" class="btn">

                                                        Giỏ Hàng (@if(Session::has('cart')){{$totalqty ?? ''}}) @else  Giỏ Hàng(0) @endif

                                                        <i class="fas fa-chevron-right"></i></a>
                                                    <a href="{{route('checkout')}}" class="btn btn--primary">Đặt Hàng<i class="fas fa-chevron-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=================================
Brands Slider
