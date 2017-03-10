 <header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/adminpanel') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>{{ getSettings('short') }}</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{ getSettings() }} Panel</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              @if(getCountUreadMessages() > 0)
                <span class="label label-success">{{ getCountUreadMessages() }}</span>
              @endif
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{ \App\Contact::count() }} messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                @forelse(getUreadMessages() as $shortMessage)
                  <li><!-- start message -->
                    <a href="{{ url('adminpanel/contacts/'.$shortMessage->id.'/show') }}">
                      <div class="pull-left">
                        <img src="{{ Request::root().'/public/admin/dist/img/user2-160x160.jpg' }}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        {{ $shortMessage->name }}
                        <small><i class="fa fa-clock-o"></i> {{ $shortMessage->created_at->diffForHumans() }}</small>
                      </h4>
                      <p>{{ str_limit($shortMessage->message, 15) }}</p>
                    </a>
                  </li>
                  <!-- end message -->
                  @empty
                  <li class="text-center">There isn't any new messages</li>
                  @endforelse
                </ul>
              </li>
              <li class="footer"><a href="{{ url('/adminpanel/contacts') }}">See All Messages</a></li>
            </ul>
          </li>
          <li>
            <a href="{{ url('/') }}" target="_blank">
              <i class="fa fa-eye"></i>  &nbsp; View My Website
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ getImage(Auth::user()->id) }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ getImage(Auth::user()->id) }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->email }}
                  @if(Auth::user()->type == 1)
                     <small>Admin</small>
                  @elseif(Auth::user()->type == 2)
                      <small>Supervisor</small>
                  @endif
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('/adminpanel/users/'.Auth::user()->id.'/edit') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
               </form>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->