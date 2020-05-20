  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">پنل کاربری شما</span>
      <i class="fa fa-user brand-logo-c" ></i>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
      <div style="direction: rtl">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
          </div>
          <div class="info">
            <a href="#" class="d-block">
                {{ auth()->user()->name }}
                عزیز خوش اومدی 😎😘
            </a>
          </div>
        </div>
        
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

                 <li class="nav-item">
                    <a href="{{ route('profile.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>
                      <p>
                        پنل کاربری
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('basket.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-shopping-bag"></i>
                      <p>
                        سبد خرید
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fa fa fa-shopping-cart"></i>
                      <p>
                        لیست خرید های شما
                      </p>
                    </a>
                  </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-envelope-o"></i>
                <p>
                  تیکت ها
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('user.ticket.index') }}" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>لیست تیکت ها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('user.ticket.create') }}" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>ارسال تیکت جدید</p>
                  </a>
                </li>
              </ul>
            </li>


            
              
          
            <li class="nav-header">دسترسی های سریع</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-circle-o text-danger"></i>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                <p class="text" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">خروج از حساب کاربری</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('index') }}" class="nav-link">
                <i class="nav-icon fa fa-circle-o text-warning"></i>
                <p class="text">فروشگاه گردی!</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>