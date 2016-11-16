@extends('admin.app')
@section('header')
 Categorias
@stop
@section('content')
	@foreach ($brands->chunk(4) as $row)
		<div class="grids_of_4">
			@each ('admin.brand.item', $row, 'brand')
			<div class="clearfix"></div>
		</div>
	@endforeach

	<a href="{{ url('/admin/brands/create') }}" class="btn btn-default">Nueva Marca</a>

@stop

