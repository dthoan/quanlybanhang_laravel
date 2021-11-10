<?php

namespace App\Http\Controllers;


use App\bill_detail;
use App\Cart;
use App\CartDb;
use App\CartDetailDb;
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


    public function getIndex()
    {
        $type_pro = type_products::where('p_type_product', '=', 0)->get();

        $sl_images      = slide::all();
        $new_product    = products::where("status", 0)->orderBy('id', 'DESC')->get();
        foreach ($new_product  as $key => $value) {
            $new_product[$key]['images'] = explode(",", $value->images);
        }
        //
        $new_product1    = products::where("status", 0)->inRandomOrder()->get();
        foreach ($new_product1 as $key => $value) {
            $new_product1[$key]->images = explode(",", $value->images);
        }
        //
        $new_product2    = products::where("status", 0)->inRandomOrder()->get();
        foreach ($new_product2 as $key => $value) {
            $new_product2[$key]->images = explode(",", $value->images);
        }
        //
        $new_product3    = products::where("status", 0)->inRandomOrder()->get();
        foreach ($new_product3 as $key => $value) {
            $new_product3[$key]->images = explode(",", $value->images);
        }
        //
        $new_product4    = products::where("status", 0)->inRandomOrder()->get();
        foreach ($new_product4 as $key => $value) {
            $new_product4[$key]->images = explode(",", $value->images);
        }
        //
        $new_product5    = products::where("status", 0)->inRandomOrder()->get();
        foreach ($new_product5 as $key => $value) {
            $new_product5[$key]->images = explode(",", $value->images);
        }
        //
        $pro_product    = DB::table('products')
            ->join('type_products', 'products.id_type', '=', 'type_products.id')
            ->where("promotion_price", "!=0", 0)
            ->select(
                'products.*',
                'type_products.name as typeName'
            )
            ->orderBy('products.id', 'DESC')->get();
        foreach ($pro_product as $key => $value) {
            $pro_product[$key]->images = explode(",", $value->images);
        }
        $botca_product  = DB::table('products')
            ->join('type_products', 'products.id_type', '=', 'type_products.id')
            ->where("id_type", 1)
            ->select(
                'products.*',
                'type_products.name as typeName'

            )
            ->orderBy('products.id', 'DESC')
            ->get();
        foreach ($botca_product as $key => $value) {
            $botca_product[$key]->images = explode(",", $value->images);
        }
        $sale_product = DB::table('products')
            ->join('type_products', 'products.id_type', '=', 'type_products.id')
            ->where("new", 0)
            ->select(
                'products.*',
                'type_products.name as typeName'
            )
            ->orderBy('products.id', 'DESC')
            ->get();
        foreach ($sale_product as $key => $value) {
            $sale_product[$key]->images = explode(",", $value->images);
        }


        return view("trangchu.index", compact("sl_images", "new_product", "pro_product", "sale_product", "botca_product", "users", "type_pro", "new_product1", "new_product2", "new_product3", "new_product4", "new_product5"));
    }
    public function getTypeProduct($type)
    {
        $sp_theoloai    = products::where("id_type", "=", $type)->paginate(6);
        foreach ($sp_theoloai  as $key => $value) {
            $sp_theoloai[$key]['images'] = explode(",", $value->images);
        }
        $type_pro = type_products::where('p_type_product', '=', 0)->get();
        foreach ($type_pro   as $key => $value) {
            $type_pro[$key]['images'] = explode(",", $value->images);
        }

        $tenloai        = type_products::where("id", "=", $type)->get();

        $sp_khac        = products::where("promotion_price", "!=0", $type)->paginate(6);
        foreach ($sp_khac    as $key => $value) {
            $sp_khac[$key]['images'] = explode(",", $value->images);
        }
        $all_category   = type_products::all();
        //        $counts = DB::table("product")->groupby("id_type")->count("id");
        return view("trangchu.type_product", compact("sp_theoloai", "tenloai", "sp_khac", "all_category", "type_pro"));
    }

    public function getProductDetails($id)
    {
        // Lấy ra sản phẩm có id tương ứng vd id=5
        $detail_product = products::where('id', $id)->first();
        $items = users::where("id", "=", $detail_product->id_user)->first();
        $arr_image = $detail_product->images;
        // hình ảnh
        $one_image = explode(",", $arr_image);
        // lấy ra tên loại sản phẩm {{$product_name[0]->name}}
        $product_name   = products::where("id", "=", $id)->get();
        // hiện bình luận
        $show_comment = posts::leftJoin('users', 'users.id', '=', 'posts.id_user')
            ->where("id_product", "=", $id)->select("posts.*", 'users.full_name')->get();

        $ten_chude = DB::table('products')
            ->join('type_products', function ($join) {
                $join->on('products.id_type', '=', 'type_products.id');
            })->select(
                'type_products.name'
            )->first($id);
        // sản phẩm tương tự
        $sp_tuongtu     = products::where('id_type', $detail_product->id_type)->paginate(4);
        foreach ($sp_tuongtu  as $key => $value) {
            $sp_tuongtu[$key]['images'] = explode(",", $value->images);
        }
        return view("trangchu.product_details", compact('show_comment', "detail_product", "product_name", "sp_tuongtu", 'items', 'ten_chude', 'ten_post', 'post', 'one_image', 'nguoi_cmt'));
    }
    // thêm bình luận
    public function postCommentProduct(Request $rq, posts $p, $id)
    {

        $p->id_user = Auth::user()->id;
        $p->id_product = $rq->productId;
        $p->body_post = $rq->body_post;
        $p->created_at      = Carbon::now();
        $p->updated_at      = Carbon::now();
        $p->deleted_at      = Carbon::now();

        $p->save();

        return redirect()->back()->with('thongbao', 'Bình luận thành công');
    }

    public function getBlog()
    {

        $theme_all = theme::paginate(4);
        $user_all = users::all();
        $blog_all = blogs::leftJoin('users', 'users.id', '=', 'blogs.id_user')
            ->select("blogs.*", 'users.full_name')->orderBy('id', 'DESC')->get();
        return view("trangchu.blog", compact('blog_all', 'theme_all', 'user_all'));
    }

    public function getBlogDetail($id)
    {
        $blog_detail = blogs::where('id_blog', $id)->first();
        // lấy ra tên loại chủ để, bloer
        $theme_name   = blogs::where("id_blog", "=", $id)->get();
        // blog comment id_product được trùng với id_blog tại 1 bình luận k thể có trong 2 bài
        $show_comment_blog = posts::where("id_blog", "=", $id)->get();

        return view('trangchu.blog_details', compact('blog_detail', 'theme_name', 'bloger', 'ten_chude', 'show_comment_blog'));
    }

    // tạo comment trên blog
    public function postCommentBlog(posts $p, Request $rq, $id)
    {
        // lấy id blog trùng cới id post
        $idBlog = DB::table('blogs')->join('posts', function ($join) {
            $join->on('blogs.id_blog', '=', 'posts.id_blog');
        })->select(
            'posts.id_blog'
        )->first($id);

        if (is_null($rq->id_blog)) {
            $p->id_blog = $rq->id_blog = $idBlog->id_blog;
        }


        $p->body_post = $rq->body_post;
        $p->created_at      = Carbon::now();
        $p->updated_at      = Carbon::now();
        $p->deleted_at      = Carbon::now();

        $p->save();
        return redirect()->back();
    }




    public function getAbout()
    {
        return view("trangchu.about");
    }

    public function getContact()
    {
        return view("trangchu.contact");
    }

    public function getCheckout(Request $rq)
    {
        $listProduct = $rq->checkBox;
        $productBill = [];
        $user_order = users::find(Auth::user()->id);
        if (!empty($listProduct)) {
            if (isset(Auth::user()->id)) {
                $cart = CartDb::where('id_user', '=', Auth::user()->id)->first();
                if (isset($cart)) {
                    $cartDetail = CartDetailDb::where(
                        'id_cart',
                        '=',
                        $cart->id
                    )->get();

                    $totalprice = 0;
                    $totalqty = 0;
                    $productList = array();
                    foreach ($cartDetail as $item) {
                        if (in_array($item->id_product, $listProduct)) {
                            $product = products::where('id', '=', $item->id_product)->first();
                            if (isset($product)) {
                                $totalprice = $totalprice + $item->quatity * $product->unit_price;
                                $totalqty = $totalqty + $item->quatity;
                            }

                            $newItem = (object) [
                                'quatity' => $item->quatity,
                                'name' => $product->name,
                                'price' => $product->unit_price,
                                'id' => $product->id,
                                'image' => $product->image
                            ];
                            array_push($productList, $newItem);
                        }
                    }
                    $productBill = [
                        'cart'       => $cart,
                        'product'   => $productList,
                        'totalprice' => $totalprice,
                        'totalqty' => $totalqty,
                        'isLoadByDb' => true,
                    ];
                }
            }
        }
        return view("trangchu.checkout", compact('user_order', 'productBill'));
    }

    public function postCartSubmit(Request $rq)
    {

        return view("trangchu.checkout");
    }

    public function getCart()
    {

        //        if(isset(Auth::user()->id))
        //        {
        //            $product = products::where('id_user', Auth::user()->id)->get();
        //
        //        }
        //        else
        //            $product = products::all();


        return view("trangchu.cart");
    }

    public function reduceProductInCart($id)
    {
        $product = products::find($id);
        if (isset(Auth::user()->id) && isset($product)) {
            $cart = CartDb::where('id_user', '=', Auth::user()->id)->first();
            $cartDetail = CartDetailDb::where([
                ['id_cart', '=', $cart->id],
                ['id_product', '=', $product->id]
            ])->first();
            if ($cartDetail->quatity > 1) {
                $cartDetail->quatity--;
                $cartDetail->save();
            } else {
                $cartDetail->delete();
            }
            return redirect()->back();
        }
    }

    public function getAddtoCart(Request $rq, $id)
    {

        $product = products::find($id);
        if (isset(Auth::user()->id) && isset($product)) {
            $cart = CartDb::where('id_user', '=', Auth::user()->id)->first();
            if (!isset($cart)) {
                $cart = new CartDb();
                $cart->id_user = Auth::user()->id;
                $cart->save();
            }

            $cartDetail = CartDetailDb::where([
                ['id_cart', '=', $cart->id],
                ['id_product', '=', $product->id]
            ])->first();

            if (!isset($cartDetail)) {
                $cartDetail = new CartDetailDb();
                $cartDetail->id_cart = $cart->id;
                $cartDetail->id_product = $product->id;
            }
            if ($cartDetail->quatity == 0) {
                $cartDetail->quatity = 0;
            }
            $cartDetail->quatity = $cartDetail->quatity + 1;
            $cart->save();
            $cartDetail->save();
            return redirect('/');
        } else {
            $product->id_user = null;
            $oldCart = Session('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);

            $cart->add($product, $id);
            $rq->session()->put('cart', $cart);
            return redirect()->back();
        }
    }

    // public function getDelItemCart($id){
    //     $oldCart =  Session('cart') ? Session::get('cart'): null;
    //     $cart = new Cart($oldCart);
    //     $cart->reduceByOne($id);
    //     if(count($cart->items)>0){
    //         Session::put('cart', $cart);
    //     }
    //     else{
    //         Session::forget('cart');
    //     }
    //     return redirect()->back();
    // }

    public function postCheckout(Request $req)
    {

        $req->validate(
            [
                'email'         => 'required|email',
                'name'     =>  'required',
                'phone_number'  =>  'required',
                'address'       =>  'required',
                'payment_method'       =>  'required',
            ],
            [
                'email.required'        => 'Vui lòng nhập email!',
                'email.email'           => 'Địa chỉ thư không đúng định dạng!',
                'name.required'    => 'Chưa Nhập tên đăng nhập!',
                'phone_number.required' => 'Chưa Nhập số điện thoại!',
                'address.required'      => 'Chưa Nhập địa chỉ!',
                'payment_method.required'        => 'Vui lòng xác nhận thanh toán',

            ]
        );
        if (empty($req->productId)) {
            return view('trangchu.thongbao404');
        }
        $cus = new customer;
        $cus->name          = $req->name;
        $cus->gender        = "";
        $cus->email         = $req->email;
        $cus->address       = $req->address;
        $cus->phone_number  = $req->phone_number;
        $cus->save();

        $productList = array();
        $index = 0;
        $totalPrice = 0;

        foreach ($req->productId as $item) {
            $product = products::where('id', '=', $item)->first();
            if (isset($product)) {
                if ($product->quanlity >= $req->productQuantity[$index]) {
                    $product->quanlity -= $req->productQuantity[$index];
                    $product->save();
                    $totalPrice += $req->productPrice[$index] * $req->productQuantity[$index];
                }
            }

            $newItem = (object) [
                'quatity' => $req->productQuantity[$index],
                'price' => $req->productPrice[$index],
                'id' => $item,
            ];


            array_push($productList, $newItem);
            $index++;
        }
        // add bill
        $bill = new bills;
        $bill->id_customer  = $cus->id;
        $bill->time_order   = date('Y-m-d');
        $bill->total        = $totalPrice;
        $bill->payment      = $req->payment_method;
        $bill->status       = 1;
        $bill->id_user      = Auth::user()->id;
        //        $bill->note = $req->note;F
        $bill->save();

        foreach ($productList as $item) {
            $db = new bill_detail;

            $db->id_bill    = $bill->id;
            $db->id_product = $item->id;
            $db->quanlity   = $item->quatity;
            $db->unit_price = $item->price;
            $db->save();

            $cart = CartDb::where('id_user', '=', Auth::user()->id)->first();
            if (isset($cart)) {
                $cartDetail = CartDetailDb::where([
                    ['id_cart', '=', $cart->id],
                    ['id_product', '=', $item->id]
                ])->first();
                $cartDetail->delete();
            }
        }
        //Session::forget('cart');
        return view('trangchu.thongbao');
    }
    // admin


    public function getRegister()
    {
        return view("admin.registration");
    }
    public function postRegister(Request $rq)
    {
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
            ]
        );
        // add user
        $user = new users;
        $user->full_name    = $rq->name;
        $user->email        = $rq->email;
        $user->password     = \Hash::make($rq->password);
        $user->phone        = $rq->phone_number;
        $user->address      = $rq->address;

        $user->save();
        $user = users::find($user->id);
        $user->assignRole('Admin');
        return redirect()->back()->with("thongbao", "Đăng ký thành công! Hãy đăng nhập để tiếp tục sử dụng");
    }

    public function getLogin()
    {

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
        //        $role = users::where("email",$rq->email)->get();

        //        $get_tenloai = type_products::where("id", "=", $type)->get();


        //        if (Auth::attempt($arrLogin)) {
        //            // nếu là 1 thì retunt trang chủ
        //            return view("admin.index");
        //        }
        $isRole = $this->checkRole(['Amin', 'User']);
        if (!$isRole && Auth::attempt($arrLogin)) {
            return redirect()->route('index');
        } else {
            return redirect()->back()->with([
                'matb' => '0',
                'thongbao' => 'Đăng Nhập Thất Bại!'
            ]);
        }
    }

    // đăng xuất
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('trangchu');
    }

    // tìm kiếm trang chủ
    public function getResearch(Request $rq)
    {
        if ($rq->key == "khuyen mai") {
            $product = products::where("promotion_price", ">", 0)->paginate(8);
        } else if ($rq->key == "khong khuyen mai")
            $product = products::where("promotion_price", 0)->paginate(8);
        //          else if
        //            $product = users::where("full_name", "like", "%".$rq->key."%")->paginate(8);
        else {
            $product = products::where("name", "like", "%" . $rq->key . "%")
                ->orwhere("unit_price", $rq->key)
                ->paginate(8);
        }



        return view("trangchu.search", compact("product"));
    }
    public function getResearchBlog(Request $rq)
    {
        if ($rq->key == "Da mun") {
            $product = products::where("name", "like", "%", $rq->key)->get();
        } else if ($rq->key == "khong khuyen mai")
            $product = products::where("promotion_price", 0)->paginate(8);
        else
            $product = products::where("name", "like", "%", $rq->key)
                ->orwhere("unit_price", $rq->key)
                ->orwhere("promotion_price", $rq->key)
                ->paginate(8);
        return view("trangchu.search", compact("product"));
    }
    // trang quản trị
    public function getAdminIndex()
    {
        $isRole = $this->checkRole(['Admin', 'User']);
        if (!$isRole) {
            return redirect()->route('login');
        }
        if ($this->checkRole(['User'])) {
            $khach_hang = DB::table('bills')->join('customer', function ($join) {
                $join->on('bills.id_customer', '=', 'customer.id');
            })->select(
                'bills.id as bill_id',
                'bills.status',
                'customer.name as ten_khach_hang',
                'customer.address',
                'bills.total',
                'bills.created_at',
                'bills.id_user'
            )->where('bills.id_customer', '=', Auth::user()->id)->count();
            // $don_hang = bills::where('id_user', '=', Auth::user()->id)->count();
            $don_hang =  DB::table('bills')->join('customer', function ($join) {
                $join->on('bills.id_customer', '=', 'customer.id');
            })->select(
                'bills.id as bill_id',
                'bills.status',
                'customer.name as ten_khach_hang',
                'customer.address',
                'bills.total',
                'bills.created_at',
                'bills.id_user'
            )->where('bills.id_user', '=', Auth::user()->id)->count();
      // 1 là chưa xử lý
            $chua_xu_ly = bills::where('status', 1)->where('id_user', '=', Auth::user()->id)->count();
            $doanh_thu = bills::where('id_user', '=', Auth::user()->id)->sum('total');
        } else {
            $khach_hang = customer::count();
            $don_hang = bills::count();
            $chua_xu_ly = bills::where('status', 1)->count();
            $doanh_thu = bills::sum('total');
        }



        return view('admin.index', compact('khach_hang', 'don_hang', 'doanh_thu', 'chua_xu_ly'));
    }


    public function getAllProduct()
    {


        $isRole = $this->checkRole(['Admin', 'User']);
        if (!$isRole) {
            Auth::logout();
            return redirect()->route('login');
        }
        $ListProduct = products::orderBy('id', 'DESC')->where('id_user', Auth::user()->id)->paginate(5);
        $moi = products::orderBy('id', 'DESC')
            ->where('id_user', Auth::user()->id)
            ->where('status', 0)
            ->paginate(5);
        $hetHang = products::orderBy('id', 'DESC')
            ->where('id_user', Auth::user()->id)
            ->where('quanlity', 0)
            ->paginate(5);
        $ngungBan = products::orderBy('id', 'DESC')
            ->where('id_user', Auth::user()->id)
            ->where('status', 1)
            ->paginate(5);
        $category = type_products::all();

        return view('product.list_product', compact('ListProduct', 'category', 'moi', 'hetHang', 'ngungBan'));
    }

    public function getDeleteProduct($id)
    {
        if (!isset(Auth::user()->full_name)) {
            return Redirect('login');
        }
        $delProduct = products::find($id);
        $delProduct->delete();

        return redirect('http://localhost:81/public/admin/list-product')->with('thongbao', 'Xóa thành công');
    }

    public function getAddProduct()
    {
        $isRole = $this->checkRole(['Admin', 'User']);
        if (!$isRole) {
            return redirect()->route('login');
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

        return view('product.edit_product', compact('category', 'product', 'category_edit', 'isEdit'));

        //        return view('product.add_product', compact('category, product'));

    }



    public function getEditProduct($id)
    {
        if (!isset(Auth::user()->full_name)) {
            return Redirect('login');
        }
        $category = type_products::all();

        $category_edit = type_products::find($id);
        $product = products::find($id);



        $isEdit = true;
        return view('product.edit_product', compact('category', 'product', 'category_edit', 'isEdit'));
    }


    public function postEditProduct(Request $rq)
    {

        $rq->validate(
            [
                'name'          => 'required',
                'id_type'       => 'required',
                'unit_price'    => 'required',
                'promotion_price' => 'required',
                'status'            => 'required',


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
        if (is_null($product)) {
            //create
            $isEdit = false;
            $product = new products();
        }




        if ($rq->hasfile('image')) {

            foreach ($rq->file('image') as $file) {
                $name = $file->getClientOriginalName();
                // tách chuỗi lấy đuôi file jpg
                $tach_chuoi  = explode(".", $name);
                $end = end($tach_chuoi);
                $mytime = md5(Carbon::now());
                // mã hóa md5
                $hinh = md5($name);
                // đường dẫn của file
                $file_name = $mytime . $hinh . '.' . $end;

                $file->move(public_path() . '/storage/uploals/', $file_name);

                $data[] = 'uploals/' . $file_name;

                $list_file = implode(",", $data);
            }
            $product->images          =  $list_file;
        }
        //        if(!is_null($rq->file('image')))
        //        {
        //            $imagePath2 = $rq->file('images')->store('uploals','public');
        //            $product->images          = $imagePath2;
        //        }

        if (!is_null($rq->id_type)) {
            $product->id_type         = (int)$rq->id_type;
        }

        $product->name            = $rq->name;
        $product->id_type         = (int)$rq->id_type;
        $product->description     = $rq->description;
        $product->unit_price      = (float)$rq->unit_price;
        $product->promotion_price = (float)$rq->promotion_price;
        $product->quanlity            = $rq->quanlity;
        $product->status          = $rq->status;
        $product->id_user         = $rq->user_id;
        $product->alias           = $rq->alias;
        $product->updated_at      = Carbon::now();
        //dd($product);
        if ($isEdit) {
            //Edit
            $product->update();
            return redirect('admin/list-product')->with("thongbao", "Sửa thành công!");
        } else {
            //Create
            $product->created_at      = Carbon::now();
            $product->save();
            return redirect('admin/list-product')->with("thongbao", "Thêm thành công!");
        }
    }

    /// order
    public function getListOrder()
    {
        if ($this->checkRole(['Admin'])) {
            // $item = bills::all();
            $item  = DB::table('bills')->join('customer', function ($join) {
                $join->on('bills.id_customer', '=', 'customer.id');
            })->select(
                'bills.id as bill_id',
                'bills.status',
                'customer.name as ten_khach_hang',
                'customer.address',
                'bills.total',
                'bills.created_at',
                'bills.id_user as user_id'
            )->get();

            foreach ($item as $key => $value) {
                $totalQuantity = DB::table('bill_detail')
                    ->where('bill_detail.id_bill', '=', $value->bill_id)
                    ->sum('bill_detail.quanlity');
                $item[$key]->sum_quantity = $totalQuantity;
            }
        } elseif ($this->checkRole(['User'])) {
            $item  = DB::table('bills')
                ->join('customer', function ($join) {
                    $join->on('bills.id_customer', '=', 'customer.id');
                })->select(
                    'bills.id as bill_id',
                    'bills.status',
                    'customer.name as ten_khach_hang',
                    'customer.address',
                    'bills.total',
                    'bills.created_at',
                    'bills.id_user as user_id'
                )->where('id_user', Auth::user()->id)->get();

            foreach ($item as $key => $value) {
                $totalQuantity = DB::table('bill_detail')
                    ->where('bill_detail.id_bill', '=', $value->bill_id)
                    ->sum('bill_detail.quanlity');
                $item[$key]->sum_quantity = $totalQuantity;
            }
        } else {
            return redirect()->route('login');
        }

        return view('order.list_order', compact('item'));
    }
    public function getDetailOrder($id)
    {
        if (!isset(Auth::user()->full_name)) {
            return Redirect('login');
        }
        $data = [];

        $data['noidung'] = DB::table('bill_detail')->join('products', function ($join) {
            $join->on('bill_detail.id_product', '=', 'products.id');
        })->select(
            'products.name as ten_sp',
            'bill_detail.*'

        )->where('bill_detail.id_bill', $id)->get();

        // lấy thông tin khách hàng
        $data['khachHang'] = DB::table('bills')->join('customer', function ($join) {
            $join->on('bills.id_customer', '=', 'customer.id');
        })->select(
            'bills.id',
            'bills.status',
            'bills.total',
            'customer.name as ten_khach_hang',
            'customer.address'
        )->where('bills.id', $id)->first();
        // lấy tổng tiền
        $data['hoaDon'] = bills::find($id);



        return view('order.detail_order', $data);
    }

    public function postOrderStatus(Request $rq, $id)
    {
        $role = DB::table('bills')->get
            ->where('status', $rq->status)
            ->update(['status' => $rq->status]);
        return ['data' => $role, 'status' => 200];
    }
    public function getaddOrder()
    {
        $isRole = $this->checkRole(['Admin', 'User']);
        if (!$isRole) {
            return redirect()->route('login');
        }
        return view('order.add_order');
    }

    public function getUpdateOrder($id)
    {
        $theloai = type_products::find($id);
        return view('order.add_order', compact('theloai'));
    }
    public function postUpdateOrder(Request $rq, $id)
    {
        $data = type_products::find($id);
        $rq->validate(
            [
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

        return redirect('order.add_order', $id)->with('thongbao', 'Sửa Đơn hàng thành công!');
    }

    public function getDeleteOrder($id)
    {
        if (!isset(Auth::user()->full_name)) {
            return Redirect('login');
        }


        $data = bill_detail::where('id_bill', $id)->delete();
        $data = bills::find($id);
        $data->delete();
        return redirect('admin/list-order')->with('thongbao', 'Xóa thành công');
    }


    // customer

    public function getListCustomer()
    {
        $isRole = $this->checkRole(['Admin', 'User']);
        if (!$isRole) {
            return redirect()->route('login');
        }
        $item    = DB::table('customer')
            ->join('bills', 'bills.id_customer', '=', 'customer.id')
            ->where("bills.id_user", Auth::user()->id)
            ->select(
                'bills.*',
                'customer.*'
            )
            ->get();


        return view('layout.customer.list_customer', compact('item'));
    }
    public function getDetailCustomer($id)
    {
        if (!isset(Auth::user()->full_name)) {
            return Redirect('login');
        }
        $items = customer::where("id", "=", $id)->first();
        return view('layout.customer.detail_customer', compact('items'));
    }
    public function getEditCustomer(Request $rq, $id)
    {
        if (!isset(Auth::user()->full_name)) {
            return Redirect('login');
        }
        $items = customer::find($id);
        return view('layout.customer.edit_customer', compact('items'));
    }
    public function getDeleteCustomer($id)
    {
        if (!isset(Auth::user()->full_name)) {
            return Redirect('login');
        }
        $data = customer::find($id);
        $data->delete();

        return redirect('http://localhost:81/public/admin/list-customer')->with('thongbao', 'Xóa thành công');
    }

    public function getAddCustomer()
    {
        $isRole = $this->checkRole(['Admin', 'User']);
        if (!$isRole) {
            return redirect()->route('login');
        }


        return view('layout.customer.add_customer', compact('item'));
    }
    public function postAddCustomer(Request $rq)
    {

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
        if (!isset(Auth::user()->full_name)) {
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

        return redirect()->back()->with("thongbao", "Thêm thành công!");
    }
    // category
    public function getAddCategory()
    {
        $isRole = $this->checkRole(['Admin', 'User']);
        if (!$isRole) {
            return redirect()->route('login');
        }
        $category = type_products::all();
        return view('type_product.add_category', compact('category'));
    }
    public function postAddCategory(Request $rq, type_products $category)
    {

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

        return redirect('/admin/list-category')->with("thongbao", "Thêm thành công!");
    }
    public function getListCategory()
    {
        $isRole = $this->checkRole(['Admin', 'User']);
        if (!$isRole) {
            return redirect()->route('login');
        }
        //        $item = type_products::orderBy('id', 'DESC')->paginate(5);
        $item = type_products::All();
        //        dd($item);
        return view('type_product.list_category', compact('item'));
    }

    public function getDeleteCategory($id)
    {
        if (!isset(Auth::user()->full_name)) {
            return Redirect('login');
        }
        $delCategory = type_products::find($id);

        if ($delCategory->delete() == true) {
            return redirect()->back()->with('thongbao', 'Xóa thành công');
        } else {
            echo 'Lỗi!';
        }
    }
    public function getEditCategory($id)
    {
        if (!isset(Auth::user()->full_name)) {
            return Redirect('login');
        }
        $category_all = type_products::all();
        $category_edit = type_products::find($id);
        return view('type_product.edit_category', compact('category_all', 'category_edit'));
    }

    public function postEditCategory(Request $rq, $id)
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
        return redirect('/admin/list-category')->with("thongbao", "Update thành công!");
    }
}
