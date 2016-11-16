<div class="grid1_of_4">
	<div class="content_box text-center">
		<h4>
			 {{$color->name}}
		</h4>
			<div class="example" style="background: {{$color->example}};margin: 0 auto;">
		</div>
		<div class="grid_1 simpleCart_shelfItem">
			<div class="item_add"><span class="item_price">
				<form action="{{ url("admin/colors/$color->id") }}" method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></span>
				</form>
			</div>
		</div>
	</div>
</div>
