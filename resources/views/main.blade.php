@extends('layouts.app')
@section('content')

<div id="main-carousel" class="owl-carousel owl-theme">

	<div class="item">
		<img src="{{asset('images/carrusel/banner_1.jpg')}}" alt="Damas, Caballeros y Niños">
		<p class="center">Damas, Caballeros y Niños</p>
	</div>
	<div class="item">
		<img src="{{asset('images/carrusel/banner_2.jpg')}}" alt="Todo lo que necesites a tu alcance">
		<p class="center">Todo lo que necesites a tu alcance</p>
	</div>
	<div class="item">
		<img src="{{asset('images/carrusel/banner_3.jpg')}}" alt="Descubre más con un clic">
		<p class="center">Descubre más con un clic</p>
	</div>

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
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat.</p>
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
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat.</p>
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
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<h2 class="center col s12">Articulos populares</h2>
		<div id="popular-carousel" class="owl-carousel owl-theme">
			@each('components.article', $products, 'product')
		</div>
	</div>



</div>
@stop