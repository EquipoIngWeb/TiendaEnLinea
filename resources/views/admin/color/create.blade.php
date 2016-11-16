@extends('admin.app')
@section('header')
	Nuevo Color
@stop
@section('content')
<div class="panel panel-widget forms-panel">
	<div class="forms">
		<div class="form-grids widget-shadow">
	   {{--      <div class="form-title">
				<h4>Agregar Nueva Categoria:</h4>
			</div>
		--}}     <div class="form-body">
				<form action="{{ url('admin/colors') }}" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="exampleInputEmail1">Nombre de Color:</label>
						<input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Nombre" required>
					</div>
					<div class="form-group">
						<label for="color" >Ejemplo:</label>
						<input type="color" name="example" value="{{old('example')}}" class="form-control" required="required">
					</div>
				   <button type="submit" class="btn btn-default">Guardar</button>
				   <a href="{{ url('admin/colors') }}" class="btn btn-danger">Cancelar</a>
			   </form>
		   </div>
	   </div>
   </div>
</div>
@stop
