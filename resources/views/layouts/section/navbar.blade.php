@inject('categories', 'App\Repositories\Categories')

{{--
	Nota: La libreria "materializecss" indica que los elementos dropdown
		de la barra de navegacion deben de ir afuera de la misma, y dentro
		solo se agregara el enlace para accionar dicho dropdown.

		http://materializecss.com/navbar.html
--}}
@foreach ($categories->getMenu() as $category)
	<ul id="{{$category->name}}" class="dropdown-content">

		@foreach ($category->children as $category_second)
			<li>
				<a href="{{ route('view_category',['category_id'=>$category_second->id]) }}">
					{{$category_second->name}}
				</a>
			</li>
			<li class="divider"></li>
		@endforeach
	</ul>
@endforeach

<nav>
	<div class="nav-wrapper">
		<a href="{{ route('home') }}" class="brand-logo hide-on-small-only">
			<img src="{{asset('img/Logo1.png')}}" alt="Logo lara-shop" id="logo">
		</a>
		{{-- Boton para sidebar, telefonos y tablets --}}
		<a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
		
		<ul class="right">

			<li class="active"><a href="{{route ('login')}}">Iniciar sesion</a></li>
			
		</ul>

		{{-- Menu normal --}}
		<ul class="right hide-on-med-and-down">

			<li><a href="{{route ('home')}}">Inicio</a></li>
			@foreach ($categories->getMenu() as $category)
				<li>
					<a href="#" class="dropdown-button" data-activates="{{$category->name}}">
						{{$category->name}}
						<i class="material-icons right">arrow_drop_down</i>
					</a>
				</li>
			@endforeach
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
				
			@endforeach

		</ul>
	</div>
</nav>


{{--
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav">
							

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
--}}

<!-- //header -->














