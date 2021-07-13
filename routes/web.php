<?php

use Illuminate\Support\Facades\Route;

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

Route::get('profile',function(){
    return view('profile');
});

Route::get('profile-band',function(){
    return view('profile-band');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
