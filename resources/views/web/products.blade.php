@extends('layouts.app')
@section('content')

	@inject('categories', 'App\Repositories\Categories')

	<div class="row">
		<h1 class="center">{{$category->parent()->name or ''}} {{$category->name}}</h1>
		<div class="col s12 m9 l10">
			<form action="{{ url('/category/'.$category->id) }}" method="GET">
				{{csrf_field()}}
				<div class="input-field col s12">
				    <select name="filter" onchange="this.form.submit();">
				      <option value="" disabled selected>Filtros</option>
				      <option value="down">Precio mas bajos</option>
				      <option value="up">Precio mas altos</option>
				      {{-- <option value="alfa">Alfabetico</option> --}}
				    </select>
				    <label>Materialize Select</label>
				  </div>
			</form>
			<img src="{{$category->imge}}" alt=" " class="col s12" />
			@foreach($category->products as $product)
				@include('components.product',['product'=>$product,'format'=>'materialize'])
			@endforeach
			@foreach($category->children as $child)
				@foreach ($child->products as $product)
					@include('components.product',['product'=>$product,'format'=>'materialize'])
				@endforeach
				@foreach($child->children as $child1)
					@foreach ($child1->products as $product)
						@include('components.product',['product'=>$product,'format'=>'materialize'])
					@endforeach
				@endforeach
			@endforeach
		</div>
		<div class="col s12 m3 l2 center">
			<h2>Categorias</h2>
			<ul>
				@foreach ($categories->getMenu() as $category)
					@foreach ($category->children as $category_second)
						<li><a href="{{ url('/category/'.$category_second->id) }}" class="btn col s12">{{$category_second->name}}</a></li>
						@foreach ($category_second->children as $category_third )
							<li><a href="{{ url('/category/'.$category_third->id) }}" class="btn col s12">{{$category_third->name}}</a></li>
						@endforeach
					@endforeach
				@endforeach
			</ul>
		</div>

	</div>
@stop
