@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12 m8 offset-m2  l6 offset-l3">
				<h2>Mis compras:</h2>
				@foreach($myShoppings as $shopping)
					<p>
						<b>Fecha de la compra:</b>
						<a href="{{url('user/ticket/'.$shopping->id)}}">{{$shopping->date}}</a>
					</p>
				@endforeach
			</div>
		</div>
	</div>
@endsection
