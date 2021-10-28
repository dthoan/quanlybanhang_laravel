<?php

namespace App\Http\Controllers;

use App\products;
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
            // nếu là 1 thì retunt trang chủ


            $sl_images      = slide::all();
            $new_product    = products::where("new",0)->get();
//        $pro_product    = products::where("promotion_price","!=0",0)->paginate(2);
            $pro_product    = DB::table('products')
                ->join('type_products', 'products.id_type', '=', 'type_products.id')
                ->where("promotion_price","!=0",0)
                ->select(
                    'products.*',
                    'type_products.name as typeName'

                )
                ->paginate(2);
//        $sale_product   = products::where("new",0)->get();
//        $botca_product  = products::where("id_type",1)->get();
            $botca_product  = DB::table('products')
                ->join('type_products', 'products.id_type', '=', 'type_products.id')
                ->where("id_type",1)
                ->select(
                    'products.*',
                    'type_products.name as typeName'

                )
                ->get();
            $sale_product = DB::table('products')
                ->join('type_products', 'products.id_type', '=', 'type_products.id')
                ->where("new",0)
                ->select(
                    'products.*',
                    'type_products.name as typeName'

                )
                ->get();

//DD($sale_product);
            return view("trangchu.index", compact("sl_images","new_product","pro_product","sale_product", "botca_product", "get_tenloai"));


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


        $user->save();
        $user = users::find($user->id);
        $user->assignRole('Client');
        return redirect()->back()->with("thongbao","Đăng ký thành công! Hãy đăng nhập để tiếp tục sử dụng");
    }

    public function createRolePermission()
    {
        $userModel = new users();
        $userModel->createRole();
    }

}
