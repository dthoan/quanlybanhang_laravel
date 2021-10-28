<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $table ='roles';
    protected $fillable = ['name'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function users()
    {
        return $this->belongsToMany(users::class, 'model_has_roles','id','role_id');
    }
}
