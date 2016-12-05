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
						<button type="submit" class="btn btn-primary btn-delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
					</form>
				@endif
			</div>
		</div>
	</div>
</div>
