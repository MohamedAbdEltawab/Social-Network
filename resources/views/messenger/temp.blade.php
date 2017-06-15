@if($mm->user_from == auth()->user()->id)
    <div class="auth">
		@if(isset(auth()->user()->personalphoto))
			<img src="{{url('/upload/personal/'.auth()->user()->personalphoto)}}" style="width: 35px;height: 35px;" class="img-circle">
	 		@else
			<img src="{{url('images/man_icon.jpg')}}" style="width: 35px;height: 35px;" class="img-circle">

			@endif
        <div class="message">

                
				{{$mm->message}}
        </div><br>
        <span style="font-size: 10px;margin-left: 40px">{{$mm->created_at->diffForHumans()}}</span>
		</div>
	
@endif

@if($mm->user_from == $user->id)
     <div class="user">
     	@if(isset($user->personalphoto))
			<img src="{{url('/upload/personal/'.$user->personalphoto)}}" style="width: 35px;height: 35px;" class="img-circle">
	 		@else
			<img src="{{url('images/man_icon.jpg')}}" style="width: 35px;height: 35px;" class="img-circle">

			@endif

        <div class="message">			              	                    
				{{$mm->message}}

        </div><br>
        <span style="font-size: 10px;margin-right: 40px">{{$mm->created_at->diffForHumans()}}</span>
     </div>
	
@endif