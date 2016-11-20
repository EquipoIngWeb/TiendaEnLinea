@extends('layouts.app')
@section('content')
	<div class="container row">
		<div class="col s12 m4 center">
			<h1 class="col-xs-12 text-center">{{$product->name}}</h1>
			<img src="{{$product->image}}" width="100%">
		</div>
		<div class="col s12 m7 offset-m1">
			<br><br>
			<h2>Descripcion:</h2>
			<p>{{$product->description or 'No hay descripcion disponible.'}}</p>
			<h2>Precio: </h2>
			<p>$ {{ $product->price or 'Ha ocurrido un problema, no hemos podido encontrar el precio de este articulo, porfavor intentalo mas tarde.'}}</p>
		</div>
	</div>
	<div class="container row">
		<div class="col s12 m8 offset-m2">
			<h3>Lo que la gente cuenta:</h3>
			<ul class="collection">
				@foreach($product->comments as $comment)
					<li class="collection-item">
						<i class="material-icons">person_pin</i>
						<span class="title"><b>{{$comment->user->username}}</b></span>
						<p>{{$comment->message}}</p>
					</li>
				@endforeach
			</ul>
			
			@if (Auth::guest())
				<a class="btn" href="{{url('/login')}}">Inicia sesion para dejar un mensaje.</a>
			@else
				<form  role="form" method="POST" action="{{ route('save_comment_product',['product_id'=>$product->id]) }}">
					{{ csrf_field() }}

					<div class="input-field col s12">
						<textarea id="message" name="message" class="materialize-textarea"></textarea>
						<label for="textarea1">Dejanos un mensaje</label>
					</div>
					<input type="submit" value="Dejar mensaje" class="btn">
				</form>
			@endif
		</div>
	</div>
@stop
