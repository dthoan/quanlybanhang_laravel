<?php

namespace App\Providers;
use App\products;
use App\type_products;
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
            $type_pro = type_products::all();

            $view->with('type_pro', $type_pro);
        });
    }
}
