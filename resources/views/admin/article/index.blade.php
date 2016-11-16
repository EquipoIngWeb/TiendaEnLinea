@extends('admin.app')
@section('header')
	Productos
	@if (isset($category))
		de la categoria <span class="category">{{$category->name}}</span>
	@endif
@stop
@section('content')
	<style>
		.row{
			margin: 20px auto;
		}
		.img-responsive{
			margin: 1px auto;
		}
		li.tab-current{
			margin: 10px 5px!important;
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
		 .category{
			color: #b52e31;
		}
	</style>
	@inject('repoCategories', 'App\Repositories\Categories')
	@foreach ($categories as $category)
		<h3>PRODUCTOS DE LA CATEGORIA <span class="category">{{strtoupper($category->name)}}</span></h3>
		@if (sizeof($category->children)>0)
			<h4>SUBCATEGORIAS</h4>
			<div class="graph">
				<nav>
					<ul>
						@foreach ($repoCategories->menu($category->children) as $category_second)
							<li class="tab-current">
								<a href="{{ url("admin/products/".$category_second['id']) }}" class="icon-cup">
									{{$category_second['name']}}
								</a>
							</li>
						@endforeach
					</ul>
				</nav>
			</div>
		@endif
		<h4>PRODUCTOS
			<a href="{{ url('admin/categories/'.$category->id.'/products/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
			<a href="{{ url('admin/categories/'.$category->id.'/products/csv') }}" class="btn btn-success">CSV</a>
		</h4>
		@if (sizeof($category->products->chunk(4))<>0)
			@foreach($category->products->chunk(4) as $products)
				<div class="row">
					@each ('admin.article.item', $products, 'product')
				</div>
			@endforeach
		@else
		<h5>Categoria sin Articulos</h5>
		@endif
	@endforeach
@stop


