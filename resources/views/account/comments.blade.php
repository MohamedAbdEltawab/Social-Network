<div class="comment">

     @foreach($post->comments as $comment)

            @php
                $id = $comment->user_id;
                $user = App\User::find($id);
            @endphp

            <div class="control">

                <div class="commentimage">
                    @if(isset($user->personalphoto))
                        <img src="{{url('/upload/personal/'.$user->personalphoto)}}">
                    @else
                        <img src="{{url('images/man_icon.jpg')}}">
                    @endif
                </div>

                <div class="commentname">

                   @php
                        $id = $comment->user_id;
                        $user = App\User::find($id);
                        echo $user->name;
                      
                    @endphp

                </div>

                <div class="commentbody">

                    {{ $comment->body }} 

                </div>

                <div class="commenttime">

                     {{$comment->created_at->diffForHumans()}}

                </div>

                <span><a href="">Reply</a></span>


                @include('account.replies')
             
           
            </div>

            <span class="clearfix"></span>

   @endforeach 

            <div class="inputcomment">
                   
                <div class="inputimage">

                    @if(isset(auth()->user()->personalphoto))

                        <img src="{{url('/upload/personal/'.auth()->user()->personalphoto)}}" style="width: 30px;height: 30px; border-radius: 3px">
                    @else
                        <img src="{{url('images/man_icon.jpg')}}" style="width: 30px;height: 30px; border-radius: 3px">

                    @endif

                </div>

                <form method="POST" action="{{url('comments/'. auth()->user()->id. '/'. $post->id)}}">
                        {{ csrf_field() }}

                   <input type="text" id="addcomment" name="comment" class="writecomment form-control" placeholder="Write a Comment">

                </form>
                
            </div>
</div>