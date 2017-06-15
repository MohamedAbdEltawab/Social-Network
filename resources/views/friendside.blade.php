<div class="friendside">
    @if(isset($friends))

        @foreach($friends as $friend)

            @if($friend->sender_id == auth()->user()->id and $friend->status == 1)

                @php
                    $userR = new App\User;
                    $userR = App\User::find($friend->receiver_id);
                @endphp

                <div class="user">
                    @if(isset($userR->personalphoto))

                
                        <img src="{{url('/upload/personal/'.$userR->personalphoto)}}" style="width: 35px;height: 35px;">
                    @else
                        <img src="{{url('images/man_icon.jpg')}}" style="width: 35px;height: 35px;">

                    @endif 
                    <span>{{$userR->name}}</span>
                </div>

              
            @endif

            @if($friend->receiver_id == auth()->user()->id and $friend->status == 1)
                  
                @php
                    $userS = App\User::find($friend->sender_id);
                @endphp
                 <div class="user">
                    @if(isset($userS->personalphoto))
                       
                          <img src="{{url('/upload/personal/'.$userS->personalphoto)}}" style="width: 35px;height: 35px;">
                        @else

                          <img src="{{url('images/man_icon.jpg')}}" style="width: 35px;height: 35px;">
                 
                        
                    @endif
                   <span>{{$userS->name}}</span>
                </div>
                  
            @endif

        @endforeach

    @endif
</div>