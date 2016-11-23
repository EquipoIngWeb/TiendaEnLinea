@inject('categories', 'App\Repositories\Categories')
<<<<<<< HEAD
@foreach ($categories->getMenu() as $category)
	<div id="{{$category->name}}" class="modal bottom-sheet row">
		<div class="center modal-content col s12">
			<b class="row">{{$category->name}}</b>
			<ul>
				@foreach ($category->children as $category_second)
					<div class="row">
					<a href="{{ route('view_category',['category_id'=>$category_second->id]) }}" class="blue btn s12 col">
						{{$category_second->name}}
					</a>
					<hr>
					@foreach ($category_second->children as $category_third)
						<li>
							<a href="{{ route('view_category',['category_id'=>$category_third->id]) }}" class="btn col s12 m4 l4">
								{{$category_third->name}}
							</a>
						</li>	
					@endforeach
					</div>
				@endforeach
			</ul>
		</div>
	</div>
@endforeach

{{--
	El menu esta compuesto por 3 partes:
		- Menu normal
		- Auth bar
		- Menu responsivo
		--}}
<nav>
	<div class="nav-wrapper">
		<a href="{{ route('home') }}" class="brand-logo center hide-on-small-only">
			<img src="{{asset('img/Logo1.png')}}" alt="Logo lara-shop" id="logo" >
		</a>
		{{-- Boton para sidebar, telefonos y tablets --}}
		<a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
=======
<!-- header -->
<div class="header">
	<div class="container">
		<div class="logo-nav">
			<div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
				<h1><a href="{{ url('/') }}"><img src="{{asset('img/Logo1.png')}}" width="90" height="90"><span></span></a></h1>
			</div>
			<div class="logo-nav-left1">
				<nav class="navbar navbar-default">
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
							@foreach ($categories->getMenu() as $category)
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$category->name}} <b class="caret"></b></a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="row">
											@foreach ($category->children as $category_second)
												<div class="col-sm-4">
													<ul class="multi-column-dropdown">
														<h6><a href="{{ url('/category/'.$category_second->id) }}">{{$category_second->name}}</a></h6>
														@foreach ($category_second->children as $category_third )
															<li><a href="{{ url('/category/'.$category_third->id) }}">{{$category_third->name}}</a></li>
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
									<li><a href="{{ url(Auth::user()->role_id) }}">Principal</a></li>
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
					<a href="{{url('/checkout')}}">
						<h3> <div class="total">
							<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
							<img src="{{asset('images/bag.png')}}" alt="" />
						</h3>
					</a>
					<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- //header -->







>>>>>>> 1ad0629066d60ac6fd8cf6dc072cb2e18b61e69d



<<<<<<< HEAD
			<li><a href="{{route ('home')}}">Inicio</a></li>
			@foreach ($categories->getMenu() as $category)
				<li>
					<a class="" href="#{{$category->name}}">{{$category->name}}
					</a>
				</li>
			@endforeach
		</ul>


		{{-- Auth bar --}}
		<ul class="right">
			@if (Auth::guest())
			<li><a href="{{route ('login')}}">Iniciar sesión</a></li>
			<li class="active"><a href="{{url ('/register')}}">Registrarse</a></li>
			@else
			<li>
				<a href="#" class="dropdown-button" data-activates="user-menu">
					{{ Auth::user()->full_name }}
					<i class="material-icons right">arrow_drop_down</i>
				</a>
				<ul id="user-menu" class="dropdown-content">
					<li style="opacity: 0;"><a href=""></a></li>
					<li ><a href="{{ url(Auth::user()->role_id) }}">Princial</a></li>
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

		{{-- Menu responsivo. --}}
		<ul class="side-nav" id="mobile-menu">
			<li><a href="{{route ('home')}}">Inicio</a></li>
			@foreach ($categories->getMenu() as $category)
			<li class="divider"></li>
			<li class="active"><a href="">{{$category->name}}</a></li>
			@foreach ($category->children as $category_second)
			<li>
				<a href="{{ route('view_category',['category_id'=>$category_second->id]) }}">
					{{$category_second->name}}
				</a>
			</li>
			@endforeach
=======


>>>>>>> 1ad0629066d60ac6fd8cf6dc072cb2e18b61e69d


<<<<<<< HEAD
		</ul>
	</div>
</nav>

=======
>>>>>>> 1ad0629066d60ac6fd8cf6dc072cb2e18b61e69d
