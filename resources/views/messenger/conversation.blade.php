@extends('layouts.app')


@section('content')
<?php

header('Content-Type: application/json');
?>


<div class="container">
    <div class="row">
        <div class="col-md-10 homecontent">
            <div class="col-md-4">
   				 <div class="panel panel-default">
                    <div class="panel-heading">Inbox</div>

                    <div class="panel-body" style="overflow: auto;">
						@if(isset($friends))

						        @foreach($friends as $friend)

						            @if($friend->sender_id == auth()->user()->id)

						                @php
						                    $userR = new App\User;
						                    $userR = App\User::find($friend->receiver_id);
						                @endphp

						                <a href="{{url('messages/'. $userR->id)}}">
							                <div class="user" style="border-bottom: solid 1px #DDD;margin-bottom: 10px;padding-bottom: 10px">
							                    @if(isset($userR->personalphoto))

							                
							                        <img src="{{url('/upload/personal/'.$userR->personalphoto)}}" style="width: 35px;height: 35px;">
							                    @else
							                        <img src="{{url('images/man_icon.jpg')}}" style="width: 35px;height: 35px;">

							                    @endif 
							                    <span>{{$userR->name}}</span>
						                	</div>
						                </a>

						              
						            @endif

						            @if($friend->receiver_id == auth()->user()->id)
						                  
						                @php
						                    $userS = App\User::find($friend->sender_id);
						                @endphp
						                	<a href="{{url('messages/'. $userS->id)}}">
						                	 	<div class="user" style="border-bottom: solid 1px #DDD;margin-bottom: 10px;padding-bottom: 10px">
								                    @if(isset($userS->personalphoto))
								                       
								                          <img src="{{url('/upload/personal/'.$userS->personalphoto)}}" style="width: 35px;height: 35px;">
								                        @else

								                          <img src="{{url('images/man_icon.jpg')}}" style="width: 35px;height: 35px;">
								                 
								                        
								                    @endif
								                   <span>{{$userS->name}}</span>
						                		</div>
						                	</a>
						                  
						            @endif

						        @endforeach

						    @endif
                    </div>

                </div>
                
            </div>


            <div class="col-md-8 pull-right">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    	{{$user->name}}
                    </div>

                    <div class="panel-body" style="padding: 0; background: #DDD">
                    	<div class="chat" style="padding: 10;overflow: auto;">
	                    	@php

		                    	$messages = App\Message::where('user_from', '=', auth()->user()->id)
			                    							->where('user_to', '=', $user->id)
			                    							->orWhere('user_from', '=', $user->id)
			                                          		 ->where('user_to', '=', auth()->user()->id)->get();

							@endphp

							@foreach($messages as $mm)

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
							@endforeach

                                        		
                    	</div>
                    	
                    		<input type="text" class="form-control send" placeholder="Write a Message">	

                    </div>

                </div>
            </div>    
        </div>              
    </div>
</div>

					@include('friendside')

<script src="{{ url('js/jquery-3.2.1.min.js') }}"></script>

			<script>

			        $(document).on('keydown', '.send', function(e){
			        var msg = $(this).val();
			        var element = $(this);
			        if(!msg == '' && e.keyCode == 13 && !e.shiftKey)
			        {
			            //$('.chat').append("<div class='alert alert-danger'>" + msg + "</div>");
			            $.ajax({
			                url:'{{"http://localhost:8000/addMessage/".$user->id}}',
			                type:'post',
			                data:{_token:'{{ csrf_field() }}', msg:msg},
			                success:function(data){
			                	//$('.chat').append("<div class='alert alert-danger'>" + data['msg'] + "</div>");
			                	$('.chat').append(data);
			                }


			            });
			            element.val('');
			        }
			    });

			        	// //var myVar = setInterval(function(){
					       //  $.ajax({
					       //  	url:'temp.blade.php',
					       //  	//cache:false,
					       //  	type:'get',
					       //  	success:function(data){
					       //  		for(var i =0; i < data.length; i++){
					       //  		$('.chat').append("<li>" + data[i].message + "</li>");
					       //  		}
					       //  	},
					       //  	error:function()
					       //  	{
					       //  		console.log("something went wrong");
					       //  	}
					       //  });
			        	// //}, 1000);

			        	
			</script>

@endsection
