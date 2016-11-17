@extends('admin.app')

@section('header')
	Menu Principal
@stop
@section('content')
<style>
	.mediabox{
		margin: 15px auto;
	}
	.mediabox a{
		display: inline-block;
		border:1px solid #444;
	}
</style>
<div class="mediabox">
	<a href="{{ url('/') }}">
		<i class="fa fa-shopping-cart"></i>
		<h3>Ventas</h3>
	</a>
</div>
<div class="mediabox">
	<a href="{{ url('/') }}">
		<i class="fa fa-list-ol"></i>
		<h3>Inventario</h3>
	</a>
</div>
<div class="mediabox">
	<a href="{{ url('admin/images') }}">
		<i class="fa fa-file"></i>
		<h3>Banco de Imagenes</h3>
	</a>
</div>
<div class="mediabox">
	<a href="{{ url('/admin/categories') }}">
		<i class="fa fa-sitemap"></i>
		<h3>Categorias</h3>
	</a>
</div>
<div class="mediabox">
	<a href="{{ url('admin/products') }}">
		<i class="fa fa-suitcase"></i>
		<h3>Productos</h3>
	</a>
</div>
<div class="mediabox">
	<a href="{{ url('admin/users') }}">
		<i class="fa fa-users"></i>
		<h3>Usuarios</h3>
	</a>
</div>
<div class="mediabox">
	<a href="{{ url('admin/brands') }}">
		<i class="fa fa-tags"></i>
		<h3>Marcas</h3>
	</a>
</div>
<div class="mediabox">
	<a href="{{ url('admin/sizes') }}">
		<i class="fa fa-sliders"></i>
		<h3>Tallas</h3>
	</a>
</div>
<div class="mediabox">
	<a href="{{ url('admin/colors') }}">
		<i class="fa fa-hashtag"></i>
		<h3>Colores</h3>
	</a>
</div>
<div class="mediabox">
	<a href="{{ url('admin/comments') }}">
		<i class="fa fa-list"></i>
		<h3>Comentario</h3>
	</a>
</div>
@stop

