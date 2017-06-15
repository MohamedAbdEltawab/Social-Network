@extends('profile.profile')
@section('cont')

<div class="row">
    <div class="profilecontent">
        <div class="col-md-12">
           <div class="intro">
                <div class="panel panel-default">
                    <div class="panel-heading">About</div>
                    <div class="panel-body">
                        <ul>
                            <li>{{$user->name}}</li>
                            <li>{{$user->work}}</li>
                            <li>{{$user->birthday}}</li>
                            <li>{{$user->education}}</li>
                            <li>{{$user->country}}</li>
                            <li>{{$user->relation}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection