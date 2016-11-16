@extends('admin.app')
@section('header')
 Tallas de Articulos
@stop
@section('content')
	@foreach ($sizes->chunk(4) as $row)
		<div class="grids_of_4">
			@each ('admin.size.item', $row, 'size')
			<div class="clearfix"></div>
		</div>
	@endforeach
	<a href="{{ url('/admin/sizes/create') }}" class="btn btn-default">Nueva Talla</a>

@stop

