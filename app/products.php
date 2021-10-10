<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = "products";
    protected $fillable = [
        'name',
        'quanlity',
        'id_type',
        'id_user',
        'id_post',
        'description',
        'unit_price',
        'promotion_price',
        'new',
        'image',
        'images',
        'status',
        'alias',
        'product_views',
        'created_at',
        'updated_at'
    ];

    public function type_products(){
        return $this->belongsTo("App\\type_products", "id_type", "id");
    }
    public function post(){
        return $this->belongsTo("App\\posts", "id_blog", "id_blog");
    }
    public function users(){
        return $this->belongsTo("App\\user", "id_user", "id");
    }
    public function bill_detail(){
        return $this->hasCast("App\bill_detail", "id_product", "id");
    }
}
