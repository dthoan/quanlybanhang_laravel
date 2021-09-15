<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $filltable = [

        'id_user',
        'id_post',
        'id_blog',
        'id_product',
        'id_parent',
        'body',
    ];
}
