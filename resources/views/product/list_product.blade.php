@extends("admin.layout_admin")
@section("title","List Product")
@section("content")
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
                                <i class="zmdi zmdi-plus"></i>Thêm Sản Phẩm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="center">
        @if(Session::has("thongbao"))
            <div class="alert alert-success">
                {{Session::get("thongbao")}}
            </div>
        @endif
    </div>

    <!-- END BREADCRUMB-->
<div class="row m-t-5">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Loại Sản Phẩm</th>
                    <th>Mô Tả</th>
                    <th>Giá</th>
                    <th>Khuyến Mãi</th>
                    <th>Hình</th>
                    <th>Ngày Tạo</th>
                    <th >Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($ListProduct as $sp)
                <tr>
                    <td>{{$sp->id}}</td>
                    <td>{{$sp->name}}</td>
                    <td>{{$sp->id_type}}</td>
                    <td>{{$sp->description}}</td>
                    <td>{{$sp->unit_price}}</td>
                    <td>{{$sp->promotion_price}}</td>
                    <td><img  src=".\images\products\{{$sp->image}}" alt="" height="90px" width="90px"></td>
                    <td>{{$sp->create_at}}</td>
                    <td>
                        <div class="table-data-feature">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">

                                    <i class="zmdi zmdi-mail-send"   >

                                    </i>

                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <a class="zmdi zmdi-delete"
                                   href="{{route('del_product',$sp->id)}}"
                                   onclick="return confirm('Are you sure delete this category?????')">

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
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection
