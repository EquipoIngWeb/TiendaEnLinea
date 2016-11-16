@extends('admin.app')
@section('header')
	Nueva Talla
@stop
@section('content')
<div class="panel panel-widget forms-panel">
	<div class="forms">
		<div class="form-grids widget-shadow">
	   {{--      <div class="form-title">
				<h4>Agregar Nueva Categoria:</h4>
			</div>
		--}}     <div class="form-body">
				<form action="{{ url('admin/sizes') }}" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="inputName">Nombre de la Talla:</label>
						<input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Nombre" required>
					</div>
				   <button type="submit" class="btn btn-default">Guardar</button>
				   <a href="{{ url('admin/sizes') }}" class="btn btn-danger">Cancelar</a>
			   </form>
		   </div>
	   </div>
   </div>
</div>
@stop
