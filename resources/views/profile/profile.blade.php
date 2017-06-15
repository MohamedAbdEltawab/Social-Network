@include('layouts.header')
    

    @include('layouts.nav.nav')

    <style>
        .navbar{
            margin-bottom: 0;
        }
    </style>

<div class="container">

    <div class="profile ">

        <div class="profileimage" style="width: 165px;height: 165px">
        
            @if(isset(auth()->user()->personalphoto))

                <img src="{{url('/upload/personal/'.auth()->user()->personalphoto)}}" style="width: 100%;height: 100%; padding: 3px" alt="profile">
            @else

                <img src="{{url('images/man_icon.jpg')}}" style="width: 100%;height: 100%; padding: 3px">

            @endif

            <form method="POST" enctype="multipart/form-data" action="{{url('profile/'.auth()->user()->id.'/personal')}}" style="position: absolute;">
                  {{ csrf_field() }}
                <input type="file" name="photo"/>
                <input type="submit" value="upload">
            </form>
        
        </div>

        <div class="background">
        
            @if(isset(auth()->user()->backgroundphoto))
                <img src="{{url('/upload/background/'.auth()->user()->backgroundphoto)}}" style="width: 100%;height: 100%">
            @endif
        

            <form method="POST" enctype="multipart/form-data" action="{{url('profile/'.auth()->user()->id.'/background')}}">
                  {{ csrf_field() }}
                <input type="file" name="photo"/>
                <input type="submit" value="upload">

                @if (count($errors) > 0)

                    <div class="alert alert-danger">
                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>
                    </div>

                @endif
            </form>

        </div>

        <div class="subnav">

            <ul>
                <li><a href="{{url('profile/'. Auth()->user()->id)}}">Timeline</a></li>
                <li><a href="{{url('profile/'.Auth()->user()->id.'/about')}}">About</a></li>
                <li><a href="{{url('profile/'.Auth()->user()->id.'/friends')}}">Friends</a></li>
                <li><a href="">Photos</a></li>
            </ul>
        </div>

        @yield('cont')


    </div>
</div>
@include('friendside')

@include('layouts.footer')
