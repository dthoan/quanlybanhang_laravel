@extends("layout.layout")
@section("title","Pustok - Checkout")
@section("content")


{{--    and--}}
    <main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
        <div class="container">
            <form action="{{route('checkout')}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-12">
                        <!-- Checkout Form s-->
                        <div class="checkout-form">
                            <div class="row row-40">
                                <div class="col-12">
                                    <h1 class="quick-title">Checkout</h1>
                                    <!-- Slide Down Trigger  -->
                                    <div class="checkout-quick-box">
                                        <p><i class="far fa-sticky-note"></i>Returning customer? <a href="javascript:" class="slide-trigger" data-target="#quick-login">Click
                                                here to login</a></p>
                                    </div>
                                    <!-- Slide Down Blox ==> Login Box  -->
                                    <div class="checkout-slidedown-box" id="quick-login">
                                        <form action="./">
                                            <div class="quick-login-form">
                                                <p>If you have shopped with us before, please enter your details in the
                                                    boxes below. If you are a new
                                                    customer
                                                    please
                                                    proceed to the Billing & Shipping section.</p>
                                                <div class="form-group">
                                                    <label for="quick-user">Username or email *</label>
                                                    <input type="text" placeholder="" id="quick-user">
                                                </div>
                                                <div class="form-group">
                                                    <label for="quick-pass">Password *</label>
                                                    <input type="text" placeholder="" id="quick-pass">
                                                </div>
                                                <div class="form-group">
                                                    <div class="d-flex align-items-center flex-wrap">
                                                        <a href="#" class="btn btn-outlined   mr-3">Login</a>
                                                        <div class="d-inline-flex align-items-center">
                                                            <input type="checkbox" id="accept_terms" class="mb-0 mr-1">
                                                            <label for="accept_terms" class="mb-0">I’ve read and accept
                                                                the terms &amp; conditions</label>
                                                        </div>
                                                    </div>
                                                    <p><a href="javascript:" class="pass-lost mt-3">Lost your
                                                            password?</a></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Slide Down Trigger  -->
                                    <div class="checkout-quick-box">
                                        <p><i class="far fa-sticky-note"></i>Have a coupon? <a href="javascript:" class="slide-trigger" data-target="#quick-cupon">
                                                Click here to enter your code</a></p>
                                    </div>
                                    <!-- Slide Down Blox ==> Cupon Box -->
                                    <div class="checkout-slidedown-box" id="quick-cupon">
                                        <form action="./">
                                            <div class="checkout_coupon">
                                                <input type="text" class="mb-0" placeholder="Coupon Code">
                                                <a href="" class="btn btn-outlined">Apply coupon</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-7 mb--20">
                                    <!--form checkout Billing Address -->

                                    <div id="billing-form" class="mb-40">

                                        <h4 class="checkout-title">Billing Address</h4>
                                        <div class="row">
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Họ Và Tên</label>
                                                <input type="text" name="name" placeholder="First Name">
                                            </div>

                                            <div class="col-12 mb--20">
                                                <label>Email</label>
                                                <input type="text" name="email" placeholder="Nhập Email">
                                            </div>

                                            <div class="col-12 mb--20 ">
                                                <label>Giới Tính</label>
                                                <div class="block-border check-bx-wrapper">
                                                    <div class="check-box">
                                                        <input type="checkbox" name="gender" id="create_account">
                                                        <label for="create_account">Nam</label>
                                                    </div>
                                                    <div class="check-box">
                                                        <input type="checkbox" name="gender" id="shiping_address" data-shipping="">
                                                        <label for="shiping_address">Nữ</label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Số Điện Thoại</label>
                                                <input type="text" name="phone_number" placeholder="Nhập Số Điện Thoại">
                                            </div>
                                            <div class="col-12 mb--20">
                                                <label>Địa Chỉ</label>
                                                <input type="text" name="address" placeholder="Nhập Địa Chỉ">
                                            </div>




                                            <div class="col-12 mb--20 ">
                                                <div class="block-border check-bx-wrapper">
                                                    <div class="check-box">
                                                        <input type="checkbox" id="create_account">
                                                        <label for="create_account">Create an Acount?</label>
                                                    </div>
                                                    <div class="check-box">
                                                        <input type="checkbox" id="shiping_address" data-shipping="">
                                                        <label for="shiping_address">Ship to Different Address</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Shipping Address -->


                                </div>
                                <div class="col-lg-5">
                                    <div class="row">
                                        <!-- Cart Total -->
                                        <div class="col-12">
                                            <div class="checkout-cart-total">
                                                <h2 class="checkout-title">YOUR ORDER</h2>
                                                <h4>Product <span>Total</span></h4>
                                                <ul>
                                                    @if(Session::has('cart'))
                                                        @foreach($product as $sp )
                                                            <li>
                                                            <span class="left">{{$sp['item']['name']}} x {{$sp['qty']}}
                                                            </span>
                                                                <span class="right">{{$sp['price']}}
                                                            </span>
                                                            </li>
                                                        @endforeach
                                                    @endif

                                                </ul>

                                                <h4>Tổng Tiền:
                                                    <span>
                                                  {{number_format(Session('cart')->totalPrice)}}
                                                </span>
                                                </h4>
                                                <div class="method-notice mt--25">
                                                    <article>
                                                        <h3 class="d-none sr-only">blog-article</h3>
                                                        Sorry, it seems that there are no available payment methods for
                                                        your state. Please contact us if you
                                                        require
                                                        assistance
                                                        or wish to make alternate arrangements.
                                                    </article>
                                                </div>
                                                <div class="term-block">
                                                    <input type="checkbox" name="payment_method" id="accept_terms2">
                                                    <label for="accept_terms2"  >Thanh Toán Khi Nhận Hàng</label>
                                                </div>
                                                <button type="submit" class="place-order w-100">Đặt Hàng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </main>

@endsection



