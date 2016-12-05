@extends('admin.app')
@section('header')
Categorias
@stop
@section('content')
<div class="panel panel-default">
{{-- 	<div class="panel-heading">
		<h3 class="panel-title">Panel title</h3>
	</div>
 --}}
 	<div class="panel-body">
		<ul class="categories">
			@foreach ($categories as $category_first)
				<li>
					<a class="btn btn-primary btn-options" data-toggle="collapse" data-target="#fc{{$category_first->id}}">
						{{ $category_first->name }}
						@if (sizeof($category_first->children)>0)
						<b class="caret"></b>
						@endif
					</a>
					<a href="{{ url('admin/categories/add/'.$category_first->id) }}" class="btn btn-success btn-options"><span class="glyphicon glyphicon-plus" ></span></a>
					<form action="{{ url("admin/images/upload") }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="hidden" name="root" value="{{"images/categories/$category_first->id-$category_first->name"}}">
						<div class="fileUpload btn btn-primary">
							<span><span class="glyphicon glyphicon-picture" aria-hidden="true"></span></span>
							<input type="file" name="images[]"  accept=" image/jpeg, image/png" class="upload" onchange="this.form.submit()"  />
						</div>
					</form>
					<img src="{{$category_first->image}}" alt="">
					@if (sizeof($category_first->children)>0)
						<ul id="fc{{$category_first->id}}" class="collapse categories">
							@foreach ($category_first->children as $category_second)
								<li>
									<a class="btn btn-primary btn-options" data-toggle="collapse" data-target="#sc{{$category_second->id}}">{{ $category_second->name }}
										@if (sizeof($category_second->children)>0)
										<b class="caret"></b>
										@endif
									</a>
									<a href="{{ url('admin/categories/add/'.$category_second->id) }}" class="btn btn-success btn-options"><span class="glyphicon glyphicon-plus" ></span></a>
									<form action="{{ url("admin/images/upload") }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
										{{ csrf_field() }}
										<input type="hidden" name="root" value="{{"images/categories/$category_second->id-$category_second->name"}}">
										<div class="fileUpload btn btn-primary">
											<span><span class="glyphicon glyphicon-picture" aria-hidden="true"></span></span>
											<input type="file" name="images[]"  accept=" image/jpeg, image/png" class="upload" onchange="this.form.submit()"  />
										</div>
									</form>
									<img src="{{$category_second->image}}" alt="">
								</li>
								@if (sizeof($category_second->children)>0)
									<ul id="sc{{$category_second->id}}" class="collapse categories">
										@foreach ($category_second->children as $category_third)
											<li>
												<a href="" class="btn btn-primary btn-options">{{ $category_third->name }}</a>
												<form action="{{ url("admin/images/upload") }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
													{{ csrf_field() }}
													<input type="hidden" name="root" value="{{"images/categories/$category_second->id-$category_second->name"}}">
													<div class="fileUpload btn btn-primary">
														<span><span class="glyphicon glyphicon-picture" aria-hidden="true"></span></span>
														<input type="file" name="images[]"  accept=" image/jpeg, image/png" class="upload" onchange="this.form.submit()"  />
													</div>
												</form>
												<img src="{{$category_third->image}}" alt="">
											</li>
										@endforeach
									</ul>
								@endif
							@endforeach
						</ul>
					@endif
				</li>
			@endforeach
		</ul>
		<a href="{{ url('/admin/categories/create') }}" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Categoria Principal</a>
	</div>
</div>
@stop

