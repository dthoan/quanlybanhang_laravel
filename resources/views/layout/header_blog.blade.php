
<div class="site-header d-none d-lg-block">
    <div class="header-middle pt--10 pb--10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 ">
                    <a href="/" class="site-brand">
                        <img src="image\logo1.png" alt="">
                    </a>
                </div>
                <div class="col-lg-3">
                    <div class="header-phone ">
                        
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-navigation flex-lg-right">
                        <ul class="main-menu menu-right ">

                            <!-- Shop -->

                            <li class="menu-item">
                                <a href="{{route('blog')}}">Bài viết</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('blog')}}">Hỏi đáp</a>
                            </li>
                            <!-- Pages -->
                            <li class="menu-item">
                                <a href="{{route('blog')}}">Thảo luận</a>
                            </li>
                            <li class="menu-item ">
                                <div class="btn btn-outline-primary ">
                                    <a href="{{route('cau_hoi')}}">Đặt câu hỏi</a>
                                </div>
                                <!-- <div class="text-center">
                                    <a href="{{route('cau_hoi')}}">Câu hỏi của bạn</a>
                                </div> -->

                            </li>
                            <!-- Blog -->
                            {{--                            <li class="menu-item">--}}
                            {{--                                <a href="{{route('about')}}">Diễn đàn</a>--}}
                            {{--                            </li>--}}

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

                    </nav>
                </div>
                <div class="col-lg-5">

                </div>
                <div class="col-lg-4">
                    <div class="main-navigation flex-lg-right">
                        @if(Auth::check())
                            <a href="{{route('logout')}}" class="font-weight-bold">Chào Bạn {{Auth::user()->full_name}}</a><br>
                            <span style="margin-left: 7px; margin-right: 7px;"> Hoặc </span><a href="{{route('logout')}}"> Đăng Xuất</a>
                        @else
                            <a href="{{route('trangchuLogin')}}" class="font-weight-bold"> Đăng Nhập</a> <br>
                            <span style="margin-left: 7px; margin-right: 7px;"> Hoặc </span><a href="{{route('register')}}"> Đăng Ký</a>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=================================
Brands Slider
