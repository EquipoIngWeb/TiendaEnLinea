@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col s12 m6 offset-m3 l4 offset-l4">
		@if (!$cart->isEmpty())
			<table class="centered">
				<thead>
					<tr>
						<th>Cantidad</th>
						<th>Nombre</th>
						<th>Precio</th>
						<th></th>
					</tr>
				</thead>
				@foreach($cart as $item)
					<tr>
						<td>{{$item->amount}}</td>
						<td>{{$item->product->name}}</td>
						<td>${{$item->price}}</td>
						<td><a href="{{url("user/remove_cart/$item->id")}}" class="btn red">X</a></td>
					</tr>
				@endforeach
			</table>
			<a href="{{url("user/sendEmailForCart")}}" class="btn col s12">Finalizar compra</a>
		@else
			<h2>No has seleccionado articulos para comprar...</h2>
			<a href="{{url("/")}}" class="btn col s12">Seguir Comprando</a>
		@endif

	</div>
</div>
@endsection
