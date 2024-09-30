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
// Route::middleware('user')->group(function () {

    Route::get('top', [PostsController::class, 'index']);

    Route::get('profile', [ProfileController::class, 'profile'])-> name('profile');

    Route::get('search', [UsersController::class, 'index'])-> name('search');

    Route::get('followList', [FollowsController::class, 'followList'])-> name('follow');
    Route::get('followerList', [FollowsController::class, 'followerList'])-> name('follower');

    Route::get('index', [PostsController::class,'index'])-> name('index');
    // ↑ headerのリンクを使えるようにする。name'index'を用意。

// });

//ログアウト中のページはauth.phpに、ログイン中のページはweb.phpに記述。
