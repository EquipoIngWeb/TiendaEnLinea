@extends('admin.app')
@section('header')
	<i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>  <small>{{$root}}</small>
@stop
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">CARPETAS</h3>
		</div>
		<div class="panel-body folders">
			<form action="{{ url('admin/images/') }}" method="get">
					<button type="submit" class="btn btn-warning">
						<span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span>
						Principal
					</button>
			</form>
				<a href="{{URL::previous()}}" class="btn btn-warning">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Atras
				</a>
			@foreach ($directories as $directory)
				<form action="{{ url('admin/images/') }}" method="get">
					<input type="hidden" name="directory" value="{{$directory}}">
						<button type="submit" class="btn btn-warning">
							<span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span>
							{{str_replace($root,"", $directory)}}
						</button>
				</form>
			@endforeach
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">IMAGENES</h3>
		</div>
		<div class="panel-body">
			<form action="{{ url("admin/images/upload") }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="root" value="{{$root}}">
				<div class="fileUpload btn btn-primary">
				    <span><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> SUBIR IMAGENES</span>
				    <input type="file"  class="upload" onchange="this.form.submit()"  name="images[]"  multiple=""  accept=" image/jpeg, image/png" />
				</div>
			</form>

			@foreach($images->chunk(6) as $imgs)
				<div class="row">
					@each ('admin.image.image', $imgs, 'image')
				</div>
			@endforeach

		</div>
	</div>
@stop


