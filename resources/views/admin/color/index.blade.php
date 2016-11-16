@extends('admin.app')
@section('header')
 Colores de Articulos
@stop
@section('content')
	<style>
		div.example{
			width: 50%!important;
			height: 20px!important;
		}
	</style>
	@foreach ($colors->chunk(4) as $row)
		<div class="grids_of_4">
			@each ('admin.color.item', $row, 'color')
			<div class="clearfix"></div>
		</div>
	@endforeach
	<a href="{{ url('/admin/colors/create') }}" class="btn btn-default">Nuevo Color</a>
@stop

