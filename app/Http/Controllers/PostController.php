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
        //dd($request);
        $post = new Post($request->all());
        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect()->route('indexPost')->with('alert', 'Post creado');
    }
}
