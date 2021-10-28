<?php

namespace App\Http\Controllers;

use App\blogs;
use App\theme;
use App\users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class blogController extends Controller
{
    public function getAddBlog()
    {
        $chude = theme::all();

        return view('blog.add_blog', compact('chude'));
    }

    public  function postAddBlog(Request $rq)
    {

//        $rq->validate([
//            'id_theme' => 'required',
//            'name' => 'required',
//            'description' => 'required',
//            'image' => 'required',
//            'status' => 'required'
//        ]);




        $blog = new blogs();
        if(!isset(Auth::user()->id)){
            return Redirect('login');
        }
        else
        {
            $blog->id_user = Auth::user()->id;

        }
        $blog->id_theme = $rq->id_theme;
        $blog->name = $rq->name;
        $blog->description = $rq->description;
//        $blog->image = $rq->image;
//        $blog->content = $rq->content;
        $blog->status = $rq->status;
        $blog->created_at      = Carbon::now();
        $blog->updated_at      = Carbon::now();

        $blog->save();
        return redirect('trangchu/cau-hoi')->with("thongbao","Thêm thành công!");


    }
}
