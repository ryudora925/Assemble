<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\profile_edit;

class profile_edit_Controller extends Controller
{
    /**
     * 個人プロフィール編集
     *
     * @param Request $request
     * @return Response
     */
    
    
    
    public function index(Request $request)
    { 
        return view('/profile_edit');
    }

    public function profile_edit_store(Request $request)
    {
        $posts = $request->all();
        // データの確認をするデバッグ関数
        // dd(\Auth::id());

        //POSTされた値をデータベースへ挿入
        $profile_edit = profile_edit::updateOrCreate(
            ['user_id' => \Auth::id()],
            ['part' => $posts['part'],
            'year' => $posts['year'],
            'area' => $posts['area'],
            'gender' => $posts['gender'],
            'song' => $posts['song'],
            'category' => $posts['category']
            ]
            // 'introduction' => 'song' => $posts['introduction']
        );
            return redirect('profile');
    }
}
