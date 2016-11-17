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
		.fileUpload {
		    position: relative;
		    overflow: hidden;
		    margin: 10px;
		}
		.fileUpload input.upload {
		    position: absolute;
		    top: 0;
		    right: 0;
		    margin: 0;
		    padding: 0;
		    font-size: 20px;
		    cursor: pointer;
		    opacity: 0;
		    filter: alpha(opacity=0);
		}
	</style>
	@inject('repoCategories', 'App\Repositories\Categories')
	@foreach ($categories as $category)
		<h3>PRODUCTOS DE LA CATEGORIA <a href="{{ url("admin/categories/$category->id/products/") }}" class="category">{{strtoupper($category->name)}}</a></h3>
		@if (sizeof($category->children)>0)
			<h4>SUBCATEGORIAS</h4>
			<div class="graph">
				<nav>
					<ul>
						@foreach ($repoCategories->getOfCategories($category->id)->children as $category_second)
							<li class="tab-current">
								<a href="{{ url("admin/categories/$category_second->id/products") }}" class="icon-cup">
									{{$category_second->name}}
								</a>
							</li>
						@endforeach
					</ul>
				</nav>
			</div>
		@endif
		<h4>PRODUCTOS
			<a href="{{ url('admin/categories/'.$category->id.'/products/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
			<form action="{{ url('admin/categories/'.$category->id.'/products/csv') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="fileUpload btn btn-primary">
				    <span>CSV</span>
				    <input type="file" name="csv" class="upload"onchange="this.form.submit()"   accept=".csv" />
				</div>
			</form>
		</h4>
		@if (sizeof($category->products->chunk(4))<>0)
			@foreach($category->products->chunk(4) as $products)
				<div class="row">
					@foreach ($products as $product)
						<div class="col-md-3">
							<div class="content_box text-center">
								<a href="{{ url("admin/categories/$category->id/products/$product->id") }}">
									<img src="{{ $product->image }}" class="img-responsive" width="100%" alt="">
								</a>
								<h4><a href="details.html"> {{$product->name}}</a></h4>
								<p><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> <a href="">{{$product->brand()->first()->name}}</a></p>
								<div class="grid_1 simpleCart_shelfItem">
									<div class="item_add"><span class="item_price"><h6>ONLY ${{$product->price}}</h6></span></div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			@endforeach
		@else
		<h5>Categoria sin Articulos</h5>
		@endif
	@endforeach
@stop


