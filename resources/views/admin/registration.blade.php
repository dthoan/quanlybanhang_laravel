@extends("admin.layout_login")
@section("content")
    <body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="admin/images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{route('register')}}" method="post">
                                {{csrf_field()}}
                                <div class="center">
                                    @if(Session::has("thongbao"))
                                        <div class="alert alert-success">
                                            {{Session::get("thongbao")}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Tên Đăng Nhập</label>
                                    <input class="au-input au-input--full" type="text" name="name" placeholder="Nhập Tên Đăng Nhập">
                                    @if($errors->has("name"))
                                        <label class="text-danger">{{$errors->first('name')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Nhập Email">
                                    @if($errors->has("email"))
                                        <label class="text-danger">{{$errors->first('email')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Địa Chỉ</label>
                                    <input class="au-input au-input--full" type="text" name="address" placeholder="Nhập Địa Chỉ">
                                    @if($errors->has("address"))
                                        <label class="text-danger">{{$errors->first('address')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Số Điện Thoại</label>
                                    <input class="au-input au-input--full" type="text" name="phone_number" placeholder="Số Điện Thoại">
                                    @if($errors->has("phone_number"))
                                        <label class="text-danger">{{$errors->first('phone_number')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Mật Khẩu</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Nhập Mật Khẩu">
                                    @if($errors->has("password"))
                                        <label class="text-danger">{{$errors->first('password')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Nhập Lại Mật Khẩu</label>
                                    <input class="au-input au-input--full" type="password" name="Repassword" placeholder="Nhập Lại Mật Khẩu">
                                    @if($errors->has("Repassword"))
                                        <label class="text-danger">{{$errors->first('Repassword')}}</label>
                                    @endif
                                </div>

                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Đồng ý với những điều khoản
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Đăng Ký</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">Đăng ký với facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">Đăng ký với twitter</button>
                                    </div>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="{{route('login')}}">Đăng Nhập</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    </body>
@endsection
