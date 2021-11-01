@extends("admin.layout_admin")
@section("title","List order")
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
                                    <li class="list-inline-item">Detail Order</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row">

        <div class="col-md-12">
            <div style="margin-left: 30px;">
                <label style="margin-top: 20px;">Tên Khách Hàng: <b>{{$khachHang->name}}</b></label></br>
                <label>Địa Chỉ: <b>{{$khachHang ->address}}</b></label></br>

                <label>Tổng Tiền: <b>{{number_format($hoaDon ->total)}} Ngàn Đồng</b></label></br>
                <div class="row form-group">
                    <label style="margin-left: 17px;">Trạng thái: </label>
                        <b>
                            <select class="form-control" style="margin-left: 100px;">
                                <option class="" value="2"> Chưa duyệt</option>
                                <option value="1">Đã xử lý</option>
                                {{--                            <option data-id="{{$user->id}}" value="{{$role->id}}" {{($role->name == $user->role_name)?"selected":""}}  >{{$role->name}}</option>--}}
                            </select>
                            {{--                        @if($khachHang->status == 2)--}}
                            {{--                            Chưa duyệt--}}
                            {{--                        @else($khachHang->status == 1)--}}
                            {{--                            Đã xử lý--}}
                            {{--                        @endif--}}
                        </b>

                    </br>
                </div>


            </div>
            <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
            <tr>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Đơn Giá</th>


            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$noidung->name}}</td>
                <td>{{$noidung->quanlity}}</td>
                <td>{{$noidung->unit_price}}</td>

            </tr>

            </tbody>
        </table>
    </div>
        </div>
    </div>

@endsection
