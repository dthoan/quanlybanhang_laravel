<?php

namespace App\Http\Controllers;

use App\users;
use App\products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class accountController extends Controller
{
    public function getAccount($id)
    {

            $items = users::where("id","=",$id)->find($id);


            $ListProduct = products::orderBy('id', 'DESC')->where('id_user',$id)->paginate(5);
            foreach($ListProduct as $key => $value){
                $ListProduct[$key]['images'] = explode(",", $value->images);
            }


            // hình ảnh
//            $one_image = explode(",", $arr_image);
            return view('account.account',compact('items','ListProduct','one_image'));



    }
    public function getAccountDetail()
    {
        return view('account.account_detail');
    }
}
