<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDb extends Model
{
    protected $table = "cart";
    public function cart_detail(){
        return $this->hasCast("cart_detail", "id_cart", "id");
    }
}
