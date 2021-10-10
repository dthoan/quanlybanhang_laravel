@extends("admin.layout_admin")
@if ($isEdit)
    @section("title","Edit")
@else
    @section("title","Create")
@endif

@section("content")
    <script src="admin/vendor/jquery-3.2.1.min.js"></script>


    <div class="col-lg-12 m-t-100">
        <div class="card">
            <div class="card-header">
                <strong>
                    @if ($isEdit)
                        Chỉnh sửa
                    @else
                        Thêm
                    @endif
                </strong> Sản Phẩm @if ($isEdit) {{$promotion->prom_name}}  @endif
            </div>
            <div class="card-body card-block">
                <form
                    @if ($isEdit)
                    action="{{  route('add_edit',$promotion->id)}}"
                    @endif

                    method="POST" enctype='multipart/form-data'>
                    {{csrf_field()}}

                    <input type="hidden" name = "promotionId" value = "{{$promotion->id}}">

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
                            <label for="text-input" class=" form-control-label">Tên chương trình KM</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="prom_name" value="{{$promotion->prom_name}}" class="form-control">
                            @if($errors->has("prom_name"))
                                <small class="text-danger">{{$errors->first('prom_name')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Code</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="code" value="{{$promotion->code}}" class="form-control">
                            @if($errors->has("code"))
                                <small class="text-danger">{{$errors->first('code')}}</small>
                            @endif
                        </div>
                    </div>

{{--                    <div class="row form-group">--}}
{{--                        <div class="col col-md-3">--}}
{{--                            <label for="text-input" class=" form-control-label">Số lượng có sẵn</label>--}}
{{--                        </div>--}}
{{--                        <div class="col-12 col-md-9">--}}
{{--                            <input type="text" id="text-input" name="quanlity" value="{{$promotion->quanlity}}" class="form-control">--}}
{{--                            @if($errors->has("quanlity"))--}}
{{--                                <small class="text-danger">{{$errors->first('quanlity')}}</small>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Sản Phẩm áp dụng</label>
                        </div>
                        <div class="col-12 col-md-9">

                            <div class="row form-group">

                                <div class="col-12 col-md-9">
                                    <select class="form-control" name="id_product" >

                                        @foreach($product as  $sp2)
                                            {{ $checked ="" }}

                                                @if ($sp2->id == $promotion->id_product)
                                                    {{$checked = "checked"}}
                                                @endif
                                                    <option class="form-control" {{$checked}} value="{{$sp2}}">{{$sp2->name}}</option>



                                        @endforeach

                                    </select>
                                </div>
                            </div>



                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Launch demo modal
                    </button>

                    <div id ='table_data'>
                        @include('promotion/pagination_data')
                    </div>
                    <!-- Modal -->



{{--                    <div class="">--}}
{{--                        <label><strong>Select Category :</strong></label><br/>--}}
{{--                        <select class="form-control" multiple id="cat" name="cat[]">--}}
{{--                            @foreach($product as  $sp2)--}}
{{--                                --}}
{{--                                    <option class="form-control" {{$checked}} value="{{$sp2}}">{{$sp2->name}}</option>--}}
{{--    --}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}



                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Mô Tả</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea type="text"  name="prom_content" id="ckeditor" class="form-control">
                                {{$promotion->prom_content}}
                            </textarea>
                            @if($errors->has("prom_content"))
                                <small class="text-danger">{{$errors->first('prom_content')}}</small>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Giá KM</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="prom_price" value="{{$promotion->prom_price}}" class="form-control">
                            @if($errors->has("prom_price"))
                                <small class="text-danger">{{$errors->first('prom_price')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Ngày bắt đầu</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="prom_startdate" value="{{$promotion->prom_startdate}}" class="form-control">
                            @if($errors->has("prom_startdate"))
                                <small class="text-danger">{{$errors->first('prom_startdate')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Ngày kêt thúc</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="prom_enddate" value="{{$promotion->prom_enddate}}" class="form-control">
                            <input class="datepicker" data-date-format="mm/dd/yyyy">
                            @if($errors->has("prom_enddate"))
                                <small class="text-danger">{{$errors->first('prom_enddate')}}</small>
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

