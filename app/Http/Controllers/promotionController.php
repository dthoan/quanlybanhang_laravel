<?php

namespace App\Http\Controllers;

use App\customer;
use App\products;
use App\promotion;
use App\type_products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class promotionController extends Controller
{
    public function getList(){
//        if(!isset(Auth::user()->full_name)){
//            return Redirect('login');
//        }


//        $List = promotion::orderBy('id_prom', 'DESC')->where('id_user',Auth::user()->id)->paginate(5);
        $List = promotion::orderBy('id', 'DESC')->paginate(5);
        $product = products::all();

        return view('promotion.list_promotion',compact('List','product'));
    }
    public function getAdd(Request $rq)
    {

        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }

        $product = products::all();
        $promotion = new promotion;
        $category_edit = null;
        $isEdit = false;
        $promotion->prom_name               = null ;
        $promotion->id_product              = null;
        $promotion->prom_content            = null;
        $promotion->prom_price              = null;

        $promotion->prom_startdate          = null;
        $promotion->prom_enddate            = null;
        $promotion->code                    = null;
        $promotion->prom_percent            = null;
        $productSearch = products::where("name", "like", "%", $rq->key)->get();
        return view('promotion.add_update_promotion',compact('promotion','product','category_edit','isEdit','productSearch'));

    }

    public function getEdit(Request $rq,$id){
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
        $product = products::all();

//        $product_edit = products::first($id);
        $promotion = promotion::find($id);
        $productSearch = products::where("name", "like", "%", $rq->key)->get();

//        dd($promotion);
        $isEdit = true;
        return view('promotion.add_update_promotion',compact('product','product_edit','promotion','isEdit','productSearch'));
    }
    public function getDelete($id){
        if(!isset(Auth::user()->full_name)){
            return Redirect('login');
        }
        $data = promotion::find($id);
        $data->delete();

        return redirect('http://localhost:81/public/admin/list-promotion')->with('thongbao', 'Xóa thành công');
    }

    public function fetch_data(Request $rq)
    {

        $productSearch = products::where("name", "LIKE", "%{$rq->key}%")->get();


        return view('promotion.pagination_data',compact('productSearch'));
    }

    public function postAddEdit(Request $rq)
    {
        $rq->validate([
            'prom_name'        => 'required',
            'code'             => 'required|unique:promotion',
            'prom_price'      => 'required',




        ],
            $messges = [
                'code.required' => 'Vui lòng nhập mã khuyến mãi!',
                'code.unique' => 'Mã khuyến mãi bị trùng!',
                'prom_name.required' => 'Vui lòng nhập tên chương trình khuyến mãi!',
                'prom_price.required' => 'Vui lòng nhập số tiền được giảm!',

            ]
        );

        $promotion = promotion::find($rq->promotionId);
        $isEdit = true;
        if(is_null($promotion)){
            //create
            $isEdit = false;
            $promotion = new promotion();
        }




        if(!is_null($rq->id_product))
        {
            $promotion->id_product         = (int)$rq->id_product;
        }

        $promotion->prom_name              = $rq->prom_name;
        $promotion->id_product             = (int)$rq->id_type;
        $promotion->prom_content           = $rq->prom_content;
        $promotion->prom_price             = (float)$rq->prom_price;
        $promotion->prom_startdate         = $rq->prom_startdate;
        $promotion->prom_enddate           = $rq->status;
        $promotion->code                   = $rq->code;
        $promotion->prom_percent           = $rq->prom_percent;


        if($isEdit){
            //Edit

            $promotion->update();
            return redirect('admin/list-promotion',compact('productSearch'))->with("thongbao","Sửa thành công!");
        }else{
            //Create
            $productSearch = products::where("name", "like", "%", $rq->key)->paginate(4);
            $promotion->created_at      = Carbon::now();
            $promotion->save();
            return redirect('admin/list-promotion',compact('productSearch'))->with("thongbao","Thêm thành công!");
        }

    }
}
