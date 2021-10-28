@extends("layout.layout")
@section("content")
@section("title","Đăng ký")
<main class="page-section inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
                <!-- Login Form s-->
                <form action="{{route('trangchuRegister')}}" method="post">
                    {{csrf_field()}}
                    <div class="center">
                        @if(Session::has("thongbao"))
                            <div class="alert alert-success">
                                {{Session::get("thongbao")}}
                            </div>
                        @endif
                    <div class="login-form">
                        <h4 class="login-title">Đăng ký tài khoản</h4>

                        <div class="row">
                            <div class="col-md-12 col-12 mb--15">
                                <label for="email">Họ và tên</label>
                                <input class="mb-0 form-control" type="text" id="name" name = "full_name" placeholder="Nhập họ và tên">
                                @if($errors->has("name"))
                                    <label class="text-danger">{{$errors->first('name')}}</label>
                                @endif
                            </div>
                            <div class="col-12 mb--20">
                                <label for="email">Email</label>
                                <input class="mb-0 form-control" name="email" type="email" id="email" placeholder="Nhập Email">
                                @if($errors->has("email"))
                                    <label class="text-danger">{{$errors->first('email')}}</label>
                                @endif
                            </div>
                            <div class="col-lg-6 mb--20">
                                <label for="password">Mật khẩu</label>
                                <input class="mb-0 form-control" type="password" name="password" id="password" placeholder="Enter your password">
                                @if($errors->has("password"))
                                    <label class="text-danger">{{$errors->first('password')}}</label>
                                @endif
                            </div>
                            <div class="col-lg-6 mb--20">
                                <label for="password">Nhập lại mật khẩu</label>
                                <input class="mb-0 form-control" type="password" name="Repassword" id="repeat-password" placeholder="Nhập lại mật khẩu">
                                @if($errors->has("Repassword"))
                                    <label class="text-danger">{{$errors->first('Repassword')}}</label>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-outlined">Đăng ký</button>
                            </div>
                        </div>
                    </div>
                </form>

        </div>
    </div>
</main>
@endsection

