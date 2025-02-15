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

        $following_id = Auth::user()->following()->pluck('followed_id');
        // まず自分(ログインしてるユーザー)がフォローしてるユーザーのIDを取得
        // pluck()　該当する引数の値を全部取ってくる

        $followings = User::whereIn('id', $following_id)->get();
        // ↑から取得した値(ID)をusersテーブルから引っ張ってくる

        $follows_posts = Post::whereIn('user_id' , $following_id)->orderBy('created_at','desc')->get();
        // 自分がフォローしてるユーザーの投稿だけを表示。
        // Post::whereIn('user_id'　でpostsテーブルからユーザーの投稿、$following_idで自分がフォローしてるユーザーを引っ張る。
        //投稿日時は降順「->orderBy('created_at','desc')」

        return view('follows.followList', compact('followings','follows_posts'));
    }

    public function followerList(){
        // フォローされてるユーザーのidを取得

        $followed_id = Auth::user()->followed()->pluck('following_id');
        // まず自分(ログインしてるユーザー)をフォローしてるユーザーのIDを取得
        // pluck()　該当する引数の値を全部取ってくる

        $followed = User::whereIn('id', $followed_id)->get();
        // ↑から取得した値(ID)をusersテーブルから引っ張ってくる

        $followed_posts = Post::whereIn('user_id' , $followed_id)->orderBy('created_at','desc')->get();
        // 自分をフォローしてるユーザーの投稿だけを表示。
        // Post::whereIn('user_id'　でpostsテーブルからユーザーの投稿、$followed_idで自分をフォローしてるユーザーを引っ張る。
        //投稿日時は降順「->orderBy('created_at','desc')」

        return view('follows.followerList', compact('followed','followed_posts'));
    }

    public function follow(request $request) //フォローする時のメソッド
    {
        $userId = Auth::id(); //フォローボタンを押したユーザー(自分)
        $followerId = $request->input('follow_id'); //選択されてボタンを押されたユーザー(相手)

        Follow::create([
            'following_id' => $userId, //フォローする側(自分)
            'followed_id' => $followerId, //フォローされる側(相手)
        ]);

        return back();
    }

    public function un_follow(request $request) //フォロー外す時のメソッド
    {
        $userId = Auth::id();
        $followerId = $request->input('un_follow_id');

        Follow::where([
            'following_id' => $userId,
            'followed_id' => $followerId,
        ])->delete();

        return back();
    }

}
