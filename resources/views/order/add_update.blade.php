@extends("admin.layout_admin")
@section("title","Product")
@section("content")

    <div class="col-lg-12 m-t-100">
        <div class="card">
            <div class="card-header">
                <strong>Thêm</strong> Đơn Hàng
            </div>
            <div class="card-body card-block">
                <form action="{{route('Order')}}?" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="center">
                        @if(Session::has("thongbao"))
                            <div class="alert alert-success">
                                {{Session::get("thongbao")}}
                            </div>
                        @endif
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Tên Sản Phẩm</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name" placeholder="Nhập Tên Sản Phẩm" class="form-control">
                            @if($errors->has("name"))
                                <small class="text-danger">{{$errors->first('name')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Loại Sản Phẩm</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="id_type" placeholder="Nhập Loại Sản Phẩm" class="form-control">
                            @if($errors->has("id_type"))
                                <small class="text-danger">{{$errors->first('id_type')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Mô Tả</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="description" placeholder="Nhập Mô Tả" class="form-control">
                            @if($errors->has("description"))
                                <small class="text-danger">{{$errors->first('description')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Giá Gốc</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="unit_price" placeholder="Nhập Giá Gốc" class="form-control">
                            @if($errors->has("unit_price"))
                                <small class="text-danger">{{$errors->first('unit_price')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Giá Khuyến Mãi</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="promotion_price" placeholder="Nhập Giá Khuyến Mãi" class="form-control">
                            @if($errors->has("promotion_price"))
                                <small class="text-danger">{{$errors->first('promotion_price')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Loại</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="new" placeholder="Nhập Loại" class="form-control">
                            @if($errors->has("new"))
                                <small class="text-danger">{{$errors->first('new')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Hình 1</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="image" placeholder="Nhập Hình 1" class="form-control">
                            @if($errors->has("image"))
                                <small class="text-danger">{{$errors->first('image')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Hình 2</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="images" placeholder="Nhập Hình 2" class="form-control">
                            @if($errors->has("images"))
                                <small class="text-danger">{{$errors->first('images')}}</small>
                            @endif
                        </div>
                    </div>



                {{--                    <div class="row form-group">--}}
                {{--                        <div class="col col-md-3">--}}
                {{--                            <label for="text-input" class=" form-control-label">Ngày Sửa</label>--}}
                {{--                        </div>--}}
                {{--                        <div class="col-12 col-md-9">--}}
                {{--                            <input type="text" id="text-input" name="update_at" placeholder="Nhập Loại Sản Phẩm" class="form-control">--}}

                {{--                        </div>--}}
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Lưu
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Làm Lại
                </button>
            </div>
            </form>
        </div>

    </div>

    </div>

@endsection

