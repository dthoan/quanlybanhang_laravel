<?php

namespace App\Http\Controllers;

use App\products;
use Illuminate\Http\Request;
use App\slide;



class quanlybanhangController extends Controller
{

    public function getIndex(){
        $sl_images = slide::all();
        $new_product = products::where("new",1)->get();
        $pro_product = products::where("promotion_price","!=0",0)->paginate(2);
        return view("trangchu.index", compact("sl_images","new_product","pro_product"));
    }
    public function getProductDetails(){
        return view("trangchu.product_details");
    }
    public function getBlog(){
        return view("trangchu.blog");
    }
    public function getCart(){
        return view("trangchu.cart");
    }


}
