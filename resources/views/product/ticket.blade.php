@extends('layouts.app')
@section('content')
	<div class="container">
		<div id="pintable" class="row">
			<div  class="col s12 m10 offset-m1  l8 offset-l2">
				<h1>
				</h1>
				<h2>Información Personal</h2>
				<table class="striped">
					<tbody>
						<tr>
							<th>Nombre</th>
							<td>{{$user->full_name}}</td>
						</tr>
						<tr>
							<th >Correo Electronico</th>
							<td>{{$user->email}}</td>
						</tr>
						<tr>
							<th>País</th>
							<td>{{$user->country}}</td>
						</tr>
						<tr>
							<th>Ciudad</th>
							<td>{{$user->city}}</td>
						</tr>
						<tr>
							<th>Dirección</th>
							<td>{{$user->address}}</td>
						</tr>
						<tr>
							<th>Codigo Postal</th>
							<td>{{$user->postal_code}}</td>
						</tr>
						<tr>
							<th>Numero de Compra</th>
							<td>{{$sale->id}}</td>
						</tr>
						<tr>
							<th>Fecha Compra</th>
							<td>{{$sale->created_at}}</td>
						</tr>
					</tbody>
				</table>
				<h2>Descripción de Venta</h2>
				<table class="bordered">
					<thead>
						<tr>
							<th>Producto</th>
							<th>Marca</th>
							<th>Talla</th>
							<th>Color</th>
							<th>Precio</th>
							<th>Cantidad</th>
							<th>SubTotal</th>
						</tr>
					</thead>
					<tbody>
					@php
						$total = 0;
					@endphp
						@foreach($ticket as $linesale)
							<tr>
								<td>
									<a href="{{url('view/'.$linesale->specification->product->id)}}">
										{{$linesale->specification->product->name}}
									</a>
								</td>
								<td>
									 {{$linesale->specification->product->brand->name}}
								</td>
								<td>
									 {{$linesale->specification->size->name}}
								</td>
								<td>
									 {{$linesale->specification->product->color->name}}
								</td>
								<td>
								{{$linesale->price}}<small>MXN</small>
								</td>
								<td>
									{{$linesale->amount}}
								</td>
								<td>
									{{$linesale->price * $linesale->amount}}<small>MXN</small>
								</td>
							</tr>
							@php
								$total = $total + $linesale->price * $linesale->amount;
							@endphp
						@endforeach
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Total de Venta:</td>
								<td>$ {{$total}}<small>MXN</small></td>
							</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row center-align">
			<button id="print" class="btn blue">Imprimir</button>
			<p>NOTA: Si lo anterior no funciona y desea imprimir este comprobante de pago. Presione Ctrl + P al mismo tiempo y Prosiga a imprimir.</p>
		</div>
	</div>
@endsection
@section('script')
	<script src="{{ asset('js/printArea.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('#print').click(function(event) {
				$('#pintable').printArea();
			});
		});
	</script>
@stop
