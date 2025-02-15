<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //↓indexページ表示
    public function index(){
        $posts = Post::get(); // postsのデータを取得する
        return view('posts/index',['posts'=>$posts]);
        // return view('postsフォルダ/index.blade.php');
        return view('posts/index');
    }

    public function logout(){

        Auth::logout();
        return redirect('login');

    }

    public function newPost(Request $request): RedirectResponse
    {
        //↓バリデーション
        $request->validate([
            'post_create' => 'required|min:1|max:150',
        ]);

        //↓投稿内容を変数に入れる
        $post = $request->input('post_create'); //Form::textareaから
        // $user_id = $request->input('new-post');
        //↓のAuth::user()->idから値をもらうため、Formから値をもらう必要がなくなった

        // ↓投稿
        Post::create([
            'post' => $post,
            // ポストカラムにフォームからの変数(値)を受け取る
            'user_id' => Auth::user()->id
        ]);

        return back();

    }

    public function delete ($id){
        Post::where('id',$id)->delete();
        // ↑post DBの'id'カラムから選択した$idを削除
        return redirect('/top');
        // メソッド発動したら'top'のリレーション発動。'top'リレーションはtopページ表示。
    }

    public function updatePost(request $request){

        $request->validate([
            'update_post' => 'required|min:1|max:150',
        ]);

        $id = $request->input('update_id');
        $update_post = $request->input('update_post');

        Post::where('id',$id)->update([
            'post' => $update_post,
        ]);

        return redirect('/top');

    }

}
