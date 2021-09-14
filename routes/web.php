<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\profile_edit_Controller;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\chatlistController;

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

Route::get('/', function () {
    return view('sign-in');
});

Route::get('/sign-up',function(){
    return view('sign-up');
});

Route::get('/sign-up-band',function(){
    return view('sign-up-band');
});

Route::get('complete',function(){
    return view('complete');
});

//ログアウト画面へ
Route::get('/logout',[LogoutController::class,'logout']);

/*Route::get('/logout',function(){
    return view('/logout');
});*/

Route::get('profile',[UserController::class,'index'])->name('profile.index');
Route::get('profile-band',[UserController::class,'index'])->name('profile.index');

Route::get('/other-profile/{id}',[UserController::class,'others_index'])->name('others-profile.index');

Route::get('search-band',function(){
    return view('search-band');
});

Route::get('search',function(){
    return view('search');
});

//ユーザ一覧/
Route::get('/player',[PlayerController::class,'player']);

Route::post('/user/profile', [UserController::class, 'store'])->name('profile');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::get('/profile_edit', [profile_edit_Controller::class, 'index'])->name('profile_edit');
Route::post('/profile_edit_store', [profile_edit_Controller::class, 'profile_edit_store'])->name('profile_edit_store');
Route::get('/profile-band_edit', [profile_edit_Controller::class, 'index'])->name('band_edit');
Route::post('/profile-band_edit_store', [profile_edit_Controller::class, 'band_edit_store'])->name('profile-band_edit_store');

Route::get('/chat_list',[chatlistController::class, 'index']);