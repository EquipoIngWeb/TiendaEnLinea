@extends('layouts.app')

@section('content')
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
			    <form class="animated wow slideInUp" data-wow-delay=".2s" role="form" method="POST" action="{{ url('/register') }}">
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

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            <!-- </div> -->
                        </div>

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
			<div class="register-home animated wow slideInUp" data-wow-delay=".2s">
				<a href="{{url('/inicio')}}">Inicio</a>
			</div>
		</div>
	</div>
@endsection
