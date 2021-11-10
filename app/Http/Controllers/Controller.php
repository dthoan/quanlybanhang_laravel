<?php

namespace App\Http\Controllers;

use App\users;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function checkRole($roleUser){
        $isLogin = \Auth::check();
        $isRole  = false;
        if($isLogin){
            $roles = users::find(\Auth::user()->id)->roles;
           
            foreach($roles as $role){
                if( in_array($role['name'], $roleUser)){
                    $isRole = true;
                }


            }
        }
        return $isRole;
    }
}
