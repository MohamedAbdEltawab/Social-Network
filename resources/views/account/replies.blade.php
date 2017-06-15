@foreach($comment->replies as $reply)
        @php
             
             $userid = $reply->user_id;
            $user = $user->find($userid)

        @endphp

        <div class="replyimage">

            @if(isset($user->personalphoto))

                <img src="{{url('/upload/personal/'.$user->personalphoto)}}" >

            @else

                <img src="{{url('images/man_icon.jpg')}}">

            @endif

        </div>

        <div class="replyname">

           {{$user->name }} 

        </div>
         
        
        <div class="replybody">

            {{$reply->body}}

        </div>

        <div class="replytime">

            {{$reply->created_at->diffForHumans()}}

        </div>

@endforeach

        <div class="reply">

            <div class="replyimage">

                @if(isset(auth()->user()->personalphoto))

                    <img src="{{url('/upload/personal/'.auth()->user()->personalphoto)}}">

                @else

                    <img src="{{url('images/man_icon.jpg')}}">

                @endif

            </div>

            <form action="{{url('replies/'. auth()->user()->id. '/'. $post->id. '/' . $comment->id)}}" method="POST">
                    {{ csrf_field() }}
                <input type="text" name="reply" placeholder="Write a reply">
                
            </form>
        </div>