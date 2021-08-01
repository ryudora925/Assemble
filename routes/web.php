<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlayerController;

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

Route::get('/profile',[ProfileController::class,'show']);

Route::get('profile-band',function(){
    return view('profile-band');
});

Route::get('search-band',function(){
    return view('search-band');
});

Route::get('search',function(){
    return view('search');
});

Route::get('/player',[PlayerController::class,'player']);

Route::post('/user/profile', [UserController::class, 'store'])->name('profile');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/registerPerson', [UserController::class, 'registerPerson']);
Route::get('/registerBand', [UserController::class, 'registerBand']);
Route::post('/savePerson', [UserController::class, 'savePerson'])->name('savePerson');
Route::post('/saveBand', [UserController::class, 'saveBand'])->name('saveBand');

