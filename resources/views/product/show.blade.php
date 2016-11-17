@extends('layouts.app')
@section('content')
	<div class="products">
		<div class="container">
			<div class="col-xs-12 col-md-4">
				<h1 class="col-xs-12 text-center">{{$product->name}}</h1>
				<img src="{{asset('images/20.jpg')}}" width="100%" >
			</div>
			<div class="col-xs-12 col-md-8">

				<h2>Descripcion: </h2>
				<p>{{$product->description or 'No hay descripcion disponible.'}}</p>

				<h2>Precio: </h2>
				<p>$ {{ $product->price or 'Ha ocurrido un problema, no hemos podido encontrar el precio de este articulo, porfavor intentalo mas tarde.'}}</p>

				<h2>Marca: </h2>

			</div>
		</div>
	</div>
@stop