@extends("admin.layout_admin")
@section("title","Account")
@section("content")
    <section class="au-breadcrumb m-t-75">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="au-breadcrumb-content">
                            <div class="au-breadcrumb-left">
                                <span class="au-breadcrumb-span">You are here:</span>
                                <ul class="list-unstyled list-inline au-breadcrumb__list">
                                    <li class="list-inline-item active">
                                        <a href="{{route('index')}}">Trang Chủ</a>
                                    </li>
                                    <li class="list-inline-item seprate">
                                        <span>/</span>
                                    </li>
                                    <li class="list-inline-item">Detail Customer</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section: Block Content-->
    <section >

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-lg-12">

                <!-- Card -->
                <div class="mb-60">
                    <div class="pt-60 wish-list">

                        <br/>

                        <div class="row mb-12">
                            <div class="col-md-5 col-lg-3 col-xl-3">

                                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                    <img class="img-fluid w-100" id="blah"
                                         src="images/khachHang/{{$items->images}}" alt="Sample">

                                </div>
                            </div>
                            <div class="col-md-7 col-lg-9 col-xl-9">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        {{--                                        <div>--}}

                                        {{--                                            <input  type='file' onchange="readURL(this);" style="padding:10px; background:#2d2d2d;"/>--}}
                                        {{--                                            <img  id="blah" src="images/khachHang/image.jpeg" alt="your image" style=" max-width:180px;"/>--}}

                                        {{--                                        </div>--}}
                                        <div>

                                            <h2 style="padding-bottom: 10px"><input value="{{$items->name}}"></h2>
                                            <p class="mb-3 text-muted text-uppercase">
                                                Email: <input  class="mb-3 text-muted text-uppercase" value="{{$items->email}}"></p>
                                            <p class="mb-2 text-muted text-uppercase">
                                                Số Điện Thoại: <input  class="mb-3 text-muted text-uppercase" value="{{$items->phone_number}}"></p>
                                            <p class="mb-3 text-muted text-uppercase">
                                                Địa Chỉ:  <input  class="mb-3 text-muted text-uppercase" value="{{$items->address}}"></p>
                                            <p class="mb-3 text-muted text-uppercase">
                                                Số đơn hàng: <input  class="mb-3 text-muted text-uppercase" value="1"></p>
                                            <input  type='file' onchange="readURL(this);" style="padding:10px; background:#2d2d2d;"/>



                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                                                    class="fas fa-trash-alt mr-1"></i> Chỉnh sửa Thông tin</a>
                                            <a href="#!" type="button" class="card-link-secondary small text-uppercase"><i
                                                    class="fas fa-heart mr-1"></i> Cập Nhật </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- Card -->



                <!-- Card -->

                <!-- Card -->

            </div>
            <!--Grid column-->



        </div>
        <!-- Grid row -->
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </section>
    <!--Section: Block Content-->


@endsection

