@extends("admin.layout_admin")
@section("title","Add Customer")
@section("content")
    <div class="col-lg-12 m-t-100">
        <div class="card">
            <div class="card-header">
                <strong>Thêm</strong> Khách Hàng
            </div>
            <form method="POST" action="{{route('add_customer')}}" >
                {{csrf_field()}}
                <div class="center">
                    @if(Session::has("thongbao"))
                        <div class="alert alert-success">
                            {{Session::get("thongbao")}}
                        </div>
                    @endif
                </div>
                <div class="form-group row p-5">
                    <div class="col-lg-12" name="image">
                        <input class="col-lg-8" type='file'  onchange="readURL(this);" style="padding:10px; background:#2d2d2d;"/>
                        <img class="col-lg-4 text-center" name="image" id="blah" src="images/khachHang/image.jpeg" alt="your image" style=" max-width:180px;"/>
                    </div>

                    <div class="col-lg-8">
                        <label for="ex3">Tên Khách Hàng</label>
                        <input class="form-control" id="ex3" type="text" name="name">
                    </div>

                    <div class="col-lg-8">
                        <label for="ex3">Giới Tính</label>
                        <input class="form-control" id="ex3" type="text" name="gender">
                    </div>

                    <div class="col-lg-8">
                        <label for="ex3">Email</label>
                        <input class="form-control" id="ex3" type="text" name="email">
                    </div>

                    <div class="col-lg-8">
                        <label for="ex3">Số Điện Thoại</label>
                        <input class="form-control" id="ex3" type="text" name="phone_number">
                    </div>

                    <div class="col-lg-8">
                        <label for="ex3">Địa Chỉ</label>
                        <input class="form-control" id="ex3" type="text" name="address">
                    </div>
                    <div class="col-lg-12 pt-3">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </div>
            </form>



        </div>

    </div>


@endsection

