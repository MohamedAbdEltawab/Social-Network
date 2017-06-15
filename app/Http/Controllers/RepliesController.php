<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reply;

class RepliesController extends Controller
{


    //===================   Store Replies     ==================
    
    	public function store($userid, $postid, $commentid)
    	{
    		Reply::create([

    			'user_id'	 => $userid,
    			'post_id'	 => $postid,
    			'comment_id'	 => $commentid,
    			'body'		 => request('reply')

    			]);

    		return back();
    	}
}
