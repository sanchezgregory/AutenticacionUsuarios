<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function indexPost()
    {
        $posts = Post::all();

        $title = "Post actuales";

        return view('posts.index', compact('posts', 'title'));
    }

    public function createPost()
    {
        $title = "Nuevo post";
        return view('posts.publish',compact('title'));
    }

    public function storePost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        Post::submit($request->all()); // metodo submit statico dentro de modelo Post

        return redirect()->route('indexPost')->with('success', 'Post creado');

    }
}
