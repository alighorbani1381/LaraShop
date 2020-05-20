  <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu">
                    <li class="active">
                    <a class="" href="{{ route('home') }}">
                            <i class="icon-dashboard"></i>
                            <span>صفحه اصلی</span>
                        </a>
                    </li>
                    
                    {{-- @can('Category') --}}
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-sitemap"></i>
                            <span>مدیریت دسته بندی ها</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            @can('category_list')
                                <li><a class="" href="{{ route('category.index') }}">لیست دسته بندی ها</a></li>
                            @endcan
                            
                            {{-- @can('Category-Create') --}}
                            <li><a class="" href="{{ route('category.create') }}">افزودن دسته بندی </a></li>
                            {{-- @endcan --}}

                        </ul>
                    </li>
                    {{-- @endcan --}}


                    {{-- @can('Product') --}}
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-shopping-cart"></i>
                            <span>مدیریت محصولات</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="{{ route('product.index') }}">لیست محصولات</a></li>

                            {{-- @can('Product-Create') --}}
                            <li><a class="" href="{{ route('product.create') }}">افزودن محصول</a></li>
                            {{-- @endcan --}}

                        </ul>
                    </li>
                    {{-- @endcan --}}

                    {{-- @can('Pages') --}}
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-book"></i>
                            <span>مدیریت برگه ها</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="{{ route('page.index') }}">لیست برگه ها</a></li>
                            <li><a class="" href="{{ route('page.create') }}">افزودن برگه</a></li>
                        </ul>
                    </li>
                    {{-- @endcan --}}

                     {{-- @can('Product') --}}
                     <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-picture"></i>
                            <span>مدیریت اسلایدر</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="{{ route('slider.index') }}">لیست اسلایدر ها</a></li>

                            {{-- @can('Product-Create') --}}
                            <li><a class="" href="{{ route('slider.create') }}">افزودن اسلایدر</a></li>
                            {{-- @endcan --}}

                        </ul>
                    </li>
                    {{-- @endcan --}}

                     {{-- @can('Filters') --}}
                     <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-filter"></i>
                            <span>مدیریت فیلتر ها</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="{{ route('filter.index') }}">لیست فیلتر ها</a></li>

                            {{-- @can('Filters-Create') --}}
                            <li><a class="" href="{{ route('filter.create') }}">افزودن فیلتر جدید</a></li>
                            {{-- @endcan --}}

                              {{-- @can('Filters-Create') --}}
                              <li><a class="" href="{{ route('product-filter.index') }}">اعمال فیلتر ها</a></li>
                              {{-- @endcan --}}

                        </ul>
                    </li>
                    {{-- @endcan --}}

                        {{-- @can('Filters') --}}
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-comments-alt"></i>
                                <span>مدیریت دیدگاه ها</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                {{-- @can('Filters-Create') --}}
                                   <li><a class="" href="{{ route('comment.index') }}">بررسی نشده</a></li>
                                {{-- @endcan --}}

                                {{-- @can('Filters-Create') --}}
                                   <li><a class="" href="{{ route('comment.trash.index') }}">زباله دان دیدگاه</a></li>
                                {{-- @endcan --}}
                            </ul>
                        </li>
                        {{-- @endcan --}}

                        
                        {{-- @can('Users-Management') --}}
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-question-sign"></i>
                                <span>مدیریت سوالات</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="{{ route('question.index') }}">لیست سوالات</a></li>
                                <li><a class="" href="{{ route('question.create') }}">افزودن سوال | دسته بندی</a></li>
                            </ul>
                        </li>
                        {{-- @endcan --}}
                   
                        {{-- @can('Users-Management') --}}
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-ticket"></i>
                                <span>مدیریت تیکت ها</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="{{ route('ticket.user.index') }}">تیکت های کاربران</a></li>
                                <li><a class="" href="{{ route('ticket.gust.index') }}">تیکت های مهمان</a></li>
                                <li><a class="" href="{{ route('ticket.answered') }}">تیکت های  بسته شده</a></li>
                            </ul>
                        </li>
                        {{-- @endcan --}}
                   
                    {{-- @can('Users-Management') --}}
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-group"></i>
                            <span>مدیریت کاربران ها</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="{{ route('user.index') }}">لیست کاربران</a></li>
                            <li><a class="" href="{{ route('user.create') }}">افزودن کاربر جدید</a></li>

                            <li><a class="" href="{{ route('role.index') }}">لیست  سطوح دسترسی</a></li>
                            <li><a class="" href="{{ route('role.create') }}">افزودن سطح جدید</a></li>

                            <li><a class="" href="{{ route('permission.index') }}">لیست دسترسی ها</a></li>
                            <li><a class="" href="{{ route('permission.create') }}">افزودن دسترسی</a></li>
                        </ul>
                    </li>
                    {{-- @endcan --}}

                 				
                    <li>
                    <a class="" target="_blank" href="{{ route('index') }}">
                            <i class="icon-home"></i>
                            <span>مشاهده سایت</span>
                        </a>
                    </li>
                </ul>
				      <!--sidebar end-->
	     </div>
     </aside>