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
                                <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
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
<form action="{{route('loginfb')}}" id="formFb" method="get">
  <input type="hidden" name="fbid" id="fbid" />
  <input type="hidden" name="name" id="loginfbname" />
</form>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

<script>
function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
    console.log('statusChangeCallback');
    console.log(response);           
    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
      testAPI(); 
          // The current login status of the person.

    } else {      
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this webpage.';
    }
  }


  function checkLoginState() {               // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function(response) {   // See the onlogin handler
      statusChangeCallback(response);
    });
  }


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1220049291812881',
      cookie     : true,                     // Enable cookies to allow the server to access the session.
      xfbml      : true,                     // Parse social plugins on this webpage.
      version    : 'v12.0'           // Use this Graph API version for this call.
    });


    FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
      statusChangeCallback(response);        // Returns the login status.
    });
  };
 
  function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      $("#loginfbname").val(response.name)
      $("#fbid").val(response.id)
      $('#formFb').submit();

    });
  }

</script>
@endsection
