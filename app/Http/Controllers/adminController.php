<?php

namespace App\Http\Controllers;

use App\bills;
use App\customer;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function getSum(){
        $doanh_thu = bills::sum('price')->get();   
        $khach_hang = customer::all();
 
        return view('admin.index',compact('khach_hang','doanh_thu'));
    }
}
