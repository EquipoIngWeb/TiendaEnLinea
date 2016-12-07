@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col s3 m3 l4 ">
					<i class="material-icons" style="font-size:150px; vertical-align: middle;">perm_identity</i>
			</div>
			<div class="col s9 m6 l7 ">
				<h1>
					{{$user->full_name}} <b class="hide-on-med-and-down"> - {{$user->username}}</b>
				</h1>
				<h2>Mi informacion:</h2>
				<ul>
					<li><b>Correo:</b> {{$user->email}}</li>
				</ul>
			</div>
		</div>
	</div>
@endsection
