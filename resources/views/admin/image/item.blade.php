<div class="grid1_of_4">
	<div class="content_box ">
		<h1>
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
		</h1>
		<h4>
			asdasdasdasd
			{{-- {{$user->full_name}}  --}}
		</h4>
		<p>
			{{-- Usuario: <strong>{{$user->username}}</strong> --}}
		</p>
		<p>
			{{-- Correo: <strong>{{$user->email}}</strong> --}}
		</p>
		<div class="grid_1 simpleCart_shelfItem">
			<div class="item_add"><span class="item_price">
				{{-- <form action="{{ url("admin/users/$user->id") }}" method="POST"> --}}
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></span>
				</form>
			</div>
		</div>
	</div>
</div>
