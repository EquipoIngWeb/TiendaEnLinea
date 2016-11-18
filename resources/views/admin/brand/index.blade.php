@extends('admin.app')
@section('header')
 Marcas
@stop
@section('content')
	@foreach ($brands->chunk(6) as $row)
		<div class="row">
			@each ('admin.brand.item', $row, 'brand')
			<div class="clearfix"></div>
		</div>
	@endforeach

	<a href="{{ url('/admin/brands/create') }}" class="btn btn-default">Nueva Marca</a>

@stop

