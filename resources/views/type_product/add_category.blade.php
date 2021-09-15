@extends("admin.layout_admin")
@section("title","Category")
@section("content")



    <div class="col-lg-12 m-t-100">
        <div class="card">
            <div class="card-header">
                <strong>Thêm</strong> Danh Mục
            </div>
            <div class="card-body card-block">
                <form action="{{URL::to('/admin/add-category')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="center">

                         @if(Session::has("thongbao"))
                             <div class="alert alert-success">
                                {{Session::get("thongbao")}}
                             </div>
                         @endif
                        @if(Session::has("error"))
                           <div class="alert alert-danger">
                                {{Session::get("error")}}
                           </div>
                        @endif

                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Tên Danh Mục</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name" placeholder="Nhập Tên Danh Mục" class="form-control">
                            @if($errors->has("name"))
                                <small class="text-danger">{{$errors->first('name')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Alias</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="alias" name="alias" placeholder="Nhập alias" class="form-control">
                            @if($errors->has("name"))
                                <small class="text-danger">{{$errors->first('alias')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Chú thích</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="description" placeholder="Nhập Tên Danh Mục" class="form-control">
                            @if($errors->has("description"))
                                <small class="text-danger">{{$errors->first('description')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row form-group">
                    <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Hình ảnh</label>
                        </div>
                    <div class="col-12 col-md-9">
                            <input type="file" id="image" name="image" placeholder="Nhập Hình ảnh" class="form-control">
                            @if($errors->has("image"))
                                <small class="text-danger">{{$errors->first('image')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Danh mục</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select class="form-control" name="p_type_product">
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
                            <label for="text-input" class=" form-control-label">Trạng thái</label>
                        </div>

                        <div class="col-9 col-md-6">
                            <select class="form-control" name="status">
                                <option class="form-control" value="0">Hiện</option>
                                <option class="form-control" value="1">Ẩn</option>
                                @if($errors->has("status"))
                                    <small class="text-danger">{{$errors->first('status')}}</small>
                                @endif
                            </select>

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
