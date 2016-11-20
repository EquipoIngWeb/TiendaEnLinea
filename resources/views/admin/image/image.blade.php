<div class="col-md-2">
	<div class="thumbnail image">
		<img src="{{ asset($image['url']) }}" alt="..."> {{-- class="img-responsive" --}}
		<div class="caption">
			<h4>
				{{$image['name']}}
			</h4>
			<div class="options">
				<form action="{{ url("admin/images/delete") }}" method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<input type="hidden" name="image" value="{{$image['url']}}">
					<button type="submit" class="btn btn-primary btn-delete">
						<span class="glyphicon glyphicon-trash"></span> ELIMINAR
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

