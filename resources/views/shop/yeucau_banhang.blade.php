@extends("layout.layout")
@section("content")
@section("title","Pustok - Book Store")
<div class="container">

    <div class="col-lg-12">
        <div class="row">
            <!-- Cart Total -->
            <div class="col-12">
                <div class="checkout-cart-total">
                    <h2 class="checkout-title">Đăng ký bán hàng trên ShopBeauty</h2>



                    <form method="post" action="{{route('q_active')}}">
                    {{csrf_field()}}
                        <div class="term-block">
                            <input type="checkbox" id="accept_terms2" name="active">
                            <label for="accept_terms2">Đăng ký bán hàng trên ShopBeauty</label>
                        </div>
                        <button class="place-order w-100" type="submit">Đăng ký bán hàng</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <br />>
    <h3 style="text-align: center;">
        <b>QUY ĐỊNH VỀ ĐĂNG BÁN SẢN PHẨM TRÊN SHOPEE</b>
    </h3>
    <br />>
    <div class="row">
        <div>
            <p>
                A. Quy định chung:

                1. Các nội dung không được phép đăng bán:

                Người dùng được quyền đăng các sản phẩm lên Shopee nhằm mục đích kinh doanh. Tuy nhiên, NGHIÊM CẤM người dùng đăng tải những sản phẩm có nội dung sau đây:

                + Phản động, chống phá, bài xích tôn giáo, khiêu dâm, bạo lực, đi ngược lại thuần phong mỹ tục, truyền thống và văn hóa Việt Nam;

                + Đăng thông tin rác, phá rối hay làm mất uy tín của các dịch vụ do Shopee cung cấp;

                + Xúc phạm, khích bác đến người khác dưới bất kỳ hình thức nào;

                + Tuyên truyền về những thông tin mà pháp luật nghiêm cấm như: sử dụng heroin, thuốc lắc, giết người, cướp của,vv (VD: sản phẩm in hình lá cần sa, shisha);

                + Khuyến khích, quảng cáo cho việc sử dụng các sản phẩm độc hại (VD: thuốc lá, rượu, cần sa);

                + Các sản phẩm văn hóa đồi trụy (băng đĩa, sách báo, vật phẩm);

                + Tài liệu bí mật quốc gia;

                + Con người và/hoặc các bộ phận của cơ thể con người;

                + Những sản phẩm có tính chất phân biệt chủng tộc, xúc phạm đến dân tộc hoặc quốc gia nào đó;

                + Hạn chế tối đa những sản phẩm mang tính cá nhân (như hình cá nhân, hình ảnh của gia đình, hình ảnh của con cái);

                + Vi phạm quyền sở hữu trí tuệ và/hoặc bất kỳ nhãn hiệu hàng hóa nào của bất kỳ bên thứ ba nào;

                + Các sản phẩm nằm trong Danh sách sản phẩm bị cấm/hạn chế của Shopee.

                2. Các hành vi không được thực hiện

                + Quảng cáo cho các doanh nghiệp khác. Ví dụ như sản phẩm có chứa hình ảnh, logo, địa chỉ, hotline, đường link của doanh nghiệp hoặc website mua bán khác;

                + Đăng bán một sản phẩm lặp đi lặp lại (spam) trên cùng một danh mục hoặc các danh mục khác nhau.

                + Thay đổi nội dung tin đăng để gian lận đánh giá
            </p>
        </div>

    </div>

</div>
@endsection