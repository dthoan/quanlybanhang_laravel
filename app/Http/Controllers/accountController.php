<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class accountController extends Controller
{
    public function getAccount()
    {
        return view('account.acount');
    }
    public function getAccountDetail()
    {
        return view('account.account_detail');
    }
}
