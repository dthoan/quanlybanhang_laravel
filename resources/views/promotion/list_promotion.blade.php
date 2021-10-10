@extends("admin.layout_admin")
@section("title","List")
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
                                <a href="{{route('add')}}">
                                    <i class="zmdi zmdi-plus"></i>Thêm Sản Phẩm
                                </a>
                            </button>
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

                        <th>Tên chương trình KM</th>
                        <th>SP áp dụng</th>
                        <th>Code</th>
                        <th>Giá KM</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Nội dung KM</th>


                        <th >Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($List as $sp)
                        <tr>

                            <td>{{$sp->prom_name}}</td>
                            <td>

                                @foreach($product as $products)
                                    @if($sp->id_product== $products->id)
                                        {{$products->name}}
                                    @endif
                                @endforeach
                            </td>

                            {{--                    <td>{{$sp->id_type}}</td>--}}

                            <td>{{$sp->code}}</td>
                            <td>{{$sp->prom_price}}</td>
                            <td>{{$sp->prom_startdate}}</td>
                            <td>{{$sp->prom_enddate}}</td>
                            <td>{{$sp->prom_content}}</td>


                            <td>
                                <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Send">

                                        <i class="zmdi zmdi-mail-send"   >

                                        </i>

                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <a href="{{route('edit',$sp->id)}}"> <i class="zmdi zmdi-edit"></i></a>

                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <a
                                            href="{{route('del',$sp->id)}}"
                                            onclick="return confirm('Bạn có thật sự muốn xóa?????')">
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
                <span>{{$List->render()}}</span>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection
