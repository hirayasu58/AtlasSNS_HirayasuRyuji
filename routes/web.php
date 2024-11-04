<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



require __DIR__ . '/auth.php';

// group=接頭部の共通化や、一括して複数のルートに適応させる。
Route::middleware('user')->group(function () {

    Route::get('top', [PostsController::class, 'index'])-> name('index');
    // ↑ headerのリンクを使えるようにする。name'index'を用意。TOPページの表示

    Route::get('profile', [ProfileController::class, 'profile'])-> name('profile');
    // ↑プロフィールページの表示

    Route::get('users/search', [UsersController::class, 'search'])-> name('search');
    // ↑検索ページ表示

    Route::get('followList', [FollowsController::class, 'followList'])-> name('follow');
    Route::get('followerList', [FollowsController::class, 'followerList'])-> name('follower');

    Route::post('posts/index', [PostsController::class,'newPost'])->name('new_post');
    // ↑投稿の登録処理

    Route::get('post/{id}/delete', [PostsController::class,'delete'])->name('delete');
    // ↑postsではなくpost。ゴミ箱アイコン押されるとdeleteメソッド発動

});

//ログアウト中のページはauth.phpに、ログイン中のページはweb.phpに記述。
