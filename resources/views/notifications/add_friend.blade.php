<li style="border-bottom: 1px solid #EEE">
    
    <a href="" class="{{$not->read_at == null ? 'unread' : ''}}">
                {{$not->markAsRead()}}
        @php
            $user = new App\User;

            $id = $not->data['sender_id'];

            $user = $user->find($id);



            $friends = App\Friend::where('sender_id', '=', $user->id)
                                        ->where('receiver_id', '=', auth()->user()->id)
                                        ->where('status', '=', 1)
                                        ->orWhere('sender_id', '=', auth()->user()->id)
                                        ->where('receiver_id', '=', $user->id)
                                        ->where('status', '=', 1)->count();



        @endphp

        @if(isset($user->personalphoto))

            <img src="{{url('/upload/personal/'.$user->personalphoto)}}" style="width: 50pxpx;height: 50px;border-radius: 5px">

        @else

            <img src="{{url('images/man_icon.jpg')}}" style="width: 50px;height: 50px;border-radius: 5px">

        @endif


        {{$user->name}} <span style="font-size: 10px">Sent Friend Request</span>


        @if($user->id == ($friends == true))

            <button style="float: right;padding:5px;margin-right: 16px;">
                friend
            </button>
        @else
            <div class="form" style="float: right;padding:5px;margin-right: 16px;">
                <form action="{{url('confirm/'.$user->id)}}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-info" type="submit">Confirm</button>
                </form>
            </div>
        @endif

    </a>
</li>