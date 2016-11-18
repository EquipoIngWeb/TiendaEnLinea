<div class="header-section">
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ url('admin') }}">Admin Lara-Shop</a>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right">
				{{-- <li><a href="#">Link</a></li> --}}
				@if (!Auth::guest() && Auth::user()->isAdmin())
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="glyphicon glyphicon-user" ></i> {{Auth::user()->full_name }}
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
						<li>
							<a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
								Logout
							</a>
							<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
						</ul>
					</li>
				@endif
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>
</div>
