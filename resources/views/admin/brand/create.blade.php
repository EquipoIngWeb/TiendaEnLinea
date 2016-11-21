@extends('admin.app')
@section('header')
	Nueva Marca
@stop
@section('content')
<div class="panel panel-widget forms-panel">
	<div class="forms">
		<div class="form-grids widget-shadow">
	   {{--      <div class="form-title">
				<h4>Agregar Nueva Categoria:</h4>
			</div>
		--}}     <div class="form-body">
				<form action="{{ url('admin/brands') }}" method="POST"  accept-charset="UTF-8" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="inputName">Nombre de la Marca:</label>
						<input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Nombre" required>
					</div>
					<div class="form-group">
						<label for="InputUrl">Url de Página:</label>
						<input type="text" class="form-control" name="url" value="{{old('url')}}" placeholder="Url" required>
					</div>
					<div class="form-group">
						<label for="InputUrl">Logo de Marca:</label>
						<input type="file" class="form-control" name="image"  accept=" image/jpeg, image/png" required>
					</div>

				   <button type="submit" class="btn btn-default">Guardar</button>
				   <a href="{{ url('admin/brands') }}" class="btn btn-danger">Cancelar</a>
			   </form>
		   </div>
	   </div>
   </div>
</div>
@stop
