
@extends("admin.layout_admin")
@section("title","List order")
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
                                    <li class="list-inline-item">List Order</li>
                                </ul>
                            </div>
                            <button class="au-btn au-btn-icon au-btn--green">
                                <i class="zmdi zmdi-plus"></i>Thêm Đơn Hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END BREADCRUMB-->
    <div class="row m-t-5">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                        {{--                        <th>Ngày Tạo</th>--}}
                        {{--                        <th>Ngày Sủa</th>--}}
                        <th>Thao Tác</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($item as $sp)
                        <tr>
                            <?php
                            $end = date('d - m - Y',strtotime($sp->create_at))
                            ?>
                            <th>{{$sp->id_bill}}</th>
                            <th>{{$sp->id_product}}</th>
                            <th>{{$sp->quanlity}}</th>
                            <th>{{$sp->unit_price}}</th>

                            {{--                           <th>{{$sp->update_at}}</th>--}}
                            {{--                            <th>{{$sp->create_at}}</th>--}}
                            <th>
                                <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                        <i class="zmdi zmdi-mail-send"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                        <i class="zmdi zmdi-more"></i>
                                    </button>
                                </div>
                            </th>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection
