@extends('layouts.app')
@section('content')

<!-- login -->
	<div class="container row">
		<div class="col s12 m6 offset-m3">
			<h1 class="center">
				Iniciar Sesión
			</h1>


			<form  role="form" method="POST" action="{{ url('/login') }}" class="col s12">
				{{ csrf_field() }}
				<div class="input-field col s12">
					<input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus>
					<label for="user">Usuario</label>
				</div>
				<div class="input-field col s12">
					<input id="password" type="password" name="password" required>
					<label for="password">Contraseña</label>
				</div>

				@if (count($errors) > 0)
					<div class="row">
						<div class="col s12 red center white-text">
							@foreach ($errors->all() as $error)
								{{ $error }} <br>
							@endforeach
						</div>
					</div>
				@endif
				<div class="row">
					<div class="col offset-s1">
						<input type="checkbox" id="remember_me" />
						<label for="remember_me">Recordarme</label>
					</div>
				</div>
				<div class="center">
					<input type="submit" value="Login" class="btn blue">
					<a href="{{ url('/password/reset') }}" class="btn red">
						Olvido su contraseña?
					</a>
				</div>
				<br>
				<div class="col s12 center">
					<b>¿ Nuevo por aqui ?</b>
					<div>
						<a href="{{ url('register') }}">Registrate</a>
					</div>
				</div>
			</form>
		</div>
	</div>
<!-- //login -->

@endsection
