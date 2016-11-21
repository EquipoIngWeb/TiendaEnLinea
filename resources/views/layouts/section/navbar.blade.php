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
					<a class="modal-trigger" href="#modal{{$category_second->id}}">
						{{$category_second->name}}
					</a>
				</li>
				<li class="divider"></li>

			@endforeach
		</ul>
			@foreach ($category->children as $category_second)
				<div id="modal{{$category_second->id}}" class="modal bottom-sheet">
				    <div class="modal-content">
				      <h4>{{$category_second->name}}</h4>
				      <p>
							@foreach ($category_second->children->chunk(4) as $row)
								<div class="row">
									@foreach ($row as $category_third)
										<div class="col m3">
											  <div class="row">
											  	<div class="col m2">
											  		<img class="responsive-img" src="{{$category_third->image}}">
											  	</div>
											  	<div class="col m10" >
													  <a href="{{ url('/category/'.$category_third->id) }}">{{$category_third->name}}</a>
											  	</div>
											  </div>
										</div>
									@endforeach
								</div>
							@endforeach
				      </p>
				    </div>
				  </div>
			@endforeach
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
						<a href="#" class="dropdown-button" data-activates="{{$category->name}}">
							{{$category->name}}
							<i class="material-icons right">arrow_drop_down</i>
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

