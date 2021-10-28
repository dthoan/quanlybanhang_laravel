<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;

class postController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }
    // thêm bài viết ở trang người dùng
    public function getAddPostBlog(){
        return view('blog.add_blog');
    }
    public  function postAddPostBlog(){

    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index');
    }
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }
}
