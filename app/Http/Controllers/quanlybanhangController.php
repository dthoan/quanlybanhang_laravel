<?php

namespace App\Http\Controllers;

use App\bill_detail;
use App\Cart;
use App\customer;
use App\products;
use App\type_products;
use App\users;
use Illuminate\Http\Request;
use App\slide;
use App\bills;
use Illuminate\Support\Facades\Auth;

use Session;

use Carbon\Carbon;

class quanlybanhangController extends Controller
{


    public function getIndex(){
        $sl_images      = slide::all();
        $new_product    = products::where("new",1)->get();
        $pro_product    = products::where("promotion_price","!=0",0)->paginate(2);
        $sale_product   = products::where("new",0)->get();
        $botca_product  = products::where("id_type",1)->get();
//        $get_tenloai = type_products::where("id", "=", $type)->get();
        return view("trangchu.index", compact("sl_images","new_product","pro_product","sale_product", "botca_product", "get_tenloai"));
    }
    public function getTypeProduct($type){
        $sp_theoloai    = products::where("id_type","=", $type)->paginate(3);
        $tenloai        = type_products::where("id", "=", $type)->get();
        $sp_khac        = products::where("promotion_price", "!=0", $type)->paginate(3);
        $all_category   = type_products::all();
//        $counts = DB::table("product")->groupby("id_type")->count("id");
        return view("trangchu.type_product", compact("sp_theoloai","tenloai","sp_khac","all_category"));
    }

    public function getProductDetails($id){
        $detail_product = products::where('id', $id)->first();
        $product_name   = products::where("id", "=", $id)->get();
        // sản phẩm tương tự
        $sp_tuongtu     = products::where('id_type',$detail_product->id_type)->paginate(4);
        return view("trangchu.product_details", compact("detail_product", "product_name","sp_tuongtu"));
    }
    public function getBlog(){
        return view("trangchu.blog");
    }
    public function getCheckout(){
        return view("trangchu.checkout");
    }
    public function getCart(){
        return view("trangchu.cart");
    }
    public function getAddtoCart(Request $rq, $id){
        $product = products::find($id);
        $oldCart = Session('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $rq->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getDelItemCart($id){
        $oldCart =  Session('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items)>0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function postCheckout(Request $req){
        $cart = Session::get('cart');

        // add customer
        $cus = new customer;
        $cus->name          = $req->name;
        $cus->gender        = $req->gender;
        $cus->email         = $req->email;
        $cus->address       = $req->address;
        $cus->phone_number  = $req->phone_number;

        $cus->save();

        // add bill
        $bill = new bills;
        $bill->id_customer  = $cus->id;
        $bill->time_order   = date('Y-m-d');
        $bill->total        =$cart->totalPrice;
        $bill->payment      = $req->payment_method;
//        $bill->note = $req->note;
        $bill->save();

        foreach ($cart->items as $keys=>$value){
            $db = new bill_detail;
            $db->id_bill    = $bill->id;
            $db->id_product = $keys;
            $db->quanlity   = $value["qty"];
            $db->unit_price = $value["price"] / $value["qty"];
            $db->save();
        }
        Session::forget('cart');
        return view('trangchu.thongbao');
    }
// admin


    public function getRegister(){
        return view("admin.registration");
    }
    public function postRegister(Request $rq){
        $rq->validate(
            [
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:6|max:20',
            'Repassword'    => 'required|same:password',
            'name'          =>  'required',
            'phone_number'  =>  'required',
            'address'       =>  'required'

        ],
        [
            'email.required'        => 'Vui lòng nhập email!',
            'email.email'           => 'Địa chỉ thư không đúng định dạng!',
            'email.unique'          => 'Email này đã được đăng ký!',
            'password.required'     => 'Chưa nhập mật khẩu',
            'password.min'          => 'Password ít nhất 6 ký tự',
            'password.max'          => 'Password tối đa 20 tự',
            'Repassword.same'       => 'Password không đúng!',
            'Repassword.required'   => 'Chưa nhập lại password!',
            'name.required'         => 'Chưa Nhập tên đăng nhập!',
            'phone_number.required' => 'Chưa Nhập số điện thoại!',
            'address.required'      => 'Chưa Nhập địa chỉ!',
        ]);
        // add user
        $user = new users;
        $user->full_name    = $rq->name;
        $user->email        = $rq->email;
        $user->password     = \Hash::make($rq->password);
        $user->phone        = $rq->phone_number;
        $user->address      = $rq->address;
        $user->save();
        return redirect()->back()->with("thongbao","Đăng ký thành công! Hãy đăng nhập để tiếp tục sử dụng");
    }

    public function getLogin(){
        return view("admin.login");
    }

    public function postLogin(Request $rq)
    {
        $rq->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20'
            ],
            [
                'email.required' => 'Vui lòng nhập email!',
                'email.email' => 'Địa chỉ thư không đúng định dạng!',
                'password.required' => 'Chưa nhập mật khẩu',
                'password.min' => 'Password ít nhất 6 ký tự',
                'password.max' => 'Password tối đa 20 tự',
            ]
        );

        $arrLogin = array(
            'email' => $rq->email,
            'password' => $rq->password
        );
        $role = users::where("email",$rq->email)->select("role")->get();

//        $get_tenloai = type_products::where("id", "=", $type)->get();

        if (Auth::attempt($arrLogin)) {
            // nếu là 1 thì retunt trang chủ
            if ($role=='1') {
                $sl_images = slide::all();
                $new_product = products::where("new", 1)->get();
                $pro_product = products::where("promotion_price", "!=0", 0)->paginate(2);
                $sale_product = products::where("new", 0)->get();
                $botca_product = products::where("id_type", 1)->get();
                return view("trangchu.index", compact("sl_images", "new_product", "pro_product", "sale_product", "botca_product", "get_tenloai"));
            }
           else
            {
                return view("admin.index");
            }
        }

        else
        {
            return redirect()->back()->with([
                'matb'=>'0',
                'thongbao'=>'Đăng Nhập Thất Bại!'
            ]);
        }
    }

