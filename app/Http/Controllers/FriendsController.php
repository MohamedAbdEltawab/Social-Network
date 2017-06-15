<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notifications\AddFriend;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\ChannelManager;

use App\Friend;

use Auth;

use App\User;

class FriendsController extends Controller
{

    //===================  Store User sender  =====================

    public function storeAsender(Request $request, $userid)
    {
        $allfriends = Friend::where('sender_id', '=', auth()->user()->id)
                              ->where('receiver_id', '=', $userid)
                              ->orWhere('sender_id', '=', $userid)
                              ->where('receiver_id', '=', auth()->user()->id)->count();
      
    	
            if($allfriends == 0)
            {
                $friend = Friend::create([

                'sender_id' => auth()->user()->id,

                'receiver_id' => $userid,

                'status'  => false

                ]);


              if($friend == true)
              {
                 $user = User::find($userid);

                   // $users->notify(new AddFriend($friend));
               \Notification::send($user, new AddFriend($friend));
                 
                }  
            }

        	return redirect('home');
    }


    //===================  Confirm Friend Request  =====================

    public function storeAreceiver($senderid)
    {
    	$friend = Friend::where('sender_id', $senderid)->get();

   		$id = $friend[0]['id'];

   		$friendupdate = Friend::find($id);

   		$friendupdate->update([
   				'status' => true
   			]);
   		
   		 return back();

    }
}
