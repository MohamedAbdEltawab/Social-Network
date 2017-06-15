@extends('layouts.app')

    <style>
        .navbar{
            margin-bottom: 0;
        }
    </style>
@section('content')


<div class="container">

    <div class="profile">

        <div class="profileimage" style="width: 165px;height: 165px">
            @if(isset($user->personalphoto))

                <img src="{{url('/upload/personal/'.$user->personalphoto)}}" style="width: 100%;height: 100%; padding: 3px">
            @else

                <img src="{{url('images/man_icon.jpg')}}" style="width: 100%;height: 100%; padding: 3px">
                
            @endif
        
            {{$user->name}}
      
        </div>

        <div class="background" >

            <img src="{{url('/upload/background/'.$user->backgroundphoto)}}" style="width: 100%; height: 100%">

        </div>

        <div class="subnav">

            <ul>

                <li><a href="{{url('account/'.$user->id)}}">Timeline</a></li>

                <li><a href="{{url('account/'.$user->id.'/about')}}">About</a></li>

                <li><a href="{{url('account/'.$user->id.'/friends')}}">Friends</a></li>

                <li><a href="">Photos</a></li>

            </ul>

        </div>

        
        @yield('center')


    </div>
    
</div>

@include('friendside')

@endsection
