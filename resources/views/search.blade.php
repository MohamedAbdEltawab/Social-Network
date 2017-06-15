@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">

    	@foreach($users as $user)

		<div class="search">
		
    		<div class="img">

    			@if(isset($user->personalphoto))
    				<img src="{{url('/upload/personal/'.$user->personalphoto)}}" style="width: 100px;height: 100px;border-radius: 5px">
    			@else
    				<img src="{{url('images/man_icon.jpg')}}" style="width: 100px;height: 100px;border-radius: 5px">
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
				
				<p>
				{{$user->work}}	
				</p>
			
			</div>	


			@if($user->id == Auth()->user()->id)

				<button hidden></button>

			@else
					@php

							$friends = App\Friend::where('sender_id', '=', $user->id)
													->where('receiver_id', '=', auth()->user()->id)
													->where('status', '=', 1)
													->orWhere('sender_id', '=', auth()->user()->id)
													->where('receiver_id', '=', $user->id)
													->where('status', '=', 1)->count();


							$friendRequest = App\Friend::where('sender_id', '=', $user->id)
															->where('receiver_id', '=', auth()->user()->id)
															->where('status', '=', 0)
															->orWhere('sender_id', '=', auth()->user()->id)
															->where('receiver_id', '=', $user->id)
															->where('status', '=', 0)->count();

					@endphp
							@if($user->id == ($friends == true))
								<button style="float: right; margin-top: 40px;margin-right: 16px;">
									friend
								</button>
							@elseif($user->id == ($friendRequest == true))
								<button style="    float: right; margin-top: 40px;margin-right: 16px;">Request</button>
							@else
							<form method="POST" action="{{url('request/friend/'.$user->id)}}">
										{{ csrf_field() }}
								<button class='btn btn-success' style="float: right; margin-top: 40px;margin-right: 16px;">
									<i class="fa fa-user-plus" aria-hidden="true">Add friend</i>				
								</button>
							</form>	
							@endif
		                  	

					
						
			@endif
		 
				
			
		</div>


		
    	
    	@endforeach


    	{{ $users->links() }}
	</div>
</div>


@endsection