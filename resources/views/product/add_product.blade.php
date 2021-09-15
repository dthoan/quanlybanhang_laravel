@extends("admin.layout_admin")
@section("title","Product")
@section("content")

    <div class="col-lg-12 m-t-100">
        <div class="card">
            <button class="card-header">

                    <strong>Thêm</strong> Sản Phẩm ABC


            </button>
            <div class="card-body card-block">
                <form action="{{route('add_product')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="center">
                        @if(Session::has("thongbao"))
                            <div class="alert alert-success">
                                {{Session::get("thongbao")}}
                            </div>
                        @endif
                        @if(Session::has("error"))
                            <div class="alert alert-success">
                                {{Session::get("error")}}
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
                            <select class="form-control" name="id_type">
                                <option value="0">--Danh mục cha--</option>
                                @foreach($category as  $cate)
                                    @if($cate->p_type_product ==0)
                                        <option class="form-control" value="{{$cate->id}}">{{$cate->name}}</option>
                                        @foreach($category as $cate_option)
                                            @if($cate_option->p_type_product != 0 && $cate_option->p_type_product == $cate->id)
                                                <option class="form-control" value="{{$cate_option->id}}">{{'--'.$cate_option->name}}</option>
                                            @endif
                                        @endforeach

                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Mô Tả</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea type="text" name="description" placeholder="Nhập Mô Tả" class="form-control" id="ckeditor"></textarea>

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
                            <label for="text-input" class=" form-control-label">New</label>
                        </div>

                        <div class="col-12 col-md-9">
                            <select name="new" class="form-control">
                                <option value="0">Hàng mới</option>
                                <option value="1">Đang bán</option>
                                <option value="2">Hàng qua sử dụng</option>
                                <option value="3">Tồn kho</option>
                                <option value="4">Ngưng bán</option>
                            </select>
                            @if($errors->has("new"))
                                <small class="text-danger">{{$errors->first('new')}}</small>
                            @endif
{{--                            <input type="text" id="text-input" name="new" placeholder="Nhập Loại" class="form-control">--}}

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input"  class=" form-control-label">Hình 1</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file"  name="image"  class="form-control" >
                            @if($errors->has("image"))
                                <small class="text-danger">{{$errors->first('image')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input"  class=" form-control-label">Hình 2</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file"  name="images"  class="form-control">
                            @if($errors->has("images"))
                                <small class="text-danger">{{$errors->first('images')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Alias</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="alias" placeholder="Alias" class="form-control">
                            @if($errors->has("alias"))
                                <small class="text-danger">{{$errors->first('alias')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Status</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="status" class="form-control">
                                <option value="0">Hiện</option>
                                <option value="1">Ẩn</option>

                            </select>

                            @if($errors->has("name"))
                                <small class="text-danger">{{$errors->first('name')}}</small>
                            @endif
                        </div>
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
