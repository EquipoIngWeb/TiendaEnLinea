@extends('layouts.app')
@section('content')
	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-4">
					<h1 class="col-xs-12 text-center">{{$product->name}}</h1>
					<img src="{{$product->image}}" width="100%" >
				</div>
				<div class="col-xs-12 col-md-8">

					<h2>Descripcion: </h2>
					<p>{{$product->description or 'No hay descripcion disponible.'}}</p>

					<h2>Precio: </h2>
					<p>$ {{ $product->price or 'Ha ocurrido un problema, no hemos podido encontrar el precio de este articulo, porfavor intentalo mas tarde.'}}</p>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<h3>Comentarios del producto:</h3>
					@foreach($product->comments as $comment)
						<hr>
						<b>{{$comment->user->username}} dice:</b>
						<p>{{$comment->message}}</p>
					@endforeach
					<hr>
					
					@if (Auth::guest())
						<a class="btn" href="{{url('/login')}}">Inicia sesion para dejar un mensaje.</a>
					@else
						<form  role="form" method="POST" action="{{ url('/user/see/'.$product->id) }}">
							{{ csrf_field() }}

							<textarea style="width: 100%;" placeholder="Dejanos un mensaje" name="message"></textarea>
							<input type="submit" value="Dejar mensaje" class="btn">
						</form>
					@endif
				</div>

			</div>
		</div>
	</div>
@stop