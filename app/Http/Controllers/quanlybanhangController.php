<?php

namespace App\Http\Controllers;

use App\products;
use App\type_products;
use Illuminate\Http\Request;
use App\slide;
use Illuminate\Support\Facades\DB;


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
    public function getCart(){
        return view("trangchu.cart");
    }


}
