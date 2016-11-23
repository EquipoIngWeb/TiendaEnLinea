@extends('layouts.app')
@section('content')
<<<<<<< HEAD
=======
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".2s">
				<li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Registro</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".2s">Registrese Aquí</h3>
			{{-- <p class="est animated wow zoomIn" data-wow-delay=".2s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
				deserunt mollit anim id est laborum.</p> --}}
			<div class="login-form-grids">
				{{-- <h5 class="animated wow slideInUp" data-wow-delay=".2s">profile information</h5> --}}
			    <form class="animated wow slideInUp" data-wow-delay=".2s" role="form" method="POST" action="{{ url('/store') }}">
                    {{ csrf_field() }}

						<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <!-- <label for="username" class="col-md-4 control-label">Usuario</label> -->

                            <!-- <div class="col-md-12"> -->
                                <input id="username" type="text" class="form-control" name="username" placeholder="Usuario" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            <!-- </div> -->
                        </div>

						<div class="form-group{{ $errors->has('full_name') ? ' has-error' : '' }}">
                            <!-- <label for="full_name" class="col-md-4 control-label">Usuario</label> -->

                            <!-- <div class="col-md-12"> -->
                                <input id="full_name" type="text" class="form-control" name="full_name" placeholder="Nombre Completo" value="{{ old('full_name') }}" required autofocus>

                                @if ($errors->has('full_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                @endif
                            <!-- </div> -->
                        </div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <!-- <label for="email" class="col-md-4 control-label">E-Mail</label> -->

                            <!-- <div class="col-md-6"> -->
                                <input id="email" type="email" class="form-control" name="email" placeholder="Correo Electronico" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            <!-- </div> -->
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <!-- <label for="password" class="col-md-4 control-label">Contraseña</label> -->

                            <!-- <div class="col-md-6"> -->
                                <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <!-- </div> -->
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <!-- <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label> -->

                            <!-- <div class="col-md-6"> -->
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" required>
>>>>>>> 1ad0629066d60ac6fd8cf6dc072cb2e18b61e69d

	<div class="container row">
		<div class="col s12 m6 offset-m3">
			<h1>Registrese Aquí</h1>
			<form role="form" method="POST" action="{{ url('/store') }}">
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
