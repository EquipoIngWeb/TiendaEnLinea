<div class="col-md-3">
	<div class="thumbnail image">
		<h1 style="font-size: 100px;">
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
		</h1>
		<div class="caption">
			<h4>
				{{$user->full_name}}
			</h4>
			<p>
				Usuario: <strong>{{$user->username}}</strong>
			</p>
			<p>
				Correo: <strong>{{$user->email}}</strong>
			</p>
			<div class="options">
					<form action="{{ url("admin/users/$user->id") }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
					</form>
			</div>
		</div>
	</div>
</div>
