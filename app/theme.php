<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theme extends Model
{
    protected $table = "theme";
    protected $fillable = [
        'id_theme',
        'name',
        'iamge',
        'desription',
        'p_theme',
        'status',
        'alias',
        'update_at',
        'created_at',
    ];

    public function blog(){
        return $this->hasCast("App\blog", "id_theme", "id_blog");
    }
}