    // đăng xuất
    public function getLogout(){
        Auth::logout();
        return redirect()->route('trangchu');
    }
    // tìm kiếm trang chủ
    public function getResearch(Request $rq ){
        if($rq->key=="khuyen mai"){
            $product = products::where("promotion_price",">",0)->paginate(8);
        }
        else if($rq->key=="khong khuyen mai")
            $product = products::where("promotion_price",0)->paginate(8);
        else
            $product = products::where("name", "like", "%", $rq->key)
                                ->orwhere("unit_price", $rq->key)
                                ->orwhere("promotion_price", $rq->key)
                                ->paginate(8);
        return view("trangchu.search", compact("product"));
    }
    // trang quản trị
    public function getAdminIndex(){
        return view('admin.index');
    }

    public function getAllProduct(){
        $ListProduct = products::all();

        return view('product.list_product',compact('ListProduct'));
    }

    public function getDeleteProduct($id){
        $delProduct = products::find($id);
        $delProduct->delete();

        return redirect('http://localhost:81/public/admin/list-product')->with('thongbao', 'Xóa thành công');
    }

    public function getaddUpdadeProduct()
    {
        return view('product.add_update');
    }
    public function PostaddUpdadeProduct(Request $rq ){

        $rq->validate([
                'name'=> 'required',
                'id_type'=> 'required',
                'unit_price'=> 'required',
                'promotion_price'=> 'required'
        ],
        $messges = [
            'name.required' => 'Vui lòng nhập tên sản phẩm!',
            'id_type.required' => 'Vui lòng nhập loại sản phẩm!',
            'unit_price.required' => 'Vui lòng nhập giá gốc!',
            'promotion_price.required' => 'Vui lòng nhập giá khuyến mãi!',
        ]
        );

        // add user
        $data = new products;
        $data->name            = $rq->name;
        $data->id_type         = (int)$rq->id_type;
        $data->description     = $rq->description;
        $data->unit_price      = (double)$rq->unit_price;
        $data->promotion_price = (double)$rq->promotion_price;
        $data->new             = $rq->new;
        $data->image           = $rq->image;
        $data->images          = $rq->images;

        $data->save();

        return redirect()->back()->with("thongbao","Thêm thành công!");

    }
    /// order
    public function getListOrder(){
        $data=[];
        $data['item'] = bill_detail::all();

        return view('order.list_order',$data);
    }

    public function getaddOrder(){
        return view('order.add_updata');
    }

    public function getUpdateOrder($id){
        $theloai = type_products::find($id);
        return view('order.add_update',compact('theloai'));
    }
    public function postUpdateOrder(Request $rq, $id){
        $data = type_products::find($id);
        $rq->validate([
            'id_bill' => 'required',
            'id_product' => 'required',
            'quanlity' => 'required',
            'unit_price' => 'required',
            'create_at' => 'required',
            'update_at' => 'required',

        ],
        [
            'id_bill.required' => 'Vui lòng nhập mã đơn hàng!',
            'id_product.required' => 'Vui lòng nhập sản phẩm!',
            'quanlity.required' => 'Vui lòng nhập số lượng sản phẩm!',
            'unit_price.required' => 'Vui lòng nhập tổng tiền!',
            'create_at.required' => 'Vui lòng nhập thời gian tạo đơn hàng!',
            'update_at.required' => 'Vui lòng nhập thời gian sửa đơn hàng!',
        ]
        );
        $data->id_bill = $rq->id_bill;
        $data->id_product = $rq->id_product;
        $data->quanlity = $rq->quanlity;
        $data->unit_price = $rq->unit_price;
        $data->create_at = $rq->create_at;
        $data->update_at = $rq->update_at;
        $data->save();

        return redirect('order.add_update', $id)->with('thongbao','Sửa Đơn hàng thành công!');
    }

    public function getDeleteOrder($id){
        $data = type_products::find($id);
        $data->delete();

        return redirect('order.list-order')->with('thongbao', 'Xóa thành công');
    }

}
