<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Follow;
use App\Models\User;
use App\Models\Post;

class FollowsController extends Controller
{
    //
    public function followList(){
        // フォローしているユーザーのidを取得

        $posts = Post::get();

        $following_id = Auth::user()->following()->pluck('followed_id');

        $followings = User::whereIn('id', $following_id)->get();

        // $posts = Post::with('user')->where('id' , $following_id)->get();

        return view('follows.followList', compact('followings','posts'));
    }

    public function followerList(){
        return view('follows.followerList');
    }

    public function follow(request $request) //フォローする時のメソッド
    {
        $userId = Auth::id(); //フォローボタンを押したユーザー(自分)
        $followerId = $request->input('follow_id'); //選択されてボタンを押されたユーザー(相手)

        Follow::create([
            'following_id' => $userId, //フォローする側(自分)
            'followed_id' => $followerId, //フォローされる側(相手)
        ]);

        return redirect('users/search');
    }

    public function un_follow(request $request) //フォロー外す時のメソッド
    {
        $userId = Auth::id();
        $followerId = $request->input('un_follow_id');

        Follow::where([
            'following_id' => $userId,
            'followed_id' => $followerId,
        ])->delete();

        return redirect('users/search');
    }
}
