@extends('layouts.app')

@section('content')
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Inicio de Sesión</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">
				Iniciar Sesión
			</h3>
			{{-- <p class="est animated wow zoomIn" data-wow-delay=".5s">
				Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
				deserunt mollit anim id est laborum.
			</p>
			 --}}
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form  role="form" method="POST" action="{{ url('/login') }}">
					{{ csrf_field() }}
					<input type="text" name="username" placeholder="Usuario" value="{{ old('username') }}" required autofocus>
					<input type="password" name="password" placeholder="Contraseña" required >
					<div class="register-check-box animated wow slideInUp" data-wow-delay=".5s">
						<div class="check">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Recordarme</label>
						</div>
					</div>
					<div class="forgot">
						<a href="{{ url('/password/reset') }}">
							Olvido su contraseña?
						</a>
					</div>
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							@foreach ($errors->all() as $error)
								{{ $error }} <br>
							@endforeach
						</div>
					@endif

					<input type="submit" value="Login">
				</form>
			</div>
			<h4 class="animated wow slideInUp" data-wow-delay=".5s">Para nuevos clientes</h4>
			<div class="register-home animated wow slideInUp" data-wow-delay=".5s">
				<a href="{{ url('register') }}">Registrese Aqui</a>
			</div>
		</div>
	</div>
<!-- //login -->

@endsection
