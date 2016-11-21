@extends('layouts.app')
@section('content')
<div class="container row">
	<div class="col s12 m4 center">
		<h1 class="col-xs-12 text-center">{{$product->name}}</h1>
		<img src="{{$product->image}}" width="100%">
	</div>
	<div class="col s12 m7 offset-m1">
		<br><br>
		<h2>Marca:</h2>
		<p><img src="{{$product->brand->image}}" alt="Marca {{$product->brand->name}}" class="responsive-img" width="50px"> {{$product->brand->name}}</p>
		<h2>Descripcion:</h2>
		<p>{{$product->description or 'No hay descripcion disponible.'}}</p>
		<h2>Precio: </h2>
		<p>$ {{ $product->price or 'Ha ocurrido un problema, no hemos podido encontrar el precio de este articulo, porfavor intentalo mas tarde.'}}</p>
		@if (sizeof($product->specifications)>0)
			<form action="{{ url('user/sale/') }}" method="post">
				{{csrf_field()}}
				<h2>Especificaciones:</h2>
				<div class="input-field col s8">
					<select name="specification_id">
						<option value="" disabled selected>Seleccione una opción</option>
						@foreach ($product->specifications as $specification)
							@if ($specification->inventory != null && $specification->inventory->amount != 0)
								<option value="{{$specification->id}}">Talla: {{$specification->size->name }} - Color: {{$specification->color->name }} </option>
							@endif
						@endforeach
					</select>
				</div>
				<div class="input-field col s4">
					<input placeholder="Cantidad" name="amount" type="number" class="validate">
					<label for="first_name">Cantidad:</label>
		        </div>
				<button type="submit" class="btn">COMPRAR</button>
			</form>
		@endif
	</div>
</div>
<div class="container row">
	<div class="col s12 m8 offset-m2">
		@if (!Auth::guest())
			<div class="row">
			<form action="{{ url('user/score/') }}" method="post">
				{{csrf_field()}}
				<input type="hidden" name="product_id" value="{{$product->id}}">
				<h2>Califica el producto:</h2>
				<div class="input-field col s8">
					<select name="score" onchange="this.form.submit();">
						<option value="" disabled selected>Seleccione una opción</option>
						<option value="0" >0</option>
						<option value="1" >1</option>
						<option value="2" >2</option>
						<option value="3" >3</option>
						<option value="4" >4</option>
						<option value="5" >5</option>
					</select>
		        </div>
			</form></div>
		@endif
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
