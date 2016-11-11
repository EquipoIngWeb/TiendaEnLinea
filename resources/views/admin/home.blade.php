@extends('admin.app')

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
<!-- start content -->
<div class="women_main">
	<div class="tab-main">

		<!--/tabs-inner-->
		<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle">Menu Principal</h2>
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
					<a href="{{ url('/') }}">
						<i class="fa fa-file"></i>			
						<h3>Banco de Imagenes</h3>
					</a>
				</div>
				<div class="mediabox">
					<a href="{{ url('/') }}">
						<i class="fa fa-sitemap"></i>						
						<h3>Categorias</h3>
					</a>
				</div>
				<div class="mediabox">
					<a href="{{ url('/') }}">
						<i class="fa fa-suitcase"></i>						
						<h3>Productos</h3>
					</a>
				</div>
				<div class="mediabox">
					<a href="{{ url('/') }}">
						<i class="fa fa-users"></i>						
						<h3>Usuarios</h3>
					</a>
				</div>
				<div class="mediabox">
					<a href="{{ url('/') }}">
						<i class="fa fa-tags"></i>						
						<h3>Marcas</h3>
					</a>
				</div>
				<div class="mediabox">
					<a href="{{ url('/') }}">
						<i class="fa fa-sliders"></i>						
						<h3>Tallas</h3>
					</a>
				</div>
				<div class="mediabox">
					<a href="{{ url('/') }}">
						<i class="fa fa-hashtag"></i>						
						<h3>Colores</h3>
					</a>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>

	</div>

</div>
<!-- end content -->

@stop

