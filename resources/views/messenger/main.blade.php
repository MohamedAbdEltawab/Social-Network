@extends('layouts.app')

@section('content')



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
                    	New message
                    </div>

                    <div class="panel-body" style="padding: 0; background: #DDD">
                    	<div class="chat" style="padding: 10;">
                    		
                			
                    		
                    	</div>
                    	<input type="text" class="form-control send" placeholder="Write a Message" >
                    	

                    </div>

                </div>
               
               
                
            </div>    
        </div>              
    </div>
</div>
@include('friendside')


@endsection



