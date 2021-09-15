<?php

namespace App\Http\Controllers;


use App\bill_detail;
use App\Cart;
use App\comment;
use App\posts;
use App\customer;
use App\blogs;
use App\theme;
use App\products;
use App\type_products;
use App\users;
use Illuminate\Http\Request;
use App\slide;
use App\bills;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use mysql_xdevapi\Exception;
use Session;
use DB;


use Illuminate\Support\Facades\Redirect;


use Carbon\Carbon;
use function Sodium\compare;

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
        // Lấy ra sản phẩm có id tương ứng vd id=5
        $detail_product = products::where('id', $id)->first();
        // lấy ra tên loại sản phẩm {{$product_name[0]->name}}
        $product_name   = products::where("id", "=", $id)->get();
        // hiện bình luận
        $show_comment= posts::where("id_product", "=", $id)->get();


        $data['noidung'] = DB::table('type_products')->join('products', function ($join) {
            $join->on('type_products.id', '=', 'products.id_type');
        })->select(
            'type_products.name'
        )->first($id);

        $ten_chude = DB::table('products')
            ->join('type_products', function ($join) {
            $join->on('products.id_type', '=', 'type_products.id');

        })->select(
            'type_products.name'


        )->first($id);
// lấy tên của người comment



        // sản phẩm tương tự
        $sp_tuongtu     = products::where('id_type',$detail_product->id_type)->paginate(4);



        return view("trangchu.product_details", compact('show_comment',"detail_product", "product_name","sp_tuongtu",'ten_hang','ten_chude','ten_post','post'));
    }
    // thêm bình luận
    public function postCommentProduct(Request $rq, posts $p,$id)
    {

//        $idTinTuc = $id;
//        $post = post::find($id);
//        $post = new post();
//        $p->id_post = $idTinTuc;
//        $post->id_user = Auth::users()->id;

//        $product= posts::where("id_product", "=", $id_product)->get();



        $p->id_product = $rq->productId;
//        $p->title_post = $rq->title_post;
        $p->body_post = $rq->body_post;
        $p->created_at      = Carbon::now();
        $p->updated_at      = Carbon::now();
        $p->deleted_at      = Carbon::now();
//        $post->title_post = $rp->title_post;

        $p->save();

        return redirect()->back()->with('thongbao','Bình luận thành công');

    }

    public function getBlog(){
        $blog_all = blogs::all();
        $theme_all = theme::all();

        return view("trangchu.blog",compact('blog_all','theme_all'));
    }

    public function getBlogDetail($id){
        $blog_detail = blogs::where('id_blog', $id)->first();
        // lấy ra tên loại chủ để, bloer
        $theme_name   = blogs::where("id_blog", "=", $id)->get();
        // blog comment id_product được trùng với id_blog tại 1 bình luận k thể có trong 2 bài
        $show_comment_blog= posts::where("id_blog", "=", $id)->get();

        return view('trangchu.blog_details',compact('blog_detail','theme_name','bloger','ten_chude','show_comment_blog'));
    }

    // tạo comment trên blog
    public function postCommentBlog(posts $p,Request $rq,$id)
    {
// lấy id blog trùng cới id post
        $idBlog = DB::table('blogs')->join('posts', function ($join) {
            $join->on('blogs.id_blog', '=', 'posts.id_blog');
        })->select(
            'posts.id_blog'
        )->first($id);

        if(is_null($rq->id_blog))
        {
             $p->id_blog = $rq->id_blog =$idBlog->id_blog;
        }


        $p->body_post = $rq->body_post;
        $p->created_at      = Carbon::now();
        $p->updated_at      = Carbon::now();
        $p->deleted_at      = Carbon::now();

        $p->save();
        return redirect()->back();


    }




    public function getAbout(){
        return view("trangchu.about");
    }

    public function getContact(){
        return view("trangchu.contact");
    }

    public function getCheckout(){
        return view("trangchu.checkout");
    }
    public function getCart(){
        $product = products::All();
        return view("trangchu.cart", compact('product'));
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
    public function getResearchBlog(Request $rq ){
        if($rq->key=="Da mun"){
            $product = products::where("name", "like", "%", $rq->key)->get();
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
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }

        $ListProduct = products::orderBy('id', 'DESC')->where('id_user',Auth::user()->id)->paginate(5);
        $category = type_products::all();
        return view('product.list_product',compact('ListProduct','category'));
    }

    public function getDeleteProduct($id){
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
        $delProduct = products::find($id);
        $delProduct->delete();

        return redirect('http://localhost:81/public/admin/list-product')->with('thongbao', 'Xóa thành công');
    }

    public function getAddProduct()
    {
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }



        $category = type_products::all();
        $product = new products;
        $category_edit = null;
        $isEdit = false;
        $product->id = null;
        $product->name = null;
        $product->id_type = null;
        $product->description = null;
        $product->unit_price = null;
        $product->promotion_price = null;
        $product->new = null;
        $product->image = null;
        $product->images = null;
        $product->status = null;

        return view('product.edit_product',compact('category','product','category_edit','isEdit'));

//        return view('product.add_product', compact('category, product'));

    }

