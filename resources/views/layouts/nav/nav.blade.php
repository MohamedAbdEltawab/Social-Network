<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', '') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
            @if (!Auth::guest())
            <form class="navbar-form navbar-left" action="{{url('search/')}}" method="POST">
                    {{ csrf_field() }}
                <div class="form-group">
                  <input type="text" name="query" class="form-control" placeholder="Search" style="width: 420px" required>
                </div>
                
            </form>
            @endif


            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li><a href="{{url('profile/'. Auth()->user()->id)}}">
                        @if(isset(auth()->user()->personalphoto))
                            <img src="{{url('/upload/personal/'.auth()->user()->personalphoto)}}" style="width: 24px;height: 24px;display:inline-block;border-radius: 3px;margin-right: 5px">
                        @else
                            <img src="{{url('images/man_icon.jpg')}}" style="width: 24px;height: 24px;display:inline-block;border-radius: 3px;margin-right: 5px">
                        @endif

                            {{ auth::user()->name }}

                        </a>
                    </li>
                    <li>
                         <a href="{{url('home')}}"><i class="fa fa-home"></i></a>
                    </li>

                    

                        @include('layouts.nav.messages')

                        @include('layouts.nav.friendRequest')

                        @include('layouts.nav.notification')



                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                        
                        <li>

                        <a href="{{url('settings/'. auth::user()->id)}}">Settings</a>
                        </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>