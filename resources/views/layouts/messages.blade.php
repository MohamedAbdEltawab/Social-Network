                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-comments-o" aria-hidden="true"></i>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            
                            <li>
                                <?php
                                $messages = App\Message::where('user_from', '=', auth()->user()->id)
                                                        ->orWhere('user_to', '=', auth()->user()->id)->get();

                                        foreach ($messages as $m) {
                                            if ($m->user_from == auth()->user()->id) {
                                                    
                                                    $dd = App\Message::where('user_to', '=', $m->user_to)->get();
                                                    foreach ($dd as $v) {
                                                        echo $v->message;
                                                    }
                                                    //echo $m->user_to;
                                                
                                                //echo $m->conversation_id;
                                            }
                                            // echo $m->user_from. "<br>";
                                            // echo $m->user_to. "<br>";
                                            // echo $m->message;
                                        }
                            ?>
                            </li>

                            <li>
                                <a href="">example</a>
                            </li>

                            <li>
                                <a href="">example </a>
                            </li>
                        </ul>
                    </li>
