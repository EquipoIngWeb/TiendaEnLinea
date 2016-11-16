<div class="grid1_of_4">
	<div class="content_box ">
		<h4>
			 {{$size->name}}
		</h4>
		<div class="grid_1 simpleCart_shelfItem">
			<div class="item_add"><span class="item_price">
				<form action="{{ url("admin/sizes/$size->id") }}" method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></span>
				</form>
			</div>
		</div>
	</div>
</div>
