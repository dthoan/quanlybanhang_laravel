<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_products extends Model
{
    protected $table = "type_products";
    protected $filltable = [
        'name',
        'description',
        'images',
        'alias',
        'status',
        'p_type_product',
        'created_at',
        'updated_at '

    ];
    public function products(){
        return $this->hasCast("App\products", "id_type", "id");
    }
}
