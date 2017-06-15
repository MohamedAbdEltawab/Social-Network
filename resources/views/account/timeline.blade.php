@extends('account.account')


@section('center')


<div class="row">
    <div class="profilecontent">
        <div class="col-md-4">
            <div class="intro">
                <div class="panel panel-default">
                    <div class="panel-heading">Intro</div>

                    <div class="panel-body">
                        <ul>
                            <li>
                                <i class="fa fa-briefcase"></i>
                                 <span style="padding-left: 15px"></span>
                                 <a href="">{{$user->work}}</a>
                            </li>
                            <li>
                                <i class="fa fa-graduation-cap"></i>
                                <span style="padding-left: 15px"></span>
                                <a href="">{{$user->education}}</a>
                            </li>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <span style="padding-left: 15px"></span>
                                <a href="">{{$user->country}}</a>
                            </li>
                            <li>
                                 <i class="fa fa-calendar"></i>
                                 <span style="padding-left: 15px"></span>
                                 <a href="">{{$user->birthday}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        
            <div class="friendtimeline">
                <div class="panel panel-default">
                    <div class="panel-heading">Friends</div>

                    <div class="panel-body">
                        @if(isset($friends))
                            @foreach($friends as $friend)
                                @if($friend->sender_id == $user->id)
                                    @php
                                          
                                        $userR = App\User::find($friend->receiver_id);

                                    @endphp

                                    @if(isset($userR->personalphoto))

                                        <img src="{{url('/upload/personal/'.$userR->personalphoto)}}" style="width: 100px ;height: 100px;margin-right: 10px;margin-bottom: 10px">

                                    @else
                                        <img src="{{url('images/man_icon.jpg')}}" style="width: 100px;height: 100px;margin-right: 10px;margin-bottom: 10px" >

                                    @endif
                                      
                                @endif

                                @if($friend->receiver_id == $user->id)
                                
                                    @php
                                        $userS = App\User::find($friend->sender_id);
                                    @endphp

                                    @if(isset($userS->personalphoto))

                                        <img src="{{url('/upload/personal/'.$userS->personalphoto)}}" style="width: 100px;height: 100px;margin-right: 10px;margin-bottom: 10px">

                                    @else

                                        <img src="{{url('images/man_icon.jpg')}}" style="width: 100px;height: 100px;margin-right: 10px;margin-bottom: 10px">
                                        
                                    @endif

                                    
                                @endif

                            @endforeach
                        @endif
                      
                    </div>
                </div>
            </div>
        </div>
    </div>


        @include('account.posts')


</div>

    
    
  
@endsection