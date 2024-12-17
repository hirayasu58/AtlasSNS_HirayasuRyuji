<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
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

        $request->validate([
            'username' => 'required|min:2|max:12',
            'email' => 'required|min:5|max:40|unique:users,email|'.Auth::user()->email.'email',
            'password' => 'required|alpha_num|min:8|max:20|confirmed',
            'password_confirmation' => 'required|alpha_num|min:8|max:20',
            'bio' => 'max:150',
            'icon_image' => 'file|mimes:jpg,png,bmp,gif,svg',
        ]);


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
            //↑DBには画像のファイル名をそのまま入れる
            'username' => $username,
            'email' => $mail,
            'password' => Hash::make($request->password),
            'bio' => $bio,
        ]);

        return redirect('/top');
    }

}
