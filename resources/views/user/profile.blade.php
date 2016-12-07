@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col s3 m3 l4 ">
					<i class="material-icons" style="font-size:150px; vertical-align: middle;">perm_identity</i>
			</div>
			<div class="col s9 m6 l7 ">
				<h2>
					{{$user->full_name}} <b class="hide-on-med-and-down"> - {{$user->username}}</b>
				</h2>
				<h2>Mi informacion:</h2>
				<ul>
    				<li><b>Correo:</b> {{$user->email}}</li>
					<li><b>Telefono:</b> {{$user->phone}}</li>
					<li><b>País:</b> {{$user->country}}</li>
					<li><b>Ciudad:</b> {{$user->city}}</li>
					<li><b>Direccion:</b> {{$user->address}}</li>
					<li><b>Codigo Postal:</b> {{$user->postal_code}}</li>
				</ul>
				<a href="{{ url(Auth::user()->role_id.'/profile/edit')}}" class="btn blue">Editar Perfil</a>
			</div>
		</div>
	</div>
@endsection
