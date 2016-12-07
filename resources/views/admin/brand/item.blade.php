<div class="col-md-2">
	<div class="thumbnail image product">
		<a href="http://{{$brand->url}}" class="text-center">
			<img src="{{ $brand->image }}"  alt="" >
		</a>
		<div class="caption">
			<h4>
				<a href="http://{{$brand->url}}"> {{$brand->name}}</a>
			</h4>
			<div class="options">
				@if ($brand->products->isEmpty())
					<form action="{{ url("admin/brands/$brand->id") }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-primary btn-delete">Borrar</button>
					</form>
				@endif
				<a href="{{ url('admin/brands/'.$brand->id.'/edit') }}" class="btn btn-primary">Editar</a>
			</div>
		</div>
	</div>
</div>
