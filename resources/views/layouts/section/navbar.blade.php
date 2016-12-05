<style>
 .bottom-sheet {
	max-height: 84%!important;
}
</style>
@inject('gender', 'App\Gender')
@foreach ($gender->get() as $gender)
	<div id="{{$gender->name}}" class="modal bottom-sheet row">
		<div class="modal-content col s8">
			<h3 class="row"><a href="{{ route('view_gender',['id'=>$gender->id]) }}">{{$gender->name}}</a></h3>
			<ul>
				@foreach ($gender->categories as $category)
					<div class="row">
					<a href="{{ route('view_category',['id'=>$category->id]) }}" class="orange btn s12 col">
						{{$category->name}}
					</a>
					<hr>
					@foreach ($category->subcategories as $subcategory)
						<li>
							<a href="{{ route('view_subcategory',['id'=>$subcategory->id]) }}" class="btn col s12 m4 l4">
								{{$subcategory->name}}
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
			@foreach ($gender->get() as $gender)
				<li>
					<a class="" href="#{{$gender->name}}">{{$gender->name}}
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
			<li><a href="{{url('user/cart')}}">Carrito</a></li>
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
			@foreach ($gender->get() as $gender)
				<li class="divider"></li>
				<li class="active"><a href="">{{$gender->name}}</a></li>
				@foreach ($gender->categories as $category)
				<li>
					<a href="{{ route('view_category',['id'=>$category->id]) }}">
						{{$category->name}}
					</a>
				</li>
				@endforeach

			@endforeach

		</ul>
	</div>
</nav>

