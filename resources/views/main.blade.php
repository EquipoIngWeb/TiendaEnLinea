@extends('layouts.app')
@section('content')
<style>
	.card .card-image{
	max-height: 250px;
	overflow: hidden;
}

</style>
<div id="main-carousel" class="owl-carousel owl-theme">
	@foreach ($banners as $banner)
		<div class="item" >
			<img src="{{$banner->image}}" alt="Damas, Caballeros y Niños">
			<p class="center" >{{$banner->description}}</p>
		</div>
	@endforeach
</div>

<div class="container">
	<div class="row">
		<h1 class="center col s12">No pierdas mas tiempo,<br>encuentra con nosotros lo que necesitas</h1>

		<div class="col s12 m6 l4">
			<div class="card">
				<div class="card-image">
					<img src="{{asset('images/img4.jpg')}}">
					<span class="card-title">Descuentos de hasta el 50%</span>
				</div>
				<div class="card-content">
					<p>Te sorprenderá todo lo que <br>puedes encontrar con grandes <br>precios.</p>
				</div>
			</div>
		</div>
		<div class="col s12 m6 l4">
			<div class="card">
				<div class="card-image">
					<img src="{{asset('images/15.jpg')}}">
					<span class="card-title">Encuentra lo más nuevo</span>
				</div>
				<div class="card-content">
					<p>Solo aquí tenemos para ti <br> las mejores marcas y los <br>diseños más nuevos.</p>
				</div>
			</div>
		</div>
		<div class="col s12 m6 l4">
			<div class="card">
				<div class="card-image">
					<img src="{{asset('images/16.jpg')}}">
					<span class="card-title">Los mejores diseños de temporada</span>
				</div>
				<div class="card-content">
					<p>No pierdas más tiempo y se parte de <br>nosotros y permanece con <br>estilo.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<h2 class="center col s12">Articulos populares</h2>
		<div id="popular-carousel" class="owl-carousel owl-theme">
			@foreach($products as $product)
				@include('components.product',['product'=>$product,'format'=>'owl-carousel'])
			@endforeach
		</div>
	</div>

</div>
@stop
