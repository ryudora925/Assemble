<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Utilities;
class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->band_flag = $request->band_flag;
        
        $user->save();

        return redirect('complete');
    }

    public function index()
    {
        $user_id = Auth::id();
        $user_info = Auth::user();
        $person_info = Profile::select('*')->find($user_id);
        //dd($user_id,$user_info->part,$person_info);
        return view('profile',['user_info' => $user_info,'person_info' => $person_info]);
    }

    //public function savePerson(Request $request) {
    //    Fight::crete([
    //        'name' => $request->name,
    //    ])
    //    return redirect;
    //}

}