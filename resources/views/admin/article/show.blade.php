@extends('admin.app')
@section('header')
Articulo {{$product->name}}
@stop
@section('content')
<div class="panel panel-warning">
	<div class="panel-heading">
		<h3 class="panel-title">IMAGENES</h3>
	</div>
	<div class="panel-body">
		<form action="{{ url("admin/images/upload") }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" name="root" value="{{$root}}">
			<div class="fileUpload btn btn-primary">
				<span>Subir Imagenes</span>
				<input type="file" name="images[]"  multiple=""  accept=" image/jpeg, image/png" class="upload" onchange="this.form.submit()"  />
			</div>
		</form>
		@foreach($images->chunk(5) as $imgs)
		<div class="row">
			@foreach ($imgs as $image)
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
								<button type="submit" class="btn btn-primary ">
									<span class="glyphicon glyphicon-trash"></span>
								</button>
							</form>
							<form action="{{ url("admin/images/setdefault") }}" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="root" value="{{$root}}">
								<input type="hidden" name="image" value="{{$image['url']}}">
								<button type="submit" class="btn  btn-primary">
									<span class="glyphicon glyphicon-star-empty"></span>
								</button>
							</form>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$image['name']}}">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</button>
							<div class="modal fade" id="edit{{$image['name']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">
											Cambiar nombre a <span class="category">{{$image['name']}}</span>
											</h4>
										</div>
										<form action="{{ url('admin/images/change') }}" method="POST">
											{{ csrf_field() }}
											<input type="hidden" name="root" value="{{$root}}">
											<input type="hidden" name="image" value="{{$image['url']}}">
											<div class="modal-body">
												<div class="form-horizontal">
													<div class="form-group">
														<label for="inputName" class="col-sm-5 control-label">Nuevo nombre:</label>
														<div class="col-sm-7">
															<input type="text" name="name" class="form-control" value="{{old('name')}}" required="required">
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
												<button type="submit" class="btn btn-warning">GUARDAR</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		@endforeach
	</div>
</div>

@stop


