<?php

namespace App\Http\Controllers;

use App\users;
use App\products;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class accountController extends Controller
{
    public function getAccount($id)
    {

        // chua len thi phai

            $items = users::where("id","=",$id)->find($id);


            $ListProduct = products::orderBy('id', 'DESC')->where('id_user',$id)->paginate(5);
            foreach($ListProduct as $key => $value){
                $ListProduct[$key]['images'] = explode(",", $value->images);
            }

            return view('account.account',compact('items','ListProduct','one_image'));



    }
    public function getAccountDetail()
    {
        return view('account.account_detail');
    }

    public function getListAccount(){
        $all_users = DB::table('users')
        ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select(
            'users.*', 
            'model_has_roles.*', 
            'roles.name as role_name')
      
        ->get();
        $listRole = DB::table('roles')
        ->select('*')
        
        ->get();
        return view('account.list_account',compact('all_users','listRole'));
    }

    public function getActive(){
        return view('shop.yeucau_banhang');
    }
    public function postActive(Request $rq){
        $rq->validate(
            [
                'active'          => 'required',
            ],
            $messges = [
                'active.required' => 'Quý khách vui lòng chọn đăng ký bán hàng!',           
            ]
        );
        $user = users::find(Auth::user()->id);
        
        $user->active            = 1;
        $user->update();
        return view('trangchu.thongbaoActive');
    }
}
