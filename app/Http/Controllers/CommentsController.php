<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

class CommentsController extends Controller
{

    //================  Store Comments      ===================
    
		
    	public function store($userid, $postid)
    	{
    		Comment::create([

    			'user_id' => $userid,
    			'post_id' => $postid,
    			'body' => request('comment')
    			]);
    		return back();
    	}
}
