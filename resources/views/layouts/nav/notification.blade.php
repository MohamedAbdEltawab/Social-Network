                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-globe" aria-hidden="true">
                                <span class="not">
                                    
                                        

                                            
                                            {{count(Auth::user()->unreadNotifications)}}
                                    

                                </span>
                           
                            </i>

                        </a>

                        <ul class="dropdown-menu notifications" role="menu">
                    @if(isset(Auth::user()->notifications))
                        <p style="border-bottom: 1px solid #EEE;padding: 6px">Notifications</p>
                        @foreach(Auth::user()->notifications as $notification)
                                
                            @if($notification->type == 'App\Notifications\PostNewNotification')

                                @include('notifications.' . snake_case(class_basename($notification->type)))

                            @endif

                        @endforeach
                    @endif
                        </ul>
                    </li>