@extends('admin.app')

@section('header')
Menu Principal
@stop
@section('content')
	<div class="row home">
		<div class="col-md-3">
			<div class="thumbnail">
				<a href="{{ url('admin/sales') }}">
					<div class="icon">
						<i class="fa fa-shopping-cart"></i>
					</div>
					<div class="caption">
						<h3>Ventas</h3>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-3">
			<div class="thumbnail">
				<a href="{{ url('admin/comments') }}">
					<div class="icon">
						<i class="fa fa-list"></i>
					</div>
					<div class="caption">
						<h3>Comentario</h3>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-3">

			<div class="thumbnail">
				<a href="{{ url('admin/images') }}">
					<div class="icon">
						<i class="fa fa-file"></i>
					</div>
					<div class="caption">
						<h3>Banco de Imagenes</h3>
					</div>
				</a>
			</div>

		</div>
		<div class="col-md-3">
			<div class="thumbnail">
				<a href="{{ url('admin/inventories') }}">
					<div class="icon">
						<i class="fa fa-list-ol"></i>
					</div>
					<div class="caption">
						<h3>Inventario</h3>
					</div>
				</a>
			</div>
		</div>
	</div>
	<div class="row home">
		<div class="col-md-3">
			<div class="thumbnail">
				<a href="{{ url('/admin/genders') }}">
					<div class="icon">
						<i class="fa fa-sitemap"></i>
					</div>
					<div class="caption">
						<h3>Géneros y Categorias</h3>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-3">
			<div class="thumbnail">
				<a href="{{ url('admin/products') }}">
					<div class="icon">
						<i class="fa fa-suitcase"></i>
					</div>
					<div class="caption">
						<h3>Productos</h3>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-3">
			<div class="thumbnail">
				<a href="{{ url('admin/users') }}">
					<div class="icon">
						<i class="fa fa-users"></i>
					</div>
					<div class="caption">
						<h3>Usuarios</h3>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-3">
			<div class="thumbnail">
				<a href="{{ url('admin/sizes') }}">
					<div class="icon">
						<i class="fa fa-sliders"></i>
					</div>
					<div class="caption">
						<h3>Tallas</h3>
					</div>
				</a>
			</div>
		</div>
	</div>
	<div class="row home">
		<div class="col-md-3">
			<div class="thumbnail">
				<a href="{{ url('admin/colors') }}">
					<div class="icon">
						<i class="fa fa-hashtag"></i>
					</div>
					<div class="caption">
						<h3>Colores</h3>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-3">
			<div class="thumbnail">
				<a href="{{ url('admin/brands') }}">
					<div class="icon">
						<i class="fa fa-tags"></i>
					</div>
					<div class="caption">
						<h3>Marcas</h3>
					</div>
				</a>
			</div>
		</div>
	</div>
@stop

