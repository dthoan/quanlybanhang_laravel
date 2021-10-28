<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $table = "posts";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $filltable = [
        'id_post',
        'id_product',
        'title_post',
        'body_post'.
        'deleted_at'

    ];
    public function users(){
        return $this->belongsTo("App\\user", "id_user", "id");
    }
//    protected $fillable = ['title_post', 'body_post'];

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
