@extends('admin.app')
@section('header')
Comentarios de Articulos
@stop
@section('content')
<ul class="list-group comments">
	@forelse ($comments as $comment)
		<li class="list-group-item">
			<span class="options">
				<span class="badge">{{$comment->created_at->diffForHumans()}}</span>
				<a href="{{ url('admin/comments/'.$comment->id.'/aproved') }}" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
				<a href="{{ url('admin/comments/'.$comment->id.'/desaproved') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
			</span>
			<div class="media-object">
				<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
			</div>
			<div>
				<h4 class="media-heading">Articulo: <a href="{{ url('view/'.$comment->product->id) }}">{{$comment->product->name}}</a></h4>
				<h5 class="media-heading">Por: <a href="{{ url('profile/'.$comment->user->username) }}">{{$comment->user->full_name}}</a></h5>
				{{$comment->message }}
			</div>
		</li>
	@empty
	<li class="list-group-item">
		<h3>No hay comentarios por aprobar</h3>
	</li>
	@endforelse
</ul>
@stop


