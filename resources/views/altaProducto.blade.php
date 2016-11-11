@extends('layouts.app')
@section('encabezado')
	<h2>Alta Producto</h2>
@stop

@section('contenido')
	<div class="container" style="background-color:#81DAF5; border-radius: 20px; color: black">
	<form action="{{url('/guardarProducto')}}" method="POST">
	<input type = "hidden" name="_token" value="{{csrf_token() }}">
		<div class="form-group">
		<br>
			<label for="nombre">Nombre</label>
			<input name= "nombre" type="text" class="form-control" placeholder= "Nombre">
		</div>
		<hr>
		<div class="row">
			<div class="col-xs-12">
				<label for="descripcion">Descripción</label>
				<textarea name= "descripcion" type="text" class="form-control" placeholder= "Descripción" rows="3" required></textarea>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-xs-6">
				<label for="codigo">Código</label>
			    <input name= "codigo" type="number" class="form-control" placeholder= "Código">
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-xs-6">
				<label for="costo">Costo</label>
			    <input name= "costo" type="number" class="form-control" placeholder= "Costo">
			</div>
		</div>
		<br>
		<div class="form-group">
		<input type="submit" value="Alta" class="btn btn-info">
		<a href="{{url('/altaProducto')}}" class="btn btn-danger">Cancelar</a>
		</div>
	</form>

@stop