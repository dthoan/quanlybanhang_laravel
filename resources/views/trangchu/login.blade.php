@extends("layout.layout")
@section("content")
@section("title","Đăng nhập")
<main class="page-section inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="{{route('trangchuLogin')}}" method="post">
                    {{csrf_field()}}
                    @if(Session::has('matb'))
                        @if(Session::get('matb')=='1')
                            <label class="alert">{{Session::get('thongbao')}}</label>
                        @else
                            <label class="alert">{{Session::get('thongbao')}}</label>
                        @endif
                    @endif
                    <div class="login-form">
                        <h4 class="login-title">Đăng nhập</h4>

                        <div class="row">
                            <div class="col-md-12 col-12 mb--15">
                                <label for="email">Nhập email</label>
                                <input class="mb-0 form-control" name="email" type="email" id="email1" placeholder="Nhập email của bạn ở đây....">
                                @if($errors->has("email"))
                                    <label class="text-danger">{{$errors->first('email')}}</label>
                                @endif
                            </div>
                            <div class="col-12 mb--20">
                                <label for="password">Mật khẩu</label>
                                <input name="password" class="mb-0 form-control" type="password" id="login-password" placeholder="Nhập mật khẩu">
                                @if($errors->has("password"))
                                    <label class="text-danger">{{$errors->first('password')}}</label>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <button  type="submit" class="btn btn-outlined">Đăng nhập</button>
                            </div>
                        </div>
                    </div>

                </form>
                <div class="register-link">
                    <p>
                        Bạn có tài khoản không?
                        <a href="{{route('trangchuRegister')}}" style="color: blue">Đăng Ký</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
