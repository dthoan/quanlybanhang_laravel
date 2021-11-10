<?php

namespace App\Http\Controllers;

use App\products;
use App\type_products;
use App\slide;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class loginController extends Controller
{
    public function getLogin(){

        return view("trangchu.login");
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

//        $role = users::where("email",$rq->email)->select("role")->get();

//        $get_tenloai = type_products::where("id", "=", $type)->get();

        if (Auth::attempt($arrLogin)) {
            $type_pro = type_products::where('p_type_product','=',0)->get();
       
            $sl_images      = slide::all();
            $new_product    = products::where("status", 0)->orderBy('id', 'DESC')->get();
            foreach ($new_product  as $key => $value) {
                $new_product[$key]['images'] = explode(",", $value->images);
            }
            //
            $new_product1    =products::where("status", 0)->inRandomOrder()->get();
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
    
    
            return view("trangchu.index", compact("sl_images", "new_product", "pro_product", "sale_product", "botca_product", "users","type_pro","new_product1","new_product2","new_product3","new_product4","new_product5"));


        }

        else
        {
            return redirect()->back()->with([
                'matb'=>'0',
                'thongbao'=>'Đăng Nhập Thất Bại!'
            ]);
        }
    }

    public function getTrangchuRegister(){
        return view("trangchu.register");
    }
    public function postTrangchuRegister(Request $rq){


        $rq->validate(
            [
                'email'         => 'required|email|unique:users,email',
                'password'      => 'required|min:6|max:20',
                'Repassword'    => 'required|same:password',
                'full_name'          =>  'required',



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
                'full_name.required'         => 'Chưa Nhập tên đăng nhập!',

            ]);
        // add user
        $user = new users;
        $user->full_name    = $rq->full_name;
        $user->email        = $rq->email;
        $user->password     = \Hash::make($rq->password);
        $user->phone        = $rq->phone_number;
        $user->address      = $rq->address;
        $user->active       = 0;


        $user->save();
        $user = users::find($user->id);
        $user->assignRole('Client');
        return redirect()->back()->with("thongbao","Đăng ký thành công! Hãy đăng nhập để tiếp tục sử dụng");
    }
    public function loginFb(Request $rq){
        $fbId = $rq->fbid;
        $name = $rq->name;
        $user = $this->checkUserByFb($fbId);
        if(!empty($user)){
            Auth::loginUsingId($user->id, true);
            $type_pro = type_products::where('p_type_product','=',0)->get();
       
            $sl_images      = slide::all();
            $new_product    = products::where("status", 0)->orderBy('id', 'DESC')->get();
            foreach ($new_product  as $key => $value) {
                $new_product[$key]['images'] = explode(",", $value->images);
            }
            //
            $new_product1    =products::where("status", 0)->inRandomOrder()->get();
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
    
    
            return view("trangchu.index", compact("sl_images", "new_product", "pro_product", "sale_product", "botca_product", "users","type_pro","new_product1","new_product2","new_product3","new_product4","new_product5"));

        }else{
            $user = new users;
            $user->full_name    = $name;
            $user->fb_id    = $fbId;
            $user->active       = 0;
            $user->save();
            $user = users::find($user->id);
            $user->assignRole('Client');
            Auth::loginUsingId($user->id, true);
            $type_pro = type_products::where('p_type_product','=',0)->get();
       
            $sl_images      = slide::all();
            $new_product    = products::where("status", 0)->orderBy('id', 'DESC')->get();
            foreach ($new_product  as $key => $value) {
                $new_product[$key]['images'] = explode(",", $value->images);
            }
            //
            $new_product1    =products::where("status", 0)->inRandomOrder()->get();
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
    
    
            return view("trangchu.index", compact("sl_images", "new_product", "pro_product", "sale_product", "botca_product", "users","type_pro","new_product1","new_product2","new_product3","new_product4","new_product5"));

        
        }
    }
    public function checkUserByFb($fbId){
        $user = users::where('fb_id',$fbId)->first();
        return $user ;
    }
    public function createRolePermission()
    {
        $userModel = new users();
        $userModel->createRole();
    }

}
