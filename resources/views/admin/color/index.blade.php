@extends('admin.app')
@section('breadcrumb')
	@php
		$breadcrumb=[
			['url'=>url('admin'),'name'=>'Ménu Principal'],
			['name'=>'Colores']
		];
	@endphp
@stop
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
	@foreach ($colors->chunk(6) as $row)
		<div class="row">
			@each ('admin.color.item', $row, 'color')
			<div class="clearfix"></div>
		</div>
	@endforeach
	<a href="{{ url('/admin/colors/create') }}" class="btn btn-default">Nuevo Color</a>
@stop

