 @foreach($user->posts->sortByDesc('id') as $post)

                   
    
        <div class="panel panel-default">
            <div class="postimage">
                @php
                    $id = $post->user_id;
                    $user = App\User::find($id);
                    $user->personalphoto; 
                @endphp

                @if(isset($user->personalphoto))
                    <img src="{{url('/upload/personal/'.$user->personalphoto)}}" style="width: 50px;height: 50px;">

                    @else

                    <img src="{{url('images/man_icon.jpg')}}" style="width: 50px;height: 50px;">

                @endif
            </div>

            <div class="name">
                @php
                    $id = $post->user_id;
                    $user = App\User::find($id);
                    echo $user->name;

                @endphp

                <span class="posttime">{{$post->created_at->diffForHumans()}}</span>
               
            </div>
        
            <div class="content">

                {{ $post->body}}

            </div>
            
           <div id="plus"></div>

            <div class="react">

                <button type="button" data-toggle class="like  btn btn-primary"><i class="fa fa-thumbs-up"></i> &nbsp;
                    Like
                </button> 

                <button type="button" class="btn btn-primary"><i class="fa fa-comment"></i> &nbsp;
                    Comment
                </button>

            </div>
          
        
                
            @include('profile.comment')
                        
        </div>
   
@endforeach