<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Post;

class PostsController extends Controller
{
    //↓indexページ表示
    public function index(){
        return view('posts/index');
    }

    public function newPost(Request $request): RedirectResponse
    {
        //↓バリデーション
        $request->validate([
            'new_post' => 'required|min:1|max:150',
        ]);

        //↓投稿内容を変数に入れる
        $post = $request->input('new_post'); //Form::textareaから
        $user_id = $request->input('post_user'); //Form::inputから

        // ↓投稿
        Post::create(['post' => $post,
                    'user_id' => $user_id]);

        return back();

    }
}
