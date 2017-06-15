<?php

namespace App\Http\Controllers;

use App\User;

use App\Friend;

use App\Post;

use Illuminate\Http\Request;

class UseraccountController extends Controller
{


    
    public function __construct()
    {
        $this->middleware('auth');
    }

    //============================  Get users account   ==============================

    public function getAccount($id)
    {
        $user = User::find($id);

        $friends = Friend::all();
        
        return view('account.timeline', compact('user', 'friends'));
    }

    //============================  Get users About     ==============================

    public function getUserAbout($id)

    {

        $user = User::find($id);

        return view('account.about', compact('user'));
    }

    //===========================   Get User Friend     =============================

    public function getUserFriends($id)
    {

        $friends = Friend::all();

        $user = User::find($id);

        return view('account.friends', compact('friends', 'user'));
    }
}
