@inject('categories', 'App\Repositories\Categories')
@foreach ($categories->getMenu() as $category)
	<div id="{{$category->name}}" class="modal bottom-sheet row">
		<div class="modal-content col s8">
			<b class="row">{{$category->name}}</b>
			<ul>
				@foreach ($category->children as $category_second)
					<div class="row">
					<a href="{{ route('view_category',['category_id'=>$category_second->id]) }}" class="orange btn s12 col">
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
			<img src="{{asset('img/Logo1.png')}}" alt="Logo lara-shop" id="logo">
		</a>
		{{-- Boton para sidebar, telefonos y tablets --}}
		<a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>


		{{-- Menu normal --}}
		<ul class="left hide-on-med-and-down">

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
			<li><a href="{{route ('login')}}">Iniciar sesion</a></li>
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

			@endforeach

		</ul>
	</div>
</nav>

