<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_products extends Model
{
    protected $table = "type_products";
    public function products(){
        return $this->hasCast("App\products", "id_type", "id");
    }
}
