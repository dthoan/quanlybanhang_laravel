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
}
