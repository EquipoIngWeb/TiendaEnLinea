@extends('admin.app')
@section('breadcrumb')
	@php
		$breadcrumb=[
			['url'=>url('admin'),'name'=>'Ménu Principal'],
			['name'=>'Usuarios']
		];
	@endphp
@stop
@section('header')
 Usuarios de la Plataforma
@stop
@section('content')
	@foreach ($users->chunk(4) as $row)
		<div class="grids_of_4">
			@each ('admin.user.item', $row, 'user')
			<div class="clearfix"></div>
		</div>
	@endforeach
@stop

