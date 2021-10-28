<?php

namespace App;
use App\roles;
//use  App\users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class users extends Authenticatable
{
    use HasRoles;
    protected $table = "users";
    protected $guard_name = 'web';



    public function roles()
    {
        return $this->belongsToMany(roles::class, 'model_has_roles','model_id','role_id');
    }


    public static function createRole(){
//         $role = Role::create(['name' => 'writer']);
//         $permission = Permission::create(['name' => 'edit articles']);
//        $role = Role::create(['name' => 'Admin']);
//        $permission = Permission::create(['name' => 'All']);

        $user = users::find(3);
        $user->assignRole('Admin');

    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }




}


