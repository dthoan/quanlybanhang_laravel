<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogs extends Model
{
    protected $table = "blogs";
    // choox này có cần thêm đầy đủ trường ở database k anh?
    //db em có required hết các trường k
    // hieenj taij k caanf rq cungx dc as
    protected $fillable = [''];
    public function theme(){
        return $this->belongsTo("App\\theme", "id_theme", "id_blog");

    }
    public function user(){
        return $this->belongsTo("App\\user", "id", "id_user");

    }

    public function post(){
        return $this->belongsTo("App\\posts", "id_blog", "id_blog");
    }
}
