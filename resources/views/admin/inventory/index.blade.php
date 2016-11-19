@extends('admin.app')

@section('header')
	Inventario <small>de Articulos</small>
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
			<div class="panel-heading">EXISTENCIA DE PRODUCTOS</div>
			<table class="table">
				<thead>
					<tr>
						<th>#ID</th>
						<th>Nombre</th>
						<th>Color</th>
						<th width="80px">Talla </th>
						<th>Precio</th>
						<th>Existencia</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($inventories as $inventory)
					<tr>
						<td>{{$inventory->product->id}}</td>
						<td>{{$inventory->product->name}}</td>
						<td>{{$inventory->color->name}}</td>
						<td>{{$inventory->size->name}}</td>
						<td>{{$inventory->price}}</td>
						<td>{{$inventory->amount}}</td>
						<td>
							<a href="{{ url("admin/inventories/$inventory->id/edit") }}" class="btn btn-success"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
							<form action="{{ url("admin/inventories/$inventory->id") }}" method="POST">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
							</form>
						</td>
					</tr>
					@endforeach
					<form action="{{ url('admin/inventories') }}" method="POST">
						{{ csrf_field() }}
						<tr>
							<td>
							</td>
							<td>
								<select name="product_id"  class="form-control" required="required">
									<option value="" desabled>Seleccione una opcion</option>
									@foreach ($products as $product)
										<option value="{{$product->id}}">{{$product->name}}</option>
									@endforeach
								</select>
							</td>
							<td>
								<select name="color_id"  class="form-control" required="required">
									<option value="" desabled>Seleccione una opcion</option>
									@foreach ($colors as $color)
										<option value="{{$color->id}}">{{$color->name}}</option>
									@endforeach
								</select>
							</td>
							<td>
								<select name="size_id"  class="form-control" required="required">
									<option value="" desabled>Seleccione una opcion</option>
									@foreach ($sizes as $size)
										<option value="{{$size->id}}">{{$size->name}}</option>
									@endforeach
								</select>
							</td>
							<td>
								<input type="text" name="price"  class="form-control" required="required">
							</td>
							<td>
								<input type="number" name="amount"  class="form-control" required="required">
							</td>
							<td>
								<button type="submit" class="btn btn-warning">
									Agregar
								</button>
							</td>
						</tr>
					</form>
				</tbody>
			</table>
		</div>
	</div>
@stop


