<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // ↓書き換え可能にする。ユーザー(人)が変更するものを記入。今回は下の2つ
    protected $fillable = [
        'user_id',
        'post',
    ];
    // ※日付やidは自動で生成されるから記入なし

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    // userとのリレーション
}
