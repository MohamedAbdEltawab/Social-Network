@extends('profile.profile')

@section('cont')

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

                                @if($friend->sender_id == auth()->user()->id)

                                    @php
                                        $userR = new App\User;
                                        $userR = App\User::find($friend->receiver_id);
                                    @endphp

                                    @if(isset($userR->personalphoto))

                                        <img src="{{url('/upload/personal/'.$userR->personalphoto)}}" style="width: 100px;height: 100px;">
                                    @else
                                        <img src="{{url('images/man_icon.jpg')}}" style="width: 100px;height: 100px;">

                                    @endif
                                  
                                @endif

                                @if($friend->receiver_id == auth()->user()->id)
                                      
                                    @php
                                        $userS = App\User::find($friend->sender_id);
                                    @endphp

                                    @if(isset($userS->personalphoto))

                                      <img src="{{url('/upload/personal/'.$userS->personalphoto)}}" style="width: 100px;height: 100px;">
                                    @else

                                      <img src="{{url('images/man_icon.jpg')}}" style="width: 100px;height: 100px;">

                                    @endif
                                      
                                @endif

                            @endforeach

                        @endif
                      
                      </div>
                    </div>
                </div>
            </div>
        
   

        <div class="col-md-8 pull-right">
            <div class="timeline">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a Post</div>

                    <div class="panel-body">
                       <form action="{{url('home/posts/'. Auth()->user()->id ) }}" method="POST">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <textarea name="text" class="form-control" placeholder="What's on your mind ?"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Post</button>
                            </div>
                       </form>
                    </div>
                </div>

                @include('profile.posts')

            </div>
        </div>
        
        
    </div>
</div>



  
@endsection