@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12 m8 offset-m2  l6 offset-l3">
				<h1>
					<i class="material-icons" style="font-size:50px; vertical-align: middle;">perm_identity</i>
					{{$user->full_name}} <b class="hide-on-med-and-down"> - {{$user->username}}</b>
				</h1>
				<h2>Mi informacion:</h2>
				<ul>
					<li><b>Correo:</b> {{$user->email}}</li>

				</ul>
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