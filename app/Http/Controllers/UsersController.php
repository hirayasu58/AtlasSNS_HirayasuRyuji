<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function search(Request $request){

        $keyword = $request->input('keyword');

        if(!empty($keyword)){
            $users = User::where('username','like', '%'.$keyword.'%')->get();
            // ↑ユーザーネームのあいまい検索
        }else{
            $users = User::all();
        }

        return view('users/search',['users'=>$users],['keyword'=>$keyword]);
        // ['users'=>$users]＝検索結果表示に
        // ['keyword'=>$keyword]＝検索ワード表示に使用

    }

    public function profile(){

        return view('profiles/profile');

    }

    public function updateProfile(Request $request){
        $id = $request->input('id');
        // $icon_image = $request->input('icon_image');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');

        $filename = $request->file('icon_image')->getClientOriginalName();
        // getClientOriginalName()←その画像についてる名前を取得する
        $request->file('icon_image')->storeAs('/public', $filename);
        // 任意でタイトルを入れて保存。（↑getClientOriginalName()使えば元々のタイトルを入れられる）

        User::where('id',$id)->update([
            'icon_image' => $filename,
            'username' => $username,
            'email' => $mail,
            'password' => Hash::make($request->password),
            'bio' => $bio,
        ]);

        return redirect('/top');
    }

}
