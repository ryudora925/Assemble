<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * ユーザーをアプリケーションからログアウトさせる
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        /*
        $logout = Auth::user();
        dd($logout);
        */

        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        return view('/logout');
    }
}
