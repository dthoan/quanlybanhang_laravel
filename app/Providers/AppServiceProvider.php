<?php

namespace App\Providers;
use App\Cart;
use App\products;
use App\type_products;
use Session;
use Illuminate\Support\ServiceProvider;

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


    public function boot()
    {
        view()->composer('layout.header', function($view){
            $type_pro = type_products::where('p_type_product','=',0)->get();

            $view->with('type_pro', $type_pro);
        });

        view()->composer(['layout.header','trangchu.checkout','trangchu.cart'], function($view){
           if(Session('cart')){
               $oldCart = Session::get('cart');
               $cart = new Cart($oldCart);
               $view->with([
                   'cart'       => Session::get('cart'),
                   'product'    => $cart->items,
                   'totalprice' => $cart->totalPrice,
                   'totalqty'   => $cart->totalQty
               ]);
           }
        });
    }
}
