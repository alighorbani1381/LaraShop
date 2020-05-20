        <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
        <a href="{{ route('home') }}" class="logo">بخش <span>مدیریت</span> فروشگاه</a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">

                    <!-- Ticket Part start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" title="خلاصه تیکت ها">
                            <i class="icon-ticket"></i>

                            @if($tickets['allTicket']->count() != 0)
                                <span class="badge" style="background-color: #8d17ee;">{{ $tickets['allTicket']->count() }}</span>
                            @endif

                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green" style="border-bottom-color: #8d17ee !important;"></div>
                            <li>
                                @if($tickets['allTicket']->count() != 0)
                                    <p class="green" style="background-color: #8d17ee;">شما ({{ $tickets['allTicket']->count() }}) تیکت جدید دارید</p>
                                @else
                                    <p class="green" style="background-color: #8d17ee;">تاکنون تیکت جدیدی ثبت نشده است</p>
                                @endif
                            </li>
                            @if($tickets['allTicket']->count() != 0)
                                @foreach($tickets['allTicket'] as $key => $ticket)
                                <li data-id="{{ $ticket->id }}" style="overflow: hidden;">
                                    @if($ticket->user_id != null)
                                        <a href="{{ route('ticket.user.show', $ticket->id) }}" style="position: relative;">
                                    @else
                                        <a href="{{ route('ticket.gust.show', $ticket->id) }}" style="position: relative;">
                                    @endif
                                        <span>{{ $key + 1 }} )</span>
                                            
                                        
                                        <span class="subject" style="display: inline;margin-right: 6px;">
                                        
                                            <span class="from">{{ $ticket->ticket_title }}</span>
                                            <span class="time" style="position:absolute; bottom: 5px;">{{ $ticket->dif_time }}</span>
                                        </span>
                                        <span class="message" style="margin: 10px 0 10px 0; font-size:10px;">
                                            {{ $ticket->sub_body . " ... " }}   
                                        </span>
                                    </a>
                                </li> 
                                @endforeach
                            @else
                                <p>f</p>
                            @endif

                            <li class="external">
                                <a href="{{ route('ticket.user.index') }}"> نمایش تیکت های کاربران  ({{ $tickets['userTickets'] }})</a>
                                <a href="{{ route('ticket.gust.index') }}">نمایش تیکت های مهمان ({{ $tickets['gustickets'] }})</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Ticket Part End -->


                    <!-- Comment dropdown Box start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-comments"></i>

                            @if($comments->count() != 0)
                                <span class="badge"  style="background: #2ea4ea !important ;"> {{ $comments->count() }} </span>
                            @endif

                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-red" style="border-bottom-color: #2ea4ea !important ;"></div>
                          

                            @if($comments->count() != 0)

                                    <li>
                                        <p class="red" style="background-color: #2ea4ea; !important">
                                            شما
                                            ({{ $comments->count() }})
                                            دیدگاه تایید نشده دارید
                                        </p>
                                    </li>

                                    @foreach($comments as $key => $comment)
                                        @if($key < 5)
                                        @php $user=$comment->user()->first(); @endphp
                                            <li data-id="{{ $comment->id }}">
                                                <a href="#" style="position: relative;">
                                                    <span class="photo">
                                                    <img alt="{{ $user->name }}" src="{{ $user->image }}"></span>
                                                    <span class="subject">
                                                        <span class="from"></span>
                                                        <span class="time" style="position:absolute; bottom: 5px;">{{ $comment->dif_time }}</span>
                                                    </span>
                                                    <span class="message">
                                                        {{ $comment->sub_body . " ... " }}   
                                                    </span>
                                                </a>
                                            </li>

                                        @endif
                                    @endforeach
                            
                                
                                <li>
                                     <a href="{{ route('comment.index') }}">نمایش تمامی دیدگاه ها</a>
                                </li>

                            @else

                                <li>
                                    <p class="red">
                                        تاکنون دیدگاه جدیدی ثبت نشده
                                    </p>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="subject">
                                            <span class="from">پنل مدیریت</span>
                                            <span class="time">همین حالا</span>
                                        </span>
                                        <span class="message comment-dontexist-panel">
                                            دیدگاهی ثبت نشده برو یه چایی بخور خستگی در کن :)
                                        </span>
                                    </a>
                                </li>

                            @endif

                        </ul>
                    </li>
                    <!-- Comment dropdown Box end -->

                    <!-- notification dropdown start-->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-shopping-cart"></i>
                            <span class="badge bg-warning">7</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">شما 3 خرید جدید دارید</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-danger"><i class="icon-bolt"></i></span>
                                    سرور شماره 3 توقف کرده
                                   
                                    <span class="small italic">34 دقیقه قبل</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">نمایش تمامی اعلام ها</a>
                            </li>
                        </ul>
                    </li>
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="دنبال چی می گردی؟">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="/PubAdmin/img/avatar1_small.jpg">
                            <span class="username">{{ auth()->user()->name }}</span>
                            <b class="caret"></b>
                        </a>
							   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="#"><i class="icon-suitcase"></i>پروفایل</a></li>
                            <li><a href="#"><i class="icon-cog"></i>تنظیمات</a></li>
                            <li><a href="#"><i class="icon-bell-alt"></i>اعلام ها</a></li>
							       
									<li>
										<a href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
												<i class="icon-key"></i>خروج	
										</a>
								</li>
							
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>