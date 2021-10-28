@extends("layout.layout_blog")
@section("title","Pustok - Blog")
@section("content")
<style>
    p {

    }
</style>
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Diễn đàn</li>
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
                        @foreach($blog_all as $blog)
                        <div class="blog-card card-style-list">
                            <div class="row">

                                    <div class="col-md-12">
                                        <div class="card-content">
                                            <h3 class="title"><a href="{{route('blog_detail',$blog->id_blog)}}">{{$blog->name}}</a></h3>
                                            <p class="post-meta"><span>{{$blog->updated_at}}</span> | <a href="#">{{$blog->full_name}}</a></p>
                                            <article>
                                                <h2 class="sr-only">
                                                    Blog Article
                                                </h2>
                                                <p style=" width: 500px;
                                                            overflow: hidden;
                                                            white-space: nowrap;
                                                            text-overflow: ellipsis;">{!! $blog->description !!}</p>

                                                <a href="{{route('blog_detail',$blog->id_blog)}}" class="blog-link">Xem thêm</a>
                                            </article>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        @endforeach

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

                        <div class="single-block ">
                            <h2 class="sidebar-title mb--30">Chủ đề</h2>
                            <ul class="sidebar-list">
                                @foreach($theme_all as $theme)

                                <li><a href="{{route('blog')}}">{{$theme->theme_name}}</a></li>

                                @endforeach
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


@endsection
