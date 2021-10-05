<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use App\Models\chatlist;

class ChatController extends Controller
{
    public function mymessage()
    {
        $user_id = Auth::id();
        $user_info = Auth::user();
        //dd($user_info);
    }

    public function chat_store(Request $m_request)
    {
        //validation
        $validate = $m_request->validate([
            'post_user_id' => ['exists:users,id'],
            'message' => ['required', 'max:500']
        ]);

        //dd($m_request);
        $chat = new Chat;
        $user_info = Auth::user();

        $chat->post_user_id = $m_request->post_user_id;
        $chat->write_user_id = $user_info->id;
        $chat->message = $m_request->message;
        
        $chat->save();

        $chat_list = new chatlist;
        $chat_list->user_id = $user_info->id;
        $chat_list->write_user_id = $m_request->write_user_id;
        $chat_list->save();

        return redirect('profile');
    }

    public function other_chat_store(Request $m_request)
    {
        //validation
        $validate = $m_request->validate([
            'write_user_id' => ['exists:users,id'],
            'message' => ['required', 'max:500']
        ]);
        
        //dd($m_request);
        $chat = new Chat;
        $user_info = Auth::user();

        $chat->post_user_id = $user_info->id;
        $chat->write_user_id = $m_request->write_user_id;
        $chat->message = $m_request->message;
        
        $chat->save();

        $chat_list = new chatlist;
        $chat_list->user_id = $user_info->id;
        $chat_list->write_user_id = $m_request->write_user_id;
        $chat_list->save();
        
        return redirect('/other-profile/' . $m_request->write_user_id);
    }

}
