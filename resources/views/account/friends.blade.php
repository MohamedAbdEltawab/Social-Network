@extends('account.account')

@section('center')

<div class="row">
    <div class="profilecontent">
        <div class="col-md-12">
           <div class="intro">
                <div class="panel panel-default">
                    <div class="panel-heading">Friends</div>
                    <div class="panel-body">
            			@if(isset($friends))
                			@foreach($friends as $friend)

		                        <div class="friends">
			                        @if($friend->sender_id == $user->id)
			                      
			                            @if($friend->receiver_id != null)
			                                @php
			                                    $userR = App\User::find($friend->receiver_id)
			                                @endphp

			                                @if(isset($userR->personalphoto))

			                                	<img src="{{url('/upload/personal/'.$userR->personalphoto)}}" style="width: 100px;height: 100px;">

			                                @else

			                                	<img src="{{url('images/man_icon.jpg')}}" style="width: 100px;height: 100px;">

			                                @endif

			                                	{{$userR->name}}

			                            @endif

			                        @endif
		                        

		                          	@if($friend->receiver_id == $user->id)

		                                @php
		                                    $userS = App\User::find($friend->sender_id);
		                                @endphp

		                                @if(isset($userS->personalphoto))
		                                	<img src="{{url('/upload/personal/'.$userS->personalphoto)}}" style="width: 100px;height: 100px;">
		                                @else
		                                	<img src="{{url('images/man_icon.jpg')}}" style="width: 100px;height: 100px;">
		                                @endif

		                                {{$userS->name}}
		                          	@endif
		                          
		                          </div>
            				@endforeach
            			@else
				            <div>
				              
				            </div>
            			@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection