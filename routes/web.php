<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\profile_edit_Controller;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\chatlistController;
use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ログイン画面(ホーム画面)
Route::get('/', function () {
    return view('sign-in');
})->name('sign-in');

//新規登録画面
Route::get('/sign-up',function(){
    return view('sign-up');
});

//新規登録画面(バンド)
Route::get('/sign-up-band',function(){
    return view('sign-up-band');
});

//登録完了画面
Route::get('complete',function(){
    return view('complete');
});

//ログアウト画面へ
Route::get('/logout',[LogoutController::class,'logout']);

//ユーザ情報登録
Route::post('/user/profile', [UserController::class, 'store'])->name('profile');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/post_chat', [ChatController::class, 'chat_store'])->name('chat_store');
Route::post('/post_other_chat', [ChatController::class, 'other_chat_store'])->name('other_chat_store');

//middlewareグループ化 ログイン後放置でログイン画面にリダイレクト
Route::middleware(['auth'])->group(function(){
    //ユーザ一覧
    Route::get('/player', [PlayerController::class, 'player']);
    //絞り込み画面
    Route::get('search', function(){
        return view('search');
    });

    //マイページ画面(個人)
    Route::get('profile',[UserController::class,'index'])->name('profile.index');
    //マイページ編集画面(個人)
    Route::get('/profile_edit', [profile_edit_Controller::class, 'index'])->name('profile_edit');
    //マイページ編集クラス(個人)
    Route::post('/profile_edit_store', [profile_edit_Controller::class, 'profile_edit_store'])->name('profile_edit_store');

    //マイページ画面(バンド)
    Route::get('profile-band',[UserController::class,'index'])->name('profile.index');
    //マイページ編集画面(バンド)
    Route::get('/profile-band_edit', [profile_edit_Controller::class, 'index'])->name('band_edit');
    //マイページ編集クラス(バンド)
    Route::post('/band_edit_store', [profile_edit_Controller::class, 'band_edit_store'])->name('band_edit_store');
    
    //自分以外の登録者のマイページ画面
    Route::get('/other-profile/{id}',[UserController::class,'others_index'])->name('others-profile.index');

    //チャットリスト
    Route::get('/chat_list', [chatlistController::class, 'index']);

});