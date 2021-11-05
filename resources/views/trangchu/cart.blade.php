@extends("layout.layout")
@section("title","Pustok - Cart")
@section("content")

    <main class="cart-page-main-block inner-page-sec-padding-bottom">
        <div class="cart_area cart-area-padding  ">
            <div class="container">
                <div class="page-section-title">
                    <h1>Shopping Cart</h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('checkout')}}" method="get">
                            <!-- Cart Table -->
                            <div class="cart-table table-responsive mb--40">
                                <table class="table">
                                    <!-- Head Row -->
                                    <thead>
                                    <tr>
                                        <th class="pro-remove"></th>
                                        <th class="pro-thumbnail">Hình ảnh</th>
                                        <th class="pro-title">Sản phẩm</th>
                                        <th class="pro-price">Đơn giá</th>
                                        <th class="pro-quantity">Số lượng</th>
                                        <th class="pro-subtotal">Tổng tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- Product Row -->
                                    @if(isset(Auth::user()->id))

                                            @foreach($product as $sp )
                                                <tr>


                                                    <td class="pro-remove">
                                                        <input class="check-box" value="{{$sp->id}}" checked data-total="{{$sp->quatity*$sp->price}}" type="checkbox" name="checkBox[]" >
                                                      

                                                    </td>
                                                    <td class="pro-thumbnail"><a href="#"><img src="..\storage\app\public\{{$sp->image}}" alt="Product"></a></td>
                                                    <td class="pro-title"><a href="#">{{$sp->name}}</a></td>
                                                    <td class="pro-price" value="Norway"><span>{{number_format($sp->price)}}</span></td>
                                                    <td class="pro-quantity">
                                                        <div class="pro-qty">
                                                            <div class="count-input-block" >

                                                                <button><a href="{{route('reduceItem',$sp->id )}}"  class="fas fa-minus" ></a></button>
                                                                <label type="number" class="form-control" readonly value="" >{{$sp->quatity}}</label>
                                                                <button><a href="{{route('themgiohang',$sp->id )}}" class="fas fa-plus"></a></button>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="pro-subtotal"><span> {{number_format($sp->quatity*$sp->price)}}</span></td>

                                                </tr>
                                            @endforeach


                                    @else
                                        @if(Session::has('cart'))
                                            @foreach($product as $sp )
                                                <tr>


                                                    <td class="pro-remove"><a href="#"><i class="far fa-trash-alt"></i></a>
                                                    </td>
                                                    <td class="pro-thumbnail"><a href="#"><img src="images\products\{{$sp['item']['image']}}" alt="Product"></a></td>
                                                    <td class="pro-title"><a href="#">{{$sp['item']['name']}}</a></td>
                                                    <td class="pro-price" value="Norway"><span>{{number_format($sp['price'])}}</span></td>
                                                    <td class="pro-quantity">
                                                        <div class="pro-qty">
                                                            <div class="count-input-block">
                                                                <button><a href="{{route('delItem',$sp['item']['id'] )}}"  class="fas fa-times" ></a></button>
                                                                <label type="number" class="form-control" readonly value="">{{$sp['qty']}}</label>
                                                                <button><a href="{{route('themgiohang',$sp['item']['id'] )}}" class="fas fa-plus"></a></button>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="pro-subtotal"><span> {{number_format($sp['qty']*$sp['price'])}}</span></td>

                                                </tr>
                                            @endforeach
                                        @endif

                                    @endif
                                    <!-- Product Row -->

                                    <!-- Discount Row  -->

                                    </tbody>
                                </table>
                            </div>
                            <div class="cart-section-2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mb--30 mb-lg--0">
                                            <!-- slide Block 5 / Normal Slider -->

                                        </div>
                                        <!-- Cart Summary -->
                                        <div class="col-lg-6 col-12 d-flex">
                                            <div class="cart-summary">
                                                <div class="cart-summary-wrap">

                                                    <h2>Tổng Tiền <span id="total-price" class="text-primary"> {{number_format($totalprice)}} VND</span></h2>
                                                </div>
                                                <div class="cart-summary-button">
                                                    {{--                                <a href="{{route('checkout')}}" class="ckckout-btn c-btn btn--primary">Đặt Hàng</a>--}}
                                                    <button type="submit" class="place-order w-100">Đặt Hàng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>



<script>
    $(".check-box").change(function(){
        updateTotal();
    })
    function updateTotal(){
        let total = 0 ;
        $('.check-box').each(function(){
            if(this.checked){
                let price = $(this).data('total');
                total = parseInt(total) + parseInt(price) 
            }  
        })
        $("#total-price").html(addPeriod(total) + " VND")
    }
    function addPeriod(nStr)
    {
        nStr += '';
        x = nStr.split(',');
        x1 = x[0];
        x2 = x.length > 1 ? ',' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
</script>


@endsection

