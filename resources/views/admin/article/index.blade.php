@extends('admin.app')
@section('header')
	Productos
	@if (isset($category))
		<small>de <span class="category">{{$category->name}}</span></small>
	@endif
@stop
@section('content')
<style>
	.category{
		color: #222!important;
	}
</style>
	@forelse($category->products->chunk(6) as $products)
		<div class="row">
			@foreach ($products as $product)
				<div class="col-md-2">
					<div class="thumbnail image product">
						<a href="{{ url("admin/categories/$category->id/products/$product->id") }}">
							<img src="{{ $product->image }}" class="img-responsive" width="100%" alt="">
						</a>
						<div class="caption">
							<h4><a href="details.html"> {{$product->name}}</a></h4>
							<p><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> <a href="">{{$product->brand()->first()->name}}</a></p>
							<div class="options">
									<button type="submit" class="btn btn-primary btn-delete">
										<span class="glyphicon glyphicon-trash"></span> ELIMINAR
									</button>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	@empty
		<h5>Categoria sin Articulos</h5>
	@endforelse
	@foreach ($categories as $category)
		@if (sizeof($category->children)>0)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">SUBCATEGORIAS</h3>
				</div>
				<div class="panel-body folders">
					@foreach ($category->children as $category_second)
						<a href="{{ url("admin/categories/$category_second->id/products") }}" class="btn btn-warning">
							{{$category_second->name}}
						</a>
					@endforeach
				</div>
			</div>
		@endif

		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 class="panel-title">
					PRODUCTOS DE LA CATEGORIA <a href="{{ url("admin/categories/$category->id/products/") }}" class="category">{{strtoupper($category->name)}}</a>
				</h3>
			</div>
			<div class="panel-body">
				<a href="{{ url('admin/categories/'.$category->id.'/products/create') }}" class="btn btn-warning"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
				<form action="{{ url('admin/categories/'.$category->id.'/products/csv') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="fileUpload btn btn-primary">
					    <span>CSV</span>
					    <input type="file" name="csv" class="upload"onchange="this.form.submit()"   accept=".csv" />
					</div>
				</form>
				@forelse($category->products->chunk(6) as $products)
					<div class="row">
						@foreach ($products as $product)
							<div class="col-md-2">
								<div class="thumbnail image product">
									<a href="{{ url("admin/categories/$category->id/products/$product->id") }}">
										<img src="{{ $product->image }}" class="img-responsive" width="100%" alt="">
									</a>
									<div class="caption">
										<h4><a href="details.html"> {{$product->name}}</a></h4>
										<p><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> <a href="">{{$product->brand()->first()->name}}</a></p>
										<div class="options">
												<button type="submit" class="btn btn-primary btn-delete">
													<span class="glyphicon glyphicon-trash"></span> ELIMINAR
												</button>
										</div>
									</div>
								</div>
							</div>

						@endforeach
					</div>
				@empty
					<h5>Categoria sin Articulos</h5>
				@endforelse

			</div>
		</div>
	@endforeach
@stop


