<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\PersonInfo;
use App\Models\BandInfo;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Utilities;
class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = new User;

        //validation
        $validate = $request->validate([
            'name' => ['bail', 'required', 'string', 'unique:users'],
            'email' => ['bail', 'email', 'unique:users'],
            'password' => ['bail', 'required', 'confirmed']
        ]);

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
        //dd($user_info);
        if($user_info->band_flag == 1){
            $band_info = BandInfo::find($user_id);
            //dd($band_info);
            return view('profile-band',['user_info' => $user_info,'band_info' => $band_info]);
        }else{
            $person_info =  PersonInfo::select('*')->find($user_id);
            //dd($user_id,$user_info->part,$band_info);
            return view('profile',['user_info' => $user_info,'person_info' => $person_info]);
        }
    }

    public function others_index($id)
    {
        $user_info = User::find($id);

        if($user_info->band_flag == 1){
            $others_info = BandInfo::find($id);
            //dd($others_info);
            return view('other-profile-band',['user_info' => $user_info,'band_info' => $others_info]);
        }else{
            $others_info = PersonInfo::find($id);
            return view('other-profile',['user_info' => $user_info,'person_info' => $others_info]);
        }
    }
}