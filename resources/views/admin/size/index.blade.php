@extends('admin.app')
@section('header')
 Tallas de Articulos
@stop
@section('content')
	@foreach ($sizes->chunk(6) as $row)
		<div class="row">
			@each ('admin.size.item', $row, 'size')
		</div>
	@endforeach
	<a href="{{ url('/admin/sizes/create') }}" class="btn btn-default">Nueva Talla</a>
@stop

