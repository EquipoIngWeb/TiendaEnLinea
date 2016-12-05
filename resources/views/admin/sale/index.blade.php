@extends('admin.app')
@section('breadcrumb')
	@php
		$breadcrumb=[
			['url'=>url('admin'),'name'=>'Ménu Principal'],
			['name'=>'Ventas']
		];
	@endphp
@stop
@section('header')
	Venta <small>de Articulos</small>
@stop
@section('content')
	<style>
		td .btn{
			padding: 3px 7px;
		}
	</style>
	<div class="row">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">PETICIONES DE USUARIO</div>
			<table class="table">
				<thead>
					<tr>
						<th>Usuario</th>
						<th>Articulo</th>
						<th>Marca</th>
						<th>Color</th>
						<th width="80px">Talla </th>
						<th>Precio</th>
						<th>Cantidad</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($sales as $sale)
						@foreach ($sale->lineSales as $line_sale)
							<tr>
								<td>{{$sale->user->full_name}}</td>
								<td>{{$line_sale->specification->product->name}}</td>
								<td>{{$line_sale->specification->product->brand->name}}</td>
								<td>{{$line_sale->specification->color->name}}</td>
								<td>{{$line_sale->specification->size->name}}</td>
								<td>{{$line_sale->price}}</td>
								<td>{{$line_sale->amount}}</td>
							</tr>
						@endforeach
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop


