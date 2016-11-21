<div class="col-md-2">
	<div class="thumbnail image">
		<h3>COLOR</h3>
		<div class="caption">
			<h4 style="background: {{$color->example}};">
				 {{$color->name}}
			</h4>
			<div class="options">
				<form action="{{ url("admin/colors/$color->id") }}" method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-trash" ></span></button>
				</form>
			</div>
		</div>
	</div>
</div>

