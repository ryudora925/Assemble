<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonInfo;
use App\Models\BandInfo;
use App\Models\chatlist;

class chatlistController extends Controller
{
    
    public function index(Request $request)
    { 
        $user = \Auth::user();
        $chat_list = chatlist::where('user_id' , $user['id'])->with('user')->get();
        dd($chat_list);
        // return view('/chat_list' ,  compact('chat_list' , 'user'));
        
        
        
        // $chatlist = chatlist::updateOrCreate(
        //     ['user_id' => \Auth::id()]
        //     // ['write_user_id' => ]
        // );
        
        
        
    }
    
    
    
}
