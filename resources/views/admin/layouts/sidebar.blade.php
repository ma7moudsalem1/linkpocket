<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ getImage(Auth::user()->id) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active"><a href="{{ url('/adminpanel') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
      @if(Auth::user()->type == 1)
        {{-- Website --}}
        <li class="active"><a href="{{ url('/adminpanel/settings') }}">
          <i class="fa fa-cogs"></i> <span>Website settings</span></a>
        </li>

        {{-- Pages --}}
        <li class="active"><a href="{{ url('/adminpanel/pages') }}">
          <i class="fa fa-file-text"></i> <span>Website Pages</span></a>
        </li>

        {{-- Sliders --}}
        <li class="treeview">
          <a href="">
            <i class="fa fa-sliders"></i> <span>Sliders Mangement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/adminpanel/sliders') }}"><i class="fa fa-pie-chart"></i> View Sliders</a></li>
            <li><a href="{{ url('/adminpanel/sliders/create') }}"><i class="fa fa-plus-circle"></i> Add Slider</a></li>
          </ul>
        </li>

        {{-- Users --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-group"></i> <span>Users Mangement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/adminpanel/users') }}"><i class="fa fa-pie-chart"></i> View Users</a></li>
            <li><a href="{{ url('/adminpanel/users/create') }}"><i class="fa fa-plus-circle"></i> Add User</a></li>
          </ul>
        </li>
      @endif

        {{-- Inbox --}}
        <li class="active"><a href="{{ url('/adminpanel/contacts') }}">
          <i class="fa fa-envelope"></i> <span>Inbox</span></a>
        </li>

        {{-- Pockets --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Pockets Mangement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/adminpanel/pockets') }}"><i class="fa fa-pie-chart"></i> View Pockets</a></li>
            <li><a href="{{ url('/adminpanel/pockets/create') }}"><i class="fa fa-plus-circle"></i> Add Pocket</a></li>
          </ul>
        </li>

        {{-- Links --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-link"></i> <span>Links Mangement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/adminpanel/links') }}"><i class="fa fa-pie-chart"></i> View Links</a></li>
            <li><a href="{{ url('/adminpanel/links/create') }}"><i class="fa fa-plus-circle"></i> Add Links</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>