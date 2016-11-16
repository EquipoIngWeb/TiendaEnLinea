<div class="col-md-2">
	<div class="content_box text-center">
		<img src="{{ asset($image['url']) }}" alt="" class="img-responsive">
		<h4>
			{{$image['name']}}
		</h4>
		<div class="grid_1 simpleCart_shelfItem">
			<div class="item_add">
				<span class="item_price">
					<form action="{{ url("admin/images/delete") }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="hidden" name="image" value="{{$image['url']}}">
						<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
					</form>
				</span>
			</div>
		</div>
	</div>
</div>
