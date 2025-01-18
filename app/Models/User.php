<?php

namespace App\Models;
//場所で使用する際、ディレクトリで言ったら「app」だけど、namespaceで「App」に上書きしてるから、ディレクトリで使用する際は↑の頭文字大文字を使う。

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable //Authを継承してる
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function following() {
        return $this->belongsToMany('App\Models\User','follows','following_id','followed_id');
    }
    // フォロー→フォロワー
    //メソッド名は今回お互いuserだったから分けてるが、本来は相手のモデル名(相手が多だったら's'付ける)で大丈夫。

    public function followed() {
        return $this->belongsToMany(User::class,'follows','followed_id','following_id');
    }
    // フォロワー→フォロー
    // モデルの場所はクラス、ディレクトリどちらでも可。クラスの場合は''不要。

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
    // postとのリレーション

    public function isFollowing($user_id){
        return $this->following()->where('followed_id', $user_id)->exists();
        // User class内のfollowingメソッド(followsテーブルとリレーション済)呼び出して、followed_idに相手のID($user_id)があるかどうかの確認。existsを使って値が入っていたらtrue、入っていなかったらfalseを返す。
    }
    // フォローしているかどうか

    // public function isFollowed($user_id){
    //     return $this->followed()->where('following_id', $user_id)->exists();
    // }
    // フォローされているかどうか ※今んとこ使わない 1/13

}
