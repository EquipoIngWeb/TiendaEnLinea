@extends('layouts.app')
@section('content')

	<div class="container row">
		<div class="col s12 m6 offset-m3">
			<h1>Registrese Aquí</h1>
<<<<<<< HEAD
<<<<<<< HEAD
			<form role="form" method="POST" action="{{ url('/store') }}">
=======
			<form role="form" method="POST" action="{{ url('store') }}">
>>>>>>> 0d15d5d845f3542d2f5dba64a4a0b1f46ce2480a
=======
			<form role="form" method="POST" action="{{ url('store') }}">
>>>>>>> d3730c98a0dc620f1b5ed174f58574afca9be011
				{{ csrf_field() }}

				<div class="input-field col s12">
					<input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus>
					<label for="user">Usuario</label>
					@if ($errors->has('username'))
						<div class="red white-text">
							{{ $errors->first('username') }}
						</div>
					@endif
				</div>

				<div class="input-field col s12">
					<input id="full_name" type="text" name="full_name" value="{{ old('full_name') }}" required>
					<label for="full_name">Nombre completo</label>
					@if ($errors->has('full_name'))
						<div class="red white-text">
							{{ $errors->first('full_name') }}
						</div>
					@endif
				</div>

				<div class="input-field col s12">
					<input id="email" type="text" name="email" value="{{ old('email') }}" required>
					<label for="email">Correo</label>
					@if ($errors->has('email'))
						<div class="red white-text">
							{{ $errors->first('email') }}
						</div>
					@endif
				</div>

				<div class="input-field col s12">
					<input id="password" type="password" name="password" required>
					<label for="password">Clave</label>
					@if ($errors->has('password'))
						<div class="red white-text">
							{{ $errors->first('password') }}
						</div>
					@endif
				</div>

				<div class="input-field col s12">
					<input id="password_confirmation" type="password" name="password_confirmation" required>
					<label for="password_confirmation">Repetir clave</label>
					@if ($errors->has('password_confirmation'))
						<div class="red white-text">
							{{ $errors->first('password_confirmation') }}
						</div>
					@endif
				</div>

				<div class="row">
					<div class="col offset-s1">
						<input type="checkbox" id="remember_me" />
						<label for="remember_me">Acepto los términos y condiciones</label>
					</div>
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

				<input type="submit" value="Registrar" class="btn blue">
				<a href="{{url('/')}}" class="btn red">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
@endsection
