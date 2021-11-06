<?php

namespace App\Http\Controllers;
use DB;
use App\users;
use App\roles;
use App\model_has_roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\compare;

class userController extends Controller
{
    public function getUser()
    {
        // nếu k phải admin thì k được vào
        $isRole = $this->checkRole(['Admin','User']);
        if($isRole){
            Auth::logout();
            return redirect()->route('login');
        }

        $all_users = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('users.*', 'model_has_roles.*', 'roles.name as role_name')
            ->get();
        $listRole = DB::table('roles')
            ->select('*')
            ->get();

        return view('role.list_user',compact('all_users','listRole'));
    }

    public function postRole(Request $rq)
    {
        $role = DB::table('model_has_roles')
            ->where('model_id', $rq->model_id)
            ->update(['role_id' => $rq->role_id]);
        return ['data'=>$role, 'status' =>200];


    }
}