//    public function postAddProduct(Request $rq, products $product){
//
//
////        $rq->validate([
////
////                'id_type'       => 'required',
////                'unit_price'    => 'required',
////                'promotion_price'=> 'required',
////                'new'            => 'required',
////                'new'            => 'required|iamge',
////
////        ],
////        $messges = [
////            'name.required' => 'Vui lòng nhập tên sản phẩm!',
////            'id_type.required' => 'Vui lòng nhập loại sản phẩm!',
////            'unit_price.required' => 'Vui lòng nhập giá gốc!',
////            'promotion_price.required' => 'Vui lòng nhập giá khuyến mãi!',
////        ]
////        );
//
//        if(is_null($rq->file('image')) == false)
//        {
//            $imagePath1 = $rq->file('image')->store('uploals','public');
//            $product->image         = $imagePath1;
//        }
//        if(is_null($rq->file('images')) == false)
//        {
//            $imagePath2 = $rq->file('images')->store('uploals','public');
//            $product->images          = $imagePath2;
//            $product->images          = $imagePath2;
//        }
//
//        $product->name            = $rq->name;
//        $product->id_type         = (int)$rq->id_type;
//        $product->description     = $rq->description;
//        $product->unit_price      = (double)$rq->unit_price;
//        $product->promotion_price = (double)$rq->promotion_price;
//        $product->new             = $rq->new;
//        $product->status             = $rq->status;
//        $product->alias             = $rq->alias;
//        $product->created_at      = Carbon::now();
//        $product->updated_at      = Carbon::now();
//
//        $product->save();
//
//
//
//       return redirect('admin/list-product')->with("thongbao","Thêm thành công!");
//
//    }

    public function getEditProduct($id){
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
        $category = type_products::all();

        $category_edit = type_products::find($id);
        $product = products::find($id);
        $isEdit = true;
        return view('product.edit_product',compact('category','product','category_edit','isEdit'));
    }

    public function postEditProduct(Request $rq){

        $rq->validate([
            'name'          => 'required',
            'id_type'       => 'required',
            'unit_price'    => 'required',
            'promotion_price'=> 'required',
            'new'            => 'required',


        ],
            $messges = [
                'name.required' => 'Vui lòng nhập tên sản phẩm!',
                'id_type.required' => 'Vui lòng nhập loại sản phẩm!',
                'unit_price.required' => 'Vui lòng nhập giá gốc!',
                'promotion_price.required' => 'Vui lòng nhập giá khuyến mãi!',
            ]
        );

        $product = products::find($rq->productId);
        $isEdit = true;
        if(is_null($product)){
            //create
            $isEdit = false;
            $product = new products();
        }


        if(!is_null($rq->file('image')))
        {
            $imagePath1 = $rq->file('image')->store('uploals','public');
            $product->image         = $imagePath1;
        }
        if(!is_null($rq->file('images')))
        {
            $imagePath2 = $rq->file('images')->store('uploals','public');
            $product->images          = $imagePath2;
        }

        if(!is_null($rq->id_type))
        {
            $product->id_type         = (int)$rq->id_type;
        }

        $product->name            = $rq->name;
        $product->id_type         = (int)$rq->id_type;
        $product->description     = $rq->description;
        $product->unit_price      = (double)$rq->unit_price;
        $product->promotion_price = (double)$rq->promotion_price;
        $product->new             = $rq->new;
        $product->status             = $rq->status;
        $product->id_user              =$rq->user_id;
        $product->alias             = $rq->alias;
        $product->updated_at      = Carbon::now();

        if($isEdit){
            //Edit
            $product->update();
        }else{
            //Create
            $product->created_at      = Carbon::now();
            $product->save();
        }

        return redirect('admin/list-product')->with("thongbao","Sửa thành công!");

    }

    /// order
    public function getListOrder(){
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }

        $item = bills::all();
