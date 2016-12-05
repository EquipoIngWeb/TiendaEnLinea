@extends('admin.app')
@section('header')
	Agregar Categorias
@stop
@section('content')
<div class="panel panel-widget forms-panel">
	<div class="forms">
		<div class="form-grids widget-shadow">
	   {{--      <div class="form-title">
				<h4>Agregar Nueva Categoria:</h4>
			</div>
		--}}     <div class="form-body">
				<form action="{{ url('admin/categories/add'.$route) }}" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="exampleInputEmail1">Nombre de Categoria:</label>
						<input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Nombre" required>
					</div>
					<div class="form-group">
						<label for="textareaDescription" >Descripcion:</label>
						<textarea name="description" value="{{old('description')}}" class="form-control" rows="3" required="required"></textarea>
					</div>
				   <button type="submit" class="btn btn-default">Guardar</button>
				   <a href="{{ url('admin/categories') }}" class="btn btn-danger">Cancelar</a>
			   </form>
		   </div>
	   </div>
   </div>
</div>
@stop
