<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Friend;

use App\Message;

use App\User;

use DB;

use App\Conversation;

class MessengerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //=================== get messenger Main Page   ======================

    public function getMessenger()
    {
    	$friends = Friend::all();
    	$messages = Message::all();
    	return view('messenger.main', compact('friends', 'messages'));
    }

    //=================== get messenger User Page   ======================

    public function getMessageUser($userid)
    {
        $friends = Friend::all();
        $user = User::find($userid);

        return view('messenger.conversation', compact('friends', 'user'));
    }

    //===================   Store Message   ==============================
    
    public function storeAjax(Request $request, $id)
    {

            $allconvers = Conversation::where('user_one', '=', auth()->user()->id)
                                                ->where('user_two', '=', $id)
                                                ->orWhere('user_one', '=', $id)
                                                ->where('user_two', '=', auth()->user()->id)->get();
            

            if(count($allconvers) == 0){

                $add = new Conversation;
                //$add = new Message;

                $add->user_one =  auth()->user()->id;

                $add->user_two = $id;
                $add->save();


                if ($add->save()) {
                
                    $addmessage = Message::create([

                        'user_from'         =>  auth()->user()->id,

                        'user_to'           =>  $id,

                        'conversation_id'   =>  $add->id,

                        'message'           =>  $request->input('msg')
                        ]);
                    // $addmessage = new Message;
                    // $addmessage->user_from = auth()->user()->id;
                    // $addmessage->user_to = $id;
                    // $addmessage->conversation_id = $add->id;
                    // $addmessage->message = $request->input('msg');
                    // $addmessage->save();

                    $result = view('temp', ['mm'=>$addmessage])->render();

                    return response()->json($result);
               

                }
                
            }else{

                $addmessage = Message::create([

                'user_from'         =>  auth()->user()->id,

                'user_to'           =>  $id,

                'conversation_id'   =>  $allconvers[0]->id,

                'message'           =>  $request->input('msg')
                ]);

                    // $addmessage = new Message;
                    // $addmessage->user_from = auth()->user()->id;
                    // $addmessage->user_to = $id;
                    // $addmessage->conversation_id = $allconvers[0]->id;
                    // $addmessage->message = $request->input('msg');
                    // $addmessage->save();

                    $user = User::find($id);

                $result = view('messenger.temp', ['mm' => $addmessage, 'user'=>$user])->render();

                return response()->json($result);
              
            }


    }



}
