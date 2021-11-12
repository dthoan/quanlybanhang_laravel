@extends("layout.layout")
@section("title","Pustok - Checkout")
@section("content")


<section class="breadcrumb-section">
        <h2 class="sr-only"></h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item active"><a href="">Đặt hàng</a></li>

                    </ol>
                </nav>
            </div>
        </div>
    </section>
<!-- welcome -->
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
                                   
                                   
                                    <div class="checkout-slidedown-box" id="quick-login">
                                            <div class="quick-login-form">
                                                <p>BẠN ĐÃ ĐẶT HÀNG THÀNH CÔNG</p>
                                                <div class="form-group">
                                                    <label for="quick-user">Username or email *</label>
                                                    <input type="text" placeholder=""  id="quick-user">
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
                                    </div>
                                   
                                    <div class="checkout-slidedown-box" id="quick-cupon">
                                            <div class="checkout_coupon">
                                                <input type="text" class="mb-0" placeholder="Coupon Code">
                                                <a href="" class="btn btn-outlined">Apply coupon</a>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 mb--20">
                                    <!--form checkout Billing Address -->

                                    <div id="billing-form" class="mb-40">

                                        <h4 class="checkout-title">NHẬP THÔNG TIN ĐỂ ĐẶT HÀNG</h4>
                                        <div class="row"> 
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Họ Và Tên</label>
                                                <input type="text" name="name"  placeholder="First Name" value="{{$user_order->full_name}}"/>
                                                @if($errors->has("name"))
                                                <small class="text-danger">{{$errors->first('name')}}</small>
                                                @endif
                                            </div>
                                         

                                            <div class="col-12 mb--20">
                                                <label>Email</label>
                                                <input type="text" name="email"  placeholder="Nhập Email" value="{{$user_order->email}}"/>
                                                @if($errors->has("email"))
                                                    <small class="text-danger">{{$errors->first('email')}}</small>
                                                 @endif
                                            </div>
                                           

                                           


   
                                            
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Số Điện Thoại</label>
                                                <input type="text" name="phone_number"  placeholder="Nhập Số Điện Thoại" value="{{$user_order->phone}}"/>
                                                @if($errors->has("phone_number"))
                                                    <small class="text-danger">{{$errors->first('phone_number')}}</small>
                                                @endif
                                            </div>
                                          
                                            <div class="col-12 mb--20">
                                                <label>Địa Chỉ</label>
                                                <input type="text" name="address"  placeholder="Nhập Địa Chỉ" value="{{$user_order->address}}"/>
                                                @if($errors->has("address"))
                                                    <small class="text-danger">{{$errors->first('address')}}</small>
                                                @endif
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
                                               
                                                <h4>Product <span>Total</span></h4>

                                                @if(!empty($productBill))
                                                @if(empty($productBill['product']))
                                                <h1>Khong co du lieu</h1>
                                                @endif
                                                <ul>
                                                        @foreach($productBill['product'] as $sp )
                                                            <li>
                                                                <input type="hidden" name="productId[]" value="{{$sp->id}}">
                                                                <input type="hidden" name="productQuantity[]" value="{{$sp->quatity}}">
                                                                <input type="hidden" name="productPrice[]" value="{{$sp->price}}">
                                                            <span class="left">{{$sp->name}} x {{$sp->quatity}}
                                                            </span>
                                                                <span class="right">{{number_format($sp->price * $sp->quatity)}}
                                                            </span>
                                                            </li>
                                                        @endforeach
                                                </ul>

                                                <h4>Tổng Tiền:
                                                    <span name="totalprice" >

                                                        {{number_format($productBill['totalprice'])}}

                                                </span>
                                                </h4>
                                                @endif

                                                @if(empty($productBill))
                                                @if(empty($product))
                                                <p>Không có sản phẩm!</p>
                                                @endif
                                                <ul>
                                                        @foreach($product as $sp )
                                                            <li>
                                                                <input type="hidden" name="productId[]" value="{{$sp->id}}">
                                                                <input type="hidden" name="productQuantity[]" value="{{$sp->quatity}}">
                                                                <input type="hidden" name="productPrice[]" value="{{$sp->price}}">
                                                            <span class="left" >{{$sp->name}} x {{$sp->quatity}}
                                                            </span>
                                                            <span class="right">{{number_format($sp->price * $sp->quatity)}}
                                                            </span>
                                                            </li>
                                                        @endforeach
                                                   

                                                </ul>

                                                <h4>Tổng Tiền:
                                                    <span name="totalprice" >

                                                        {{number_format($totalprice)}}

                                                </span>
                                                </h4>
                                                @endif

                                                <div class="method-notice mt--25">

                                                </div>
                                                <div class="term-block">
                                                    <input type="checkbox" name="payment_method" id="accept_terms2">
                                                    <label for="accept_terms2"  >Thanh Toán Khi Nhận Hàng</label>
                                                   
                                                </div>
                                                @if($errors->has("payment_method"))
                                                        <p class="text-danger">{{$errors->first('payment_method')}}</p>
                                                    @endif
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



