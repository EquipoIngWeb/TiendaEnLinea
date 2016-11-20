@extends('layouts.app')
@section('content')

	@inject('categories', 'App\Repositories\Categories')

	<div class="row">
		<h1 class="center">{{$category->parent()->name or ''}} {{$category->name}}</h1>
		<div class="col s12 m9 l10">
			<h2 class="center">Nuevos productos</h2>
			<img src="{{$category->imge}}" alt=" " class="col s12" />
			@foreach($category->products as $product)
				@include('components.product',['product'=>$product,'format'=>'materialize'])
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
