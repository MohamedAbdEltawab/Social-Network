<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\User;

use App\Comment;

use App\Reply;

use App\Friend;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    
    public function index(User $user)
    {
        
        
        $user = Auth()->user();

        
        $friends = Friend::all();
        
        return view('home', compact('user', 'friends'));
    }



    //======================== Get Setting Page to Auth User ======================

     public function getSettings($id)
    {

        $user = User::find($id);
  
        return view('settings', compact('user'));

    }


    //======================== Update Setting Page to Auth User ======================

    public function updateSettings($id, Request $request)
    {

        $userupdate = User::find($id);

        $userupdate->update($request->all());
        
        return back();

    }


    //================================   Search Page    ===============================

    public function search(Request $request)
    {

        $this->validate($request, [

            'query' => 'required',
        
        ]);

        $query = $request->input('query');

        $users = User::where('name', 'like', '%'. $query . '%')->paginate(10);

        $friends = Friend::all();
        
        return view('search', compact('users', 'friends'));

    }


    


    
}
