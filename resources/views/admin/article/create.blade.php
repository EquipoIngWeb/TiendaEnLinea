@extends('admin.app')
@section('header')
Agregar Articulo <small>a <span class="category">{{$category->name}}</span></small>
@stop
@section('content')
<div class="panel panel-widget forms-panel">
			<div class="form-body">
				<form action="{{ url('admin/products/') }}" method="POST">
					{{ csrf_field() }}
					<input type="hidden" value="{{URL::previous()}}" name="redirect">
					<input type="hidden" value="{{$category->id}}" name="category">
					<div class="form-group">
						<label for="inputName">Nombre del articulo:</label>
						<input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Nombre" required>
					</div>
					<div class="form-group">
						<label for="inputPrice">Precio:</label>
						<input type="text" class="form-control" name="price" value="{{old('price')}}" placeholder="Nombre" required>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-2 control-label">Marca:</label>
							<select name="brand_id"  class="form-control">
								<option value=""  desabled>-- Select One --</option>
								@foreach ($brands as $brand)
									<option value="{{$brand->id}}">{{$brand->name}}</option>
								@endforeach
							</select>
					</div>
					<button type="submit" class="btn btn-warning">Guardar</button>
					<a href="{{ URL::previous()}}" class="btn btn-danger">Cancelar</a>
				</form>
			</div>
</div>
@stop
