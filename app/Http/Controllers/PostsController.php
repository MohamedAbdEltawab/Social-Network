<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Friend;

use App\Post;

use Auth;

use App\Notifications\PostNewNotification;
use Illuminate\Notifications\Notifiable;

class PostsController extends Controller
{

	//====================   Store Post   =========================
    
    public function store($id)
    {
        
        	$this->validate(request(), [

                'text' => 'required'
            ]);

        	$post = Post::create([

        		'user_id' => $id,

        		'body' => request('text')

        		]);

            if($post){
             $users = User::all()->except(Auth::user()->id);

                
            \Notification::send($users, new PostNewNotification($post));
             
            }    

        	return back();

    }

}

