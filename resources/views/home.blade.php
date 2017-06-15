@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 homecontent">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="personimage">

                        @if(isset(auth()->user()->personalphoto))

                            <img src="{{url('/upload/personal/'.auth()->user()->personalphoto)}}" style="width: 100%;height: 100%" class="img-circle">

                        @else

                        <img src="{{url('images/man_icon.jpg')}}" style="width: 100px;height: 100px" class="img-circle">

                        @endif

                    </div>

                    <div class="backimage">
                    @if(isset(auth()->user()->backgroundphoto))
                        <img src="{{url('/upload/background/'.auth()->user()->backgroundphoto)}}" style="width: 100%;height: 90px">
                    @endif
                    </div>

                    <div class="username">
                        
                        {{$user->name}}

                    </div>
                </div>
                <a href="{{url('messages')}}">Messages</a>
            </div>


            <div class="col-md-8 pull-right">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a Post</div>

                    <div class="panel-body">
                       <form action="{{url('home/posts/'. $user->id ) }}" method="POST">

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
               
                @include('posts')
                
            </div>    
        </div>              
    </div>
</div>

                @include('friendside')


@endsection
