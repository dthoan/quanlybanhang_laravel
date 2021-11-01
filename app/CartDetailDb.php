<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetailDb extends Model
{
    protected $table = "cart_detail";
    public function cart(){
        return $this->belongsTo("App\cart", "id_cart", "id");
    }
}
