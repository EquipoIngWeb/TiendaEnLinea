@extends('admin.app')
@section('header')
 Comentarios de Articulos
@stop
@section('content')
<style>
	ul{
		list-style: none;
	}
	ul li{
		border: 1px solid #000;
		margin: 5px;
		padding: 4px;
		position: relative;
	}
	ul li .options{
		position: absolute;
		right: 0;
		top:0;
	}
</style>
<ul>
	@foreach ($comments as $comment)
		<li>
			<span class="options">
				<a href="{{ url('admin/comments/'.$comment->id.'/desaproved') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
				<a href="{{ url('admin/comments/'.$comment->id.'/aproved') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
			</span>
			Articulo: {{$comment->product->name}}
			<br>Por: <strong>{{$comment->user->full_name}}</strong>
			<br>Comentario: {{$comment->message }}
		</li>
	@endforeach
</ul>
@stop

