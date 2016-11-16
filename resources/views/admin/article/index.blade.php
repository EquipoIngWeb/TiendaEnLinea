@extends('admin.app')
@section('header')
Productos
@stop
@section('content')
	<style>
		.row{
			margin: 20px auto;
		}
		.img-responsive{
			height: 80px;
			margin: 1px auto;
		}
		.tab-current a{
			font-size: 14px!important;
			color:#000!important;
		}
		.tab-current a:hover{
			color: #000!important;
		}
		form{
			display: inline-block;
		}
	</style>

	<h3>SUBCATEGORIAS</h3>
	<div class="graph">
		<nav>
			<ul>
				{{-- @foreach ($directories as $directory) --}}
					<li class="tab-current">
						<a href="" class="icon-cup">
							asdasdasds
						</a>
					</li>
				{{-- @endforeach --}}
			</ul>
		</nav>
	</div>
	@foreach ($categories as $category)
		<h3>PRODUCTOS DE LA CATEGORIA {{strtoupper($category->name)}}</h3>
		@foreach($category->products->chunk(5) as $products)
			<div class="row">
				@each ('admin.article.item', $products, 'product')
			</div>
		@endforeach
	@endforeach
@stop


