<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * 
     * @return view
     */
    public function show()
    {
        return view('profile');
    }
}