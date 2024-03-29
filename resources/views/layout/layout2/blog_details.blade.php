@extends('layouts.layoutMaster')
@section('content')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Blog Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mb--60 mb-lg--0">
                    <div class="blog-post post-details mb--50">
                        <div class="sb-slick-slider blog-gallery-slider arrow-type-two" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 1,
                                            "arrows": true,
                                            "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
                                            "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"}
                                            }'>
                            <div class="single-image">
                                <img src="image\others\blog-img-big-1.jpg" alt="">
                            </div>
                            <div class="single-image">
                                <img src="image\others\blog-img-big-2.jpg" alt="">
                            </div>
                            <div class="single-image">
                                <img src="image\others\blog-img-big-3.jpg" alt="">
                            </div>
                        </div>
                        <div class="blog-content mt--30">
                            <header>
                                <h3 class="blog-title"> How BLOG TITLE Made Me A Better Salesperson</h3>
                                <div class="post-meta">
										<span class="post-author">
											<i class="fas fa-user"></i>
											<span class="text-gray">Posted by : </span>
											admin
										</span>
                                    <span class="post-separator">|</span>
                                    <span class="post-date">
											<i class="far fa-calendar-alt"></i>
											<span class="text-gray">On : </span>
											March 10, 2015
										</span>
                                </div>
                            </header>
                            <article>
                                <h3 class="d-none sr-only">blob-article</h3>
                                <p class="p-0">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu
                                    ex. Aenean posuere
                                    libero eu augue condimentum
                                    rhoncus. Praesent ornare tortor ac ante egestas hendrerit. Aliquam et metus
                                    pharetra, bibendum massa
                                    nec, fermentum
                                    odio. Nunc id leo ultrices, mollis ligula in, finibus tortor. Mauris eu dui ut
                                    lectus fermentum
                                    eleifend. Pellentesque
                                    faucibus sem ante, non malesuada odio varius nec. Suspendisse potenti.</p>
                                <blockquote>
                                    <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In
                                        venenatis elit ac
                                        ultrices convallis.
                                        Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper
                                        sit amet ligula ut
                                        eleifend. Proin dictum
                                        tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque
                                        scelerisque.</p>
                                </blockquote>
                                <p>Aenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam
                                    tempor, sed efficitur ex
                                    ultrices.
                                    Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh.
                                    Phasellus nec lacus id
                                    arcu facilisis
                                    elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio,
                                    nec iaculis lacus sem
                                    non lorem. Duis
                                    suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend
                                    odio, ac fringilla mi
                                    vehicula nec. Nunc
                                    vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus
                                    consectetur, placerat
                                    suscipit justo
                                    dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.</p>
                                <p>Suspendisse turpis ipsum, tempus in nulla eu, posuere pharetra nibh. In dignissim
                                    vitae lorem non
                                    mollis. Praesent
                                    pretium tellus in tortor viverra condimentum. Nullam dignissim facilisis nisl,
                                    accumsan placerat justo
                                    ultricies vel.
                                    Vivamus finibus mi a neque pretium, ut convallis dui lacinia. Morbi a rutrum
                                    velit. Curabitur sagittis
                                    quam quis
                                    consectetur mattis. Aenean sit amet quam vel turpis interdum sagittis et eget
                                    neque. Nunc ante quam,
                                    luctus et neque a,
                                    interdum iaculis metus. Aliquam vel ante mattis, placerat orci id, vehicula
                                    quam. Suspendisse quis eros
                                    cursus, viverra
                                    urna sed, commodo mauris. Cras diam arcu, fringilla a sem condimentum, viverra
                                    facilisis nunc.
                                    Curabitur vitae orci id
                                    nulla maximus maximus. Nunc pulvinar sollicitudin molestie.</p>
                            </article>
                            <footer class="blog-meta">
                                <div> <a href="#">3 comments </a> / TAGS: <a href="#">fashion</a>, <a href="#">t-shirt</a>, <a href="#">white</a></div>
                            </footer>
                        </div>
                    </div>
                    <div class="share-block mb--50">
                        <h3>Share Now</h3>
                        <div class="social-links  justify-content-center  mt--10">
                            <a href="#" class="single-social social-rounded"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="single-social social-rounded"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="single-social social-rounded"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#" class="single-social social-rounded"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="single-social social-rounded"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="comment-block-wrapper mb--50">
                        <h3>3 Comments</h3>
                        <div class="single-comment">
                            <div class="comment-avatar">
                                <img src="image\icon\author-logo.png" alt="">
                            </div>
                            <div class="comment-text">
                                <h5 class="author"> <a href="#"> Author</a></h5>
                                <span class="time">October 8, 2014 at 12:38 pm</span>
                                <p>Ame No Parade</p>
                            </div>
                            <a href="#" class="btn btn-outlined--primary btn-rounded reply-btn">Reply</a>
                        </div>
                        <div class="single-comment">
                            <div class="comment-avatar">
                                <img src="image\icon\author-logo.png" alt="">
                            </div>
                            <div class="comment-text">
                                <h5 class="author"> <a href="#">Jack</a></h5>
                                <span class="time">January 19, 2018 at 3:00 am</span>
                                <p>just a nice post</p>
                            </div>
                            <a href="#" class="btn btn-outlined--primary btn-rounded reply-btn">Reply</a>
                        </div>
                        <div class="single-comment">
                            <div class="comment-avatar">
                                <img src="image\icon\author-logo.png" alt="">
                            </div>
                            <div class="comment-text">
                                <h5 class="author"> <a href="#">Dexter</a></h5>
                                <span class="time">august 31, 2021 at 3:30 am</span>
                                <p>Awesome Post </p>
                            </div>
                            <a href="#" class="btn btn-outlined--primary btn-rounded reply-btn">Reply</a>
                        </div>
                    </div>
                    <div class="replay-form-wrapper">
                        <h3 class="mt-0">LEAVE A REPLY</h3>
                        <p>Your email address will not be published. Required fields are marked *</p>
                        <form action="./" class="blog-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message">Comment</label>
                                        <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
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
                                    <div class="submit-btn">
                                        <a href="#" class="btn btn-black">Post Comment</a>
                                    </div>
                                </div>
                            </div>
                        </form>
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
