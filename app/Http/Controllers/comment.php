<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class comment extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body'=>'required',
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;

        Comment::create($input);

        return back();
    }
}
