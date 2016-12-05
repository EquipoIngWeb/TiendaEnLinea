@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col s12 m6 offset-m3 l4 offset-l4">
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
					<td>${{$item->product->price}}</td>
					<td><a href="{{url("remove_cart/$item->id")}}" class="btn red">X</a></td>
				</tr>
			@endforeach
		</table>
		<a href="{{url("/buy_the_cart")}}" class="btn col s12">Finalizar compra</a>
	</div>
</div>
@endsection