@extends('admin.app')
@section('header')
	Calificaciones <small>de Articulos</small>
@stop
@section('content')
<div class="panel panel-warning">
	<div class="panel-heading">CALIFICACIONES</div>
	<table class="table">
		<thead>
			<tr>
				<th>ARTICULO</th>
				<th>USUARIO</th>
				<th>CALIFICACIÓN</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($scores as $score)
				<tr>
					<td>{{$score->product->name}}</td>
					<td>{{$score->user->full_name}}</td>
					<td>{{$score->score}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop

