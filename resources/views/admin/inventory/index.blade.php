@extends('admin.app')
@section('breadcrumb')
@php
$breadcrumb=[
['url'=>url('admin'),'name'=>'Ménu Principal'],
['name'=>'Inventario']
];
@endphp
@stop
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
	<div>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#principal" aria-controls="principal" role="tab" data-toggle="tab">
					Todas Las Existencias
				</a></li>
				<li role="presentation">
					<a href="#noExistencia" aria-controls="noExistencia" role="tab" data-toggle="tab">
						Productos Sin Especificaciones
					</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="principal">
						<div class="panel panel-default">
							<!-- Default panel contents -->
							<div class="panel-heading">EXISTENCIA DE PRODUCTOS</div>
							<table class="table">
								<thead>
									<tr>
										<th>#ID</th>
										<th>Nombre</th>
										<th>Marca</th>
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
										<td>{{$inventory->specification->id}}</td>
										<td>{{$inventory->specification->product->name}}</td>
										<td><img src="{{$inventory->specification->product->brand->image}}" alt="{{$inventory->specification->product->brand->name}}" title="{{$inventory->specification->product->brand->name}}" class="img-responsive" width="50px"></td>
										<td><div style="background:{{$inventory->specification->product->color->example}};width: 50px;height: 15px; " title="{{$inventory->specification->product->color->name}}"></div></td>
										<td>{{$inventory->specification->size->name}}</td>
										<td>{{$inventory->specification->price}}</td>
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
											</td>
											<td>
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
					<div role="tabpanel" class="tab-pane" id="noExistencia">
						<div class="panel panel-default">
							<!-- Default panel contents -->
							<div class="panel-heading">EXISTENCIA DE PRODUCTOS</div>
							<table class="table">
								<thead>
									<tr>
										<th>#ID</th>
										<th>Nombre</th>
										<th>Marca</th>
										<th>Color</th>

										<th width="80px">Talla </th>
										<th>Precio</th>
										<th>Existencia</th>
										<th>Opciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($products_no_specifications as $product)
									<form action="{{ url('admin/inventories') }}" method="POST">
										{{ csrf_field() }}
										<tr>
											<td>
												<input type="hidden" name="product_id" value="{{$product->id}}">
											</td>
											<td>
												{{$product->name}}
											</td>
											<td><img src="{{$product->brand->image}}" alt="{{$product->brand->name}}" title="{{$product->brand->name}}" class="img-responsive" width="50px"></td>
											<td><div style="background:{{$product->color->example}};width: 50px;height: 15px; " title="{{$product->color->name}}"></div></td>
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
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			</div>
		@stop
		@section('script')
		<script>
			$(document).ready(function() {
				$('#myTabs a').click(function (e) {
					e.preventDefault()
					$(this).tab('show')
				})
			});
		</script>
		@stop

