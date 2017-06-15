

<li style="border-bottom: 1px solid #EEE">

		
		<a href="" class="{{$notification->read_at == null ? 'unread' : ''}}">
		{{$notification->markAsRead()}}


	@php

		$id = $notification->data['user_id'];

		$user = App\User::find($id);

	@endphp


	@if(isset($user->personalphoto))
        <img src="{{url('/upload/personal/'.$user->personalphoto)}}" style="width: 50pxpx;height: 50px;border-radius: 5px">
    @else
        <img src="{{url('images/man_icon.jpg')}}" style="width: 50px;height: 50px;border-radius: 5px">
    @endif

        {{$user->name}}

       
        <span style="margin: 20px">Update his Status</span>

        </a>

</li>