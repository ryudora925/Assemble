<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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

    //public function savePerson(Request $request) {
    //    Fight::crete([
    //        'name' => $request->name,
    //    ])
    //    return redirect;
    //}

}