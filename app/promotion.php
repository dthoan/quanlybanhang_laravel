<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    protected $table = "promotion";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $filltable = [
        'id',
        'id_product',
        'prom_name',
        'prom_startdate',
        'prom_enddate',
        'code',
        'prom_content'

    ];
//    protected $fillable = ['title_post', 'body_post'];

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function promotion(){
        return $this->belongsTo("App\\promotion", "id_product", "id_product");
    }
}
