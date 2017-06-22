
@foreach(App\Post::all()->sortByDesc('id') as $post)
            @php

            $id = $post->user_id;
            $user = App\User::find($id);

             @endphp
                               @if(isset($friends))
                                        @php
                                        $friends = App\Friend::where('sender_id', '=', $user->id)
                                                ->where('receiver_id', '=', auth()->user()->id)
                                                ->where('status', '=', 1)
                                                ->orWhere('sender_id', '=', auth()->user()->id)
                                                ->where('receiver_id', '=', $user->id)
                                                ->where('status', '=', 1)->count();
                                        @endphp
                                @endif
                                    
        

        @if($user->id == ($friends == true) or $user->id == auth()->user()->id)

            <div class="panel panel-default">

                <div class="postimage">
                  

                        @if(isset($user->personalphoto))
                            <img src="{{url('/upload/personal/'.$user->personalphoto)}}" style="width: 50px;height: 50px;">
                        @else
                            <img src="{{url('images/man_icon.jpg')}}" style="width: 50px;height: 50px;">
                        @endif
                </div>
                <div class="name">


                    @if($user->id == Auth()->user()->id)
                        <a href="{{url('profile/'. Auth()->user()->id)}}">
                            {{$user->name}}
                        </a>
                    @else
                        <a href="{{url('account/'.$user->id)}}">
                            {{$user->name}}
                        </a>
                    @endif

                     
                    <span class="posttime">{{$post->created_at->diffForHumans()}}</span>
                </div>
                
                <div class="content">
                    {{ $post->body}}
                </div>
                
               <div id="plus"></div>

                <div class="react">

                    <i class="fa fa-thumbs-o-up" aria-hidden="true"><a href=""><span>Like</span></a></i>
                    <i class="fa fa-comment" aria-hidden="true"><a href="">Comment</a></i>
                </div>
                  
                
                        
                @include('comments')
                 
                     
                     
               
                
            </div>

        @endif

@endforeach


