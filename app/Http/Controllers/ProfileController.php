<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\profile;
//use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $user_id = Auth::id();
        $user_info = Profile::select('*')->find($user_id);
        return view('profile',['user_info' => $user_info]);
    }
}

