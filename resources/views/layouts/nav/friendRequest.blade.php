                     <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-users" aria-hidden="true">

                                <span class="friendnot">

                                </span>
                            </i>
                        </a>

                        <ul class="dropdown-menu friendrequest" role="menu">
                         
                            @if(isset(Auth::user()->notifications))
                                <p style="border-bottom: 1px solid #EEE;padding: 6px">Friend Requests</p>
                                @foreach(Auth::user()->notifications as $not)

                                    @if($not->type == 'App\Notifications\AddFriend')
                                        @include('notifications.' . snake_case(class_basename($not->type)))
                                        
                                    @endif

                                @endforeach
                                            
                            @endif     
                        
                        </ul>
                    </li>