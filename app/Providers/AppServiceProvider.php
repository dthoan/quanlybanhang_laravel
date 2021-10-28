<?php

namespace App\Providers;
use App\blogs;
use App\Cart;
use App\products;
use App\type_products;
use Illuminate\Support\Facades\Auth;
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
            // lấy tất cả bài viết của user
//            $blog_user = blogs::where("blog.id_user",Auth::user()->id)->get;
            $view->with('type_pro', $type_pro);
        });

        view()->composer(['layout.header','layout.header_blog','trangchu.checkout','trangchu.cart'], function($view){
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
