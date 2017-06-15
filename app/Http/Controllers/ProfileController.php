<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Friend;

use App\Post;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    //======================== Get Profile Page to Auth User ======================

     public function getProfile($id)
    {

        $user = User::find($id);

        $posts = Post::all();

        $friends = Friend::all();

        return view('profile.timeline', compact('user', 'posts', 'friends'));

    }

    //======================== Get About Page to Auth User ========================

    public function getAbout($id)
    {
        $user = User::find($id);

        return view('profile.about', compact('user'));

    }

    //======================== Get friends Page to Auth User ======================


    public function getFriends($id)
    {
        $user = User::find($id);
        
        $friends = Friend::all();
        
        return view('profile.friends', compact('user', 'friends', 'id'));
    }

    //=========================  Store Background Picture  =============================

    public function storeBackground(Request $request, $id, User $user)
    {

           $this->validate($request, [
            'photo' => 'required|mimes:jpeg,jpg,bmp,png',
          
            ]);


            $userupdate = User::find($id);

            if($request->hasFile('photo'))
            {

            @unlink(public_path().'/upload/background'.$userupdate->backgroundphoto);
            
            $file     = $request->file('photo');
            $path     = public_path().'/upload/background';
            $filename = time().'.'.$file->getClientOriginalExtension();
            }
            
            if($file->move($path, $filename))
            {
                $userupdate->backgroundphoto = $filename;
            }

            $userupdate->update($request->all());
            return back();
    
    }


    //=========================  Store Profile Picture  =============================

    public function storePersonal(Request $request, $id, User $user)
    {

            $this->validate($request, [
                'photo' => 'required|mimes:jpeg,jpg,bmp,png',
              
                ]);

            $userupdate = User::find($id);

            if($request->hasFile('photo'))
            {

            @unlink(public_path().'/upload/personal'.$userupdate->personalphoto);
            
            $file     = $request->file('photo');
            $path     = public_path().'/upload/personal';
            $filename = time().'.'.$file->getClientOriginalExtension();
            }
            if($file->move($path, $filename))
            {
                $userupdate->personalphoto = $filename;
            }

            $userupdate->update($request->all());

            return back();
    }
}
