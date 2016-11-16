@inject('categories', 'App\Repositories\Categories')
<!-- header -->
<div class="header">
	<div class="container">
				{{-- <div class="header-grid">
					<div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
						<ul>
							<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="lara.shop9@gmail.com">lara.shop9@gmail.com</a></li>

							<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 892</li>
							@if (Auth::guest())
								<li><a href="{{ url('/login') }}"><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i>Ingresar</a></li>
								<li><a href="{{ url('/register') }}"><i class="glyphicon glyphicon-book" aria-hidden="true"></i>Registrarse</a></li>
							@else
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
										<i class="glyphicon glyphicon-user" aria-hidden="true"></i> {{ Auth::user()->full_name }} <span class="caret"></span>
									</a>

									<ul class="dropdown-menu" role="menu">
										<li>
											<a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
											Salir
											</a>
											<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
											</form>
										</li>
									</ul>
								</li>
							@endif
						</ul>
					</div>
					<div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
						<ul class="social-icons">
							<li><a href="#" class="facebook"></a></li>
							<li><a href="#" class="twitter"></a></li>
							<li><a href="#" class="g"></a></li>
							<li><a href="#" class="instagram"></a></li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div> --}}
				<div class="logo-nav">
					<div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
						<h1><a href="{{ url('/') }}"><img src="img/Logo1.png" width="90" height="90"><span></span></a></h1>
					</div>
					<div class="logo-nav-left1">
						<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="{{url ('/')}}" class="act">Inicio</a></li>
									<!-- Mega Menu -->
									@foreach ($categories->getMenu() as $category_first)
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$category_first['name']}} <b class="caret"></b></a>
											<ul class="dropdown-menu multi-column columns-3">
												<div class="row">
													@foreach ($category_first['children'] as $category_second)
														<div class="col-sm-4">
															<ul class="multi-column-dropdown">
																<h6><a href="{{ url('/category/'.$category_first['id'].'/'.$category_second['id']) }}">{{$category_second['name']}}</a></h6>
																@foreach ($category_second['children'] as $category_third )
																	<li><a href="{{ url('/category/'.$category_first['id'].'/'.$category_second['id'].'/'.$category_third['id']) }}">{{$category_third['name']}}</a></li>
																@endforeach
															</ul>
														</div>
														@endforeach
													<div class="clearfix"></div>
												</div>
											</ul>
										</li>

									@endforeach
			{{-- <li><a href="short-codes.html">Short Codes</a></li> --}}
			<li><a href="mail.html">Mail Us</a></li>
			@if (Auth::guest())
				<li><a href="{{ url('/login') }}">Ingresar</a></li>
				<li><a href="{{ url('/register') }}">Registrarse</a></li>
			@else
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					{{ Auth::user()->full_name }} <span class="caret"></span>
				</a>

				<ul class="dropdown-menu" role="menu">
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
	</div>
</nav>
</div>
<div class="logo-nav-right">
	<div class="search-box">
		<div id="sb-search" class="sb-search">
			<form>
				<input class="sb-search-input" placeholder="Enter your search term..." type="search" id="search">
				<input class="sb-search-submit" type="submit" value="">
				<span class="sb-icon-search"> </span>
			</form>
		</div>
	</div>
</div>
<div class="header-right">
	<div class="cart box_1">
		<a href="checkout.html">
			<h3> <div class="total">
				<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
				<img src="images/bag.png" alt="" />
			</h3>
		</a>
		<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
		<div class="clearfix"> </div>
	</div>
</div>

<div class="clearfix"> </div>
</div>
</div>
</div>
<!-- //header -->














