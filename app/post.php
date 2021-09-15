<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class posts extends Model
{
    protected $table = "posts";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title_post', 'body_post'];

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
