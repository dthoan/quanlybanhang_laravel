@extends("admin.layout_admin")
@section("title","List Product")
@section("content")
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- BREADCRUMB-->
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
                                <li class="list-inline-item">List Product</li>
                            </ul>
                        </div>
                        <button class="au-btn au-btn-icon au-btn--green">
                            <a href="{{route('add_product')}}">
                                <i class="zmdi zmdi-plus"></i>Thêm Sản Phẩm
                            </a>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>





<div class="container">
    <h2>Danh sách sản phẩm</h2>


    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Tất cả</a></li>
        <li><a data-toggle="tab" href="#menu1">Mới</a></li>
        <li><a data-toggle="tab" href="#menu2">Hết hàng</a></li>
        <li><a data-toggle="tab" href="#menu3">Ngừng bán</a></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">

            <div class="center">
                @if(Session::has("thongbao"))
                <div class="alert alert-success">
                    {{Session::get("thongbao")}}
                </div>
                @endif
            </div>

            <!-- END BREADCRUMB-->
            <div class="row m-t-5">
                <div class="col-md-11">
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>

                                    <th class="text-center">Tên Sản Phẩm</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Loại Sản Phẩm</th>

                                    <th class="text-center">Giá</th>
                                    <th class="text-center">Khuyến Mãi</th>
                                    <th class="text-center">Trạng thái</th>

                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ListProduct as $sp)
                                <tr>

                                    <td class="text-center">{{$sp->name}}</td>
                                    <td class="text-center">{{$sp->quanlity}}</td>
                                    <td class="text-center">
                                        @foreach($category as $cate)
                                        @if($sp->id_type== $cate->id)
                                        {{$cate->name}}
                                        @endif
                                        @endforeach
                                    </td>

                                    {{-- <td>{{$sp->id_type}}</td>--}}

                                    <td class="text-center">{{$sp->unit_price}}</td>
                                    <td class="text-center">{{$sp->promotion_price}}</td>
                                    <td class="text-center">
                                        @if($sp->status==0)
                                        Mới
                                        @elseif($sp->status==1)
                                        Hết hàng
                                        @elseif($sp->status==2)
                                        Ngừng bán
                                        @endif

                                    </td>


                                    <td class="text-center">
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">

                                                <a href="{{route('detail_product',$sp->id)}}"><i class="zmdi zmdi-mail-send"></i></a>

                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <a href="{{route('edit_product',$sp->id)}}"> <i class="zmdi zmdi-edit"></i></a>

                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <a href="{{route('del_product',$sp->id)}}" onclick="return confirm('Bạn có thật sự muốn xóa?????')">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <span>{{$ListProduct->render()}}</span>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <div class="row m-t-5">
                <div class="col-md-11">
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>

                                    <th class="text-center">Tên Sản Phẩm</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Loại Sản Phẩm</th>

                                    <th class="text-center">Giá</th>
                                    <th class="text-center">Khuyến Mãi</th>


                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($moi as $sp)
                                <tr>

                                    <td class="text-center">{{$sp->name}}</td>
                                    <td class="text-center">{{$sp->quanlity}}</td>
                                    <td class="text-center">
                                        @foreach($category as $cate)
                                        @if($sp->id_type== $cate->id)
                                        {{$cate->name}}
                                        @endif
                                        @endforeach
                                    </td>

                                    {{-- <td>{{$sp->id_type}}</td>--}}

                                    <td class="text-center">{{$sp->unit_price}}</td>
                                    <td class="text-center">{{$sp->promotion_price}}</td>



                                    <td class="text-center">
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">

                                                <a href="{{route('detail_product',$sp->id)}}"><i class="zmdi zmdi-mail-send"></i></a>

                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <a href="{{route('edit_product',$sp->id)}}"> <i class="zmdi zmdi-edit"></i></a>

                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <a href="{{route('del_product',$sp->id)}}" onclick="return confirm('Bạn có thật sự muốn xóa?????')">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <span>{{$ListProduct->render()}}</span>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <div class="row m-t-5">
                <div class="col-md-11">
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>

                                    <th class="text-center">Tên Sản Phẩm</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Loại Sản Phẩm</th>

                                    <th class="text-center">Giá</th>
                                    <th class="text-center">Khuyến Mãi</th>


                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hetHang as $sp)
                                <tr>

                                    <td class="text-center">{{$sp->name}}</td>
                                    <td class="text-center">{{$sp->quanlity}}</td>
                                    <td class="text-center">
                                        @foreach($category as $cate)
                                        @if($sp->id_type== $cate->id)
                                        {{$cate->name}}
                                        @endif
                                        @endforeach
                                    </td>

                                    {{-- <td>{{$sp->id_type}}</td>--}}

                                    <td class="text-center">{{$sp->unit_price}}</td>
                                    <td class="text-center">{{$sp->promotion_price}}</td>



                                    <td class="text-center">
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">

                                                <a href="{{route('detail_product',$sp->id)}}"><i class="zmdi zmdi-mail-send"></i></a>

                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <a href="{{route('edit_product',$sp->id)}}"> <i class="zmdi zmdi-edit"></i></a>

                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <a href="{{route('del_product',$sp->id)}}" onclick="return confirm('Bạn có thật sự muốn xóa?????')">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <span>{{$ListProduct->render()}}</span>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
        </div>
        <div id="menu3" class="tab-pane fade">
            <div class="row m-t-5">
                <div class="col-md-11">
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>

                                    <th class="text-center">Tên Sản Phẩm</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Loại Sản Phẩm</th>

                                    <th class="text-center">Giá</th>
                                    <th class="text-center">Khuyến Mãi</th>


                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ngungBan as $sp)
                                <tr>

                                    <td class="text-center">{{$sp->name}}</td>
                                    <td class="text-center">{{$sp->quanlity}}</td>
                                    <td class="text-center">
                                        @foreach($category as $cate)
                                        @if($sp->id_type== $cate->id)
                                        {{$cate->name}}
                                        @endif
                                        @endforeach
                                    </td>

                                    {{-- <td>{{$sp->id_type}}</td>--}}

                                    <td class="text-center">{{$sp->unit_price}}</td>
                                    <td class="text-center">{{$sp->promotion_price}}</td>



                                    <td class="text-center">
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">


                                                <a href="{{route('detail_product',$sp->id)}}"><i class="zmdi zmdi-mail-send"></i></a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <a href="{{route('edit_product',$sp->id)}}"> <i class="zmdi zmdi-edit"></i></a>

                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <a href="{{route('del_product',$sp->id)}}" onclick="return confirm('Bạn có thật sự muốn xóa?????')">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <span>{{$ListProduct->render()}}</span>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection