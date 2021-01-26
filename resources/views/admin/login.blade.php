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
                            <form action="{{route('login')}}" method="post" >
                                {{csrf_field()}}

                             @if(Session::has('matb'))
                                @if(Session::get('matb')=='1')
                                    <label class="alert">{{Session::get('thongbao')}}</label>
                                @else
                                    <label class="alert">{{Session::get('thongbao')}}</label>
                                @endif
                             @endif

                                <div class="form-group">
                                    <label>Email </label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Nhập Email">  @if($errors->has("email"))
                                        <label class="text-danger">{{$errors->first('email')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Mật Khẩu</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Nhập Password">
                                    @if($errors->has("password"))
                                        <label class="text-danger">{{$errors->first('password')}}</label>
                                    @endif
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Nhớ Mật Khẩu
                                    </label>
                                    <label>
                                        <a href="#">Lấy Lại Mật Khẩu</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Đăng Nhập</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">Đăng nhập với facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">Đăng nhập với twitter</button>
                                    </div>
                                </div>
                            </form>


                            <div class="register-link">
                                <p>
                                Bạn có tài khoản không?
                                    <a href="{{route('register')}}">Đăng Ký</a>
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
