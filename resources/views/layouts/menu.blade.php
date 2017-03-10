 <!-- Start Navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNav">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="{{ url('/') }}" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title=" Home ">{{ getSettings() }} <span>{{ getSettings('short') }}</span></a>
		    </div>
		   
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="myNav">
		    
		      <ul class="nav navbar-nav navbar-right">
		        <li class=""><a href="{{ url('/') }}" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Home">Home</a></li>
		        @if (Auth::guest())
                <li><a href="{{ route('login') }}" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="{{ getPageData(13, 'title') }}">{{ getPageData(13, 'title') }}</a></li>
                <li><a href="{{ route('register') }}" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="{{ getPageData(14, 'title') }}">{{ getPageData(14, 'title') }}</a></li>
                @else
				<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="{{ url('/profile/'.Auth::user()->username) }}">Profile</a></li>
		            <li><a href="{{ url('/account') }}">My Account</a></li>
		            <li role="separator" class="divider"></li>
		            @if (Auth::user()->type > 0)
		            <li><a href="{{ url('/adminpanel') }}">Admin Panel</a></li>
		            @endif
		            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Logout</a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                            </form>
                    </li>
		          </ul>
		        </li>
		        @endif
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>  
		<!-- End Navbar -->