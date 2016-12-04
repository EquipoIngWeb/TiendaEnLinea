@extends('layouts.app')
@section('content')
<div class="container row">
	<div class="col s12 m6 center">
		<h1 class="col-xs-12 text-center">{{$product->name}}</h1>
		<img src="{{$product->image}}" width="100%">
	</div>
	<div class="col s12 m5 offset-m1">
		<br><br>
		<h5>Marca:</h5>
		<p><img src="{{$product->brand->image}}" alt="Marca {{$product->brand->name}}" class="responsive-img" width="50px"></p>
		<h5>Descripcion:</h5>
		<p>{{$product->description or 'No hay descripcion disponible.'}}</p>
		<h5>Precio: <div style="display: inline-block;"><b>$</b> <span class="price">{{ $product->price }} </span><b style="font-size: 0.8em;" class="orange-text">MXN</b></div></h5>
		<h5>Color: <div style="display:inline-block;width: 25px; height: 25px;background: {{$product->color->example}};"></div>
		 </h5>
		@if (sizeof($product->specifications)>0)
			<h5>Tallas Dispobibles</h5>
			@foreach ($product->specifications as $specification)
				<span> {{$specification->size->name}} /</span>
			@endforeach
			<form action="{{ url('user/sale/') }}" method="post">
				{{csrf_field()}}
				<h2>Especificaciones:</h2>
				<div class="input-field col s8">
					<select name="specification_id" class="sizes">
						<option value="" disabled selected>Seleccione una opción</option>
						@foreach ($product->specifications as $specification)
							@if ($specification->inventory != null && $specification->inventory->amount != 0)
								<option data-id="{{$specification->price}}" value="{{$specification->id}}"> Talla: {{$specification->size->name }} </option>
							@endif
						@endforeach
					</select>
				</div>
				<div class="input-field col s4">
					<input placeholder="Cantidad" name="amount" type="number" min="1" value="1" class="validate">
					<label for="first_name">Cantidad:</label>
		        </div>
				<button type="submit" class="btn">COMPRAR</button>
			</form>
		@else
		<b class="red-text">Sin tallas disponibles</b>
		@endif
	</div>
</div>
<div class="container row">
	<div class="col s12 m8 offset-m2">
			@if (!Auth::guest())
			<div class="row">
				<input type="hidden" name="product_id" value="{{$product->id}}">
				<h2>Califica el producto:</h2>
				@php
				$score = $product->scores->avg('score');
				@endphp
				<div class="ec-stars-wrapper" >
					@for ($i = 0; $i < 5 ; $i++)
						@if ($score > $i+1)
							<a href="{{ url('user/product/'.$product->id.'/score/'.($i+1)) }}" style="color: rgb(39, 130, 228);" title="Votar con {{$i+1}} estrellas">&#9733;</a>
						@else
							<a href="{{ url('user/product/'.$product->id.'/score/'.($i+1)) }}" title="Votar con {{$i+1}} estrellas">&#9733;</a>
						@endif
					@endfor
				</div>
				<span style="font-size: 18px;" class="badge black white-text">{{$score}}</span>
			</div>
		@endif
		<h3>Lo que la gente cuenta:</h3>
		<ul class="collection">
			@foreach($product->comments as $comment)
				@if ($comment->status == 1)
					<li class="collection-item">
						<i class="material-icons">person_pin</i>
						<span class="title"><b>{{$comment->user->username}}</b></span>
						<p>{{$comment->message}}</p>
					</li>
				@endif
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
<style>
	.ec-stars-wrapper {
	font-size: 0;
	display: inline-block;
	}
	.ec-stars-wrapper a {
		text-decoration: none;
		display: inline-block;
		/* Volver a dar tamaño al texto */
		font-size: 32px!important;
		font-size: 2rem!important;

		color: #888;
	}

	.ec-stars-wrapper:hover a {
		color: rgb(39, 130, 228);
	}
	.ec-stars-wrapper > a:hover ~ a {
		color: #888;
	}
</style>
@stop
@section('script')
	<script>
		$(document).ready(function() {
			$('.sizes').change(function(event) {
				var op= null;
				$( ".sizes option:selected" ).each(function() {
	      			op = $( this );
	    		});
				console.log(op.data('id'));
	    		$('.price').html(op.data('id'));
			});
		});
	</script>
@endsection