//        dd($item);
        return view('order.list_order',compact('item'));
    }

    public function getaddOrder(){
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
        return view('order.add_order');
    }

    public function getUpdateOrder($id){
        $theloai = type_products::find($id);
        return view('order.add_order',compact('theloai'));
    }
    public function postUpdateOrder(Request $rq, $id){
        $data = type_products::find($id);
        $rq->validate([
            'id_bill' => 'required',
            'id_product' => 'required',
            'quanlity' => 'required',
            'unit_price' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',

        ],
        [
            'id_bill.required' => 'Vui lòng nhập mã đơn hàng!',
            'id_product.required' => 'Vui lòng nhập sản phẩm!',
            'quanlity.required' => 'Vui lòng nhập số lượng sản phẩm!',
            'unit_price.required' => 'Vui lòng nhập tổng tiền!',
            'created_at.required' => 'Vui lòng nhập thời gian tạo đơn hàng!',
            'updated_at.required' => 'Vui lòng nhập thời gian sửa đơn hàng!',
        ]
        );
        $data->id_bill = $rq->id_bill;
        $data->id_product = $rq->id_product;
        $data->quanlity = $rq->quanlity;
        $data->unit_price = $rq->unit_price;
        $data->created_at = $rq->Carbon::now();
        $data->updated_at = $rq->Carbon::now();
        $data->save();

        return redirect('order.add_order', $id)->with('thongbao','Sửa Đơn hàng thành công!');
    }

    public function getDeleteOrder($id){
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
        $data = type_products::find($id);
        $data->delete();

        return redirect('http://localhost:81/public/admin/list-order')->with('thongbao', 'Xóa thành công');
    }

    public function getDetailOrder($id){
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
        $data = [];
//        $data['tenKH'] = customer::select('name','address')->first($id);

        // lấy nội dung đơn hàng
        $data['noidung'] = DB::table('bill_detail')->join('products', function ($join) {
                    $join->on('bill_detail.id_product', '=', 'products.id');
        })->select(
            'products.name',
            'bill_detail.quanlity',

            'bill_detail.id_bill',
            'bill_detail.unit_price',
            'bill_detail.id',
            'bill_detail.created_at'
        )->first($id);
        // lấy thông tin khách hàng
        $data['khachHang'] = DB::table('bills')->join('customer', function ($join) {
            $join->on('bills.id_customer', '=', 'customer.id');
        })->select(
            'bills.id',
            'customer.name',
            'customer.address'
        )->first($id);
        // lấy tổng tiền
        $data['hoaDon'] = DB::table('bills')->join('bill_detail', function ($join) {
            $join->on('bill_detail.id_bill', '=', 'bills.id');
        })->select('bills.total','bills.id')->first($id);

        return view('order.detail_order', $data);
    }

    // customer

    public function getListCustomer(){
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
        $item = customer::all();
        return view('layout.customer.list_customer',compact('item'));
    }
    public function getDetailCustomer($id){
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
        $items = customer::where("id","=",$id)->first();
        return view('layout.customer.detail_customer', compact('items'));
    }
    public function getEditCustomer(Request $rq, $id){
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
        $items = customer::find($id);
        return view('layout.customer.edit_customer',compact('items'));
    }
    public function getDeleteCustomer($id){
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
        $data = customer::find($id);
        $data->delete();

        return redirect('http://localhost:81/public/admin/list-customer')->with('thongbao', 'Xóa thành công');
    }

    public function getAddCustomer(){
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }

        return view('layout.customer.add_customer',compact('item'));
    }
    public function postAddCustomer(Request $rq ){

//        $rq->validate([
//            'name'=> 'required',
//            'phone_number'=> 'required',
//            'gender'=> 'required',
//            'email'=> 'required'
//        ],
//            $messges = [
//                'name.required' => 'Vui lòng nhập tên khách hàng!',
//                'gender.required' => 'Vui lòng nhập giới tính!',
//                'email.required' => 'Vui lòng nhập email!',
//                'phone_number.required' => 'Vui lòng nhập số điện thoại !',
//            ]
//        );
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
        // add customer
        $data = new customer();
        $data->address              = $rq->address;
        $data->email                = (int)$rq->email;
        $data->gender               = $rq->gender;
        $data->phone_number         = $rq->phone_number;
        $data->image                = $rq->blah ?? "image1.jpeg";
        $data->created_at           = Carbon::now();
        $data->updated_at           = Carbon::now();

        $data->save();

        return redirect()->back()->with("thongbao","Thêm thành công!");

    }
    // category
    public function getAddCategory(){
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
        $category = type_products::all();
        return view('type_product.add_category',compact('category'));
    }
    public function postAddCategory(Request $rq , type_products $category){

//        $rq->validate([
//            'name'=> 'required',
//            'description'=> 'required',
//            'image'=> 'required',
//            'images'=> 'required',
//            'p_type_product	'=> 'required',
//            'alias	'=> 'required',
//            'status	'=> 'required'
//
//        ],
//            $messges = [
//                'name.required' => 'Vui lòng nhập tên khách hàng!',
//                'description.required' => 'Vui lòng nhập giới tính!',
//                'images.required' => 'Vui lòng nhập email!'
//
//            ]
//        );

//        $imagePath1 = $rq->file('iamge')->store('public');
        $category->name              = $rq->name;
        $category->description         = (int)$rq->description ?? 'Chưa có nội dung';
        $category->images              = $rq->image ?? 'image1.jpg';
//        $category->images              = $rq->$imagePath1;
        $category->alias                = $rq->alias;
        $category->status                = $rq->status;
        $category->p_type_product                = $rq->p_type_product;
        $category->created_at           = Carbon::now();
        $category->updated_at           = Carbon::now();

        $category->save();

        return redirect('/admin/list-category')->with("thongbao","Thêm thành công!");

    }
    public function getListCategory(){
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
//        $item = type_products::orderBy('id', 'DESC')->paginate(5);
        $item = type_products::All();
//        dd($item);
        return view('type_product.list_category',compact('item'));
    }

    public function getDeleteCategory($id){
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
            $delCategory = type_products::find($id);

            if($delCategory->delete()== true)
            {
                return redirect()->back()->with('thongbao', 'Xóa thành công');
            }
            else
            {
                echo 'Lỗi!';
            }


    }
    public function getEditCategory($id){
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
        $category_all = type_products::all();
        $category_edit = type_products::find($id);
        return view('type_product.edit_category',compact('category_all','category_edit'));
    }

    public function postEditCategory(Request $rq,$id )
    {

        $category = type_products::find($id);
        $category->name              = $rq->name;
        $category->description         = (int)$rq->description ?? 'Chưa có nội dung';
        $category->images              = $rq->image ?? 'image1.jpg';
        $category->alias                = $rq->alias;
        $category->status                = $rq->status;
        $category->p_type_product                = $rq->p_type_product;
        $category->created_at           = Carbon::now();
        $category->updated_at           = Carbon::now();

        $category->save();
        return redirect('/admin/list-category')->with("thongbao","Update thành công!");
    }
}
