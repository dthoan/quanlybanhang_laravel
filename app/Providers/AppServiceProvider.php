<?php

namespace App\Providers;
use App\blogs;
use App\Cart;
use App\CartDetailDb;
use App\CartDb;
use App\products;
use App\type_products;
use App\users;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\ServiceProvider;
use function Sodium\add;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

//    public function __construct(Amin $auth)
//    {
//        $this->auth = $auth;
//    }
//    public function show(Post $post)
//    {
//        $this->authorize('Amin', $post);
//
//    }
    public function boot()
    {
        view()->composer(['layout.header','layout.header_blog'], function($view){
            $type_pro = type_products::where('p_type_product','=',0)->get();

            $view->with('type_pro', $type_pro);
        });

        view()->composer(['layout.header','layout.header_blog','trangchu.cart','trangchu.checkout'], function($view){
            if(isset(Auth::user()->id)){
                $cart = CartDb::where('id_user','=', Auth::user()->id)->first();
                if(isset($cart)){
                    $cartDetail = CartDetailDb::where(
                        'id_cart', '=', $cart->id
                    )->get();

                    $totalprice = 0;
                    $totalqty = 0;
                    $productList = array();
                    foreach ($cartDetail as $item){
                        $product = products::where('id','=', $item->id_product)->first();
                        if(isset($product)){
                            $totalprice = $totalprice + $item->quatity * $product->unit_price;
                            $totalqty = $totalqty + $item->quatity;
                        }

                        $newItem = (object) [
                            'quatity' => $item->quatity,
                            'name' => $product->name,
                            'price' => $product->unit_price,
                            'id' => $product->id,
                            'images' => $product->images
                        ];
                       

                        array_push($productList, $newItem);
                    }
                    $view->with([
                        'cart'       => $cart,
                        'product'   => $productList,
                        'totalprice' => $totalprice,
                        'totalqty' => $totalqty,
                        'isLoadByDb' => true,
                    ]);
                }
            }else{
                if(Session('cart')){
                    $oldCart = Session::get('cart');
                    $cart = new Cart($oldCart);
                    $view->with([
                        'cart'       => Session::get('cart'),
                        'product'    => $cart->items,
                        'totalprice' => $cart->totalPrice,
                        'totalqty'   => $cart->totalQty,
                        'isLoadByDb' => false,
                    ]);
                }
            }

        });

        view()->composer('admin.layout_admin', function($view){
            $user = users::where('id',Auth::user()->id)->get();

            $isLogin = \Auth::check();
            $isRole  = false;
            if($isLogin){
                $roles = users::find(\Auth::user()->id)->roles;

                // $role_user = $roles[0]->name;
                // dd($roles[0]->name);
               

                $view->with('roles',$roles);
            }
           
        });

       
    }
}
