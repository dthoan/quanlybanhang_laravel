@extends("admin.layout_admin")
@if ($isEdit)
    @section("title","Edit Product")
@else
    @section("title","Create Product")
@endif


@section("content")
    <div class="col-lg-12 m-t-100">
        <div class="card">
            <div class="card-header">
                <strong>
                    @if ($isEdit)
                        Chỉnh sửa
                    @else
                        Thêm
                    @endif
                </strong> Sản Phẩm @if ($isEdit) {{$product->name}}  @endif
            </div>
            <div class="card-body card-block">
                <form
                    @if ($isEdit)
                    action="{{  route('edit_product', $product->id)}}"
                    @endif

                    method="POST" enctype='multipart/form-data'>
                    {{csrf_field()}}

                    <input type="hidden" name = "productId" value = "{{$product->id}}">
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
                            <input type="text" id="text-input" name="name" value="{{$product->name}}" class="form-control">
                            @if($errors->has("name"))
                                <small class="text-danger">{{$errors->first('name')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Số lượng có sẵn</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="quanlity" value="{{$product->quanlity}}" class="form-control">
                            @if($errors->has("quanlity"))
                                <small class="text-danger">{{$errors->first('quanlity')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Loại Sản Phẩm</label>
                        </div>
                        <div class="col-12 col-md-9">

                            <div class="row form-group">

                                <div class="col-12 col-md-9">
                                    <select class="form-control" name="id_type" >

                                        @foreach($category as  $cate)
                                            @if( $cate->p_type_product ==0)
                                                <option class="form-control" value="{{$cate->id}}">{{$cate->name}}</option>
                                                @foreach($category as $cate_option)
                                                    @if($cate_option->p_type_product != 0 && $cate_option->p_type_product == $cate->id)

                                                        <option class="form-control"
                                                                @if ($product -> id_type == $cate_option->id)
                                                                selected="selected"
                                                                @endif

                                                                value="{{$cate_option->id}}">{{'--'.$cate_option->name}}</option>
                                                    @endif
                                                @endforeach

                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                            </div>



                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Mô Tả</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text"  name="description" id="ckeditor" value="{{$product->description}}" class="form-control">
                            @if($errors->has("description"))
                                <small class="text-danger">{{$errors->first('description')}}</small>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Giá Gốc</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="unit_price" value="{{$product->unit_price}}" class="form-control">
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
                            <input type="text" id="text-input" name="promotion_price" value="{{$product->promotion_price}}" class="form-control">
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
                                <option value="1">Hàng qua sử dụng</option>
                            </select>
                            @if($errors->has("new"))
                                <small class="text-danger">{{$errors->first('new')}}</small>
                            @endif
                            {{--                            <input type="text" id="text-input" name="new" placeholder="Nhập Loại" class="form-control">--}}

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Hình 1</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <img style="width: 100px" src="..\storage\app\public\{{$product->image}}"/>
                            <input type="file" id="text-input" name="image"  >
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
                            <img style="width: 100px"  src="..\storage\app\public\{{$product->images}}"/>
                            <input type="file" id="text-input" name="images" value="..\storage\app\public\{{$product->images}}" >
                            @if($errors->has("images"))
                                <small class="text-danger">{{$errors->first('images')}}</small>
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

