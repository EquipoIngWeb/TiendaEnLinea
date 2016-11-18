<li><a href="{{route ('home')}}">Inicio</a></li>
@foreach ($categories->getMenu() as $category)
	<li>
		<a href="#" class="dropdown-button" data-activates="{{$category->name}}">
			{{$category->name}}
			<i class="material-icons right">arrow_drop_down</i>
		</a>
	</li>
@endforeach