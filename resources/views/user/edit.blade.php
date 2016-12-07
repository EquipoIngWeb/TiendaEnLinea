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
				</ul>
				<form action="{{ url('user/profile/') }}" method="post">
					{{csrf_field()}}
					{{method_field('put')}}
					<div class="input-field col s12">
						<input id="icon_prefix" type="tel" name="phone" value="{{$user->phone or old('phone')}}"  class="validate">
						<label for="icon_prefix">Teléfono</label>
					</div>
					<div class="input-field col s12">
						<input id="icon_prefix" type="text" name="country" value="{{$user->country or old('country')}}"  class="validate">
						<label for="icon_prefix">País</label>
					</div>
					<div class="input-field col s12">
						<input id="icon_prefix" type="text" name="city" value="{{$user->city or old('city')}}"  class="validate">
						<label for="icon_prefix">Ciudad</label>
					</div>
					<div class="input-field col s12">
						<input id="icon_prefix" type="text" name="address" value="{{$user->address or old('address')}}"  class="validate">
						<label for="icon_prefix">Dirección</label>
					</div>
					<div class="input-field col s12">
						<input id="icon_prefix" type="number" name="postal_code" value="{{$user->postal_code or old('postal_code')}}"  class="validate">
						<label for="icon_prefix">Codigo Posta</label>
					</div>
					<a href="{{ url('user/profile/')}}" class="btn red">Cancelar</a>
					<button type="submit" class="btn blue">Enviar Cambios</button>
				</form>
			</div>
		</div>
	</div>
@endsection
