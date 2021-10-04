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
        $chat_list = chatlist::where('talk_list.user_id' , $user['id'])->join('users', 'users.id', '=', 'talk_list.write_user_id')
            ->leftJoin('band_info', 'band_info.user_id', '=', 'talk_list.write_user_id')
            ->leftJoin('person_info', 'person_info.user_id', '=', 'talk_list.write_user_id')
            ->join('chat', 'chat.write_user_id', '=', 'talk_list.write_user_id')
            ->select('talk_list.updated_at as chat_time', 'users.id', 'users.name', 'band_info.area as band_area','person_info.area as person_area', 'chat.message')->get();
        
        return view('/chat_list' ,  compact('chat_list' , 'user'));
        
    }
}