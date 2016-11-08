@extends('layouts.app')

@section('content')
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="{{url('/inicio')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Register Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Registrese Aqui</h3>
			{{-- <p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
				deserunt mollit anim id est laborum.</p> --}}
			<div class="login-form-grids">
				{{-- <h5 class="animated wow slideInUp" data-wow-delay=".5s">profile information</h5> --}}
			    <form class="animated wow slideInUp" data-wow-delay=".5s" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
					<input type="text" name="username" placeholder="Usuario" required=" " >
					<input type="text" name="full_name" placeholder="Nombre Completo" required=" " >
					<br>
					<input type="email" name="email" placeholder="Correo Electronico" required=" " >
					<input type="password" name="password" placeholder="Contraseña" required=" " >
					<input type="password" name="password_confirmation" placeholder="Confirmación Contraseña" required=" " >
					<div class="register-check-box">
						<div class="check">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Acepto los términos y condiciones</label>
						</div>
					</div>
					@if (count($errors) > 0)
						<br>
						<div class="alert alert-danger">
								@foreach ($errors->all() as $error)
									{{ $error }} <br>
								@endforeach
						</div>
					@endif
					<input type="submit" value="Registrar">
				</form>
			</div>
			<div class="register-home animated wow slideInUp" data-wow-delay=".5s">
				<a href="{{url('/inicio')}}">Inicio</a>
			</div>
		</div>
	</div>
@endsection
