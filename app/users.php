<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = "users";
    public function comment(){
        return $this->belongsTo("App\\comment", "id_user", "id");
    }
}
