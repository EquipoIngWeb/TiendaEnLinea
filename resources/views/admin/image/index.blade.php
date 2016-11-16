@extends('admin.app')
@section('header')
Imagenes Registradas en la Plataforma
@stop
@section('content')
	<style>
		.row{
			margin: 20px auto;
		}
		.img-responsive{
			height: 80px;
			margin: 1px auto;
		}
		.tab-current a{
			font-size: 14px!important;
			color:#000!important;
		}
		.tab-current a:hover{
			color: #000!important;
		}
		form{
			display: inline-block;
		}
	</style>
	<h2><i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i> {{$root}}
	</h2>

	<h3>CARPETAS</h3>
	<div class="graph">
		<nav>
			<ul>
				<form action="{{ url('admin/images/') }}" method="get">
					<li class="tab-current">
						<button type="submit" class="btn btn-default icon-cup">
							<span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span>
							Principal
						</button>
					</li>
				</form>
				<li class="tab-current">
					<a href="{{URL::previous()}}" class="btn btn-default icon-cup">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Atras
					</a>
				</li>
				@foreach ($directories as $directory)
				<form action="{{ url('admin/images/') }}" method="get">
					<input type="hidden" name="directory" value="{{$directory}}">
					<li class="tab-current">
						<button type="submit" class="btn btn-default icon-cup">
							<span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span>
							{{str_replace($root,"", $directory)}}
						</button>
					</li>
				</form>
				@endforeach
			</ul>
		</nav>
	</div>
	<h3>IMAGENES</h3>
	<p>Agregar Imagenes a esta carpeta</p>
	<form action="{{ url("admin/images/upload") }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="hidden" name="root" value="{{$root}}">
		<div class="form-group">
			<label class="control-label">Nuevo Archivo</label>
			<input type="file" onchange="this.form.submit()" class="form-control" name="images[]"  multiple=""  accept=" image/jpeg, image/png">
		</div>
	</form>
	@foreach($images->chunk(5) as $imgs)
		<div class="row">
			@each ('admin.image.image', $imgs, 'image')
		</div>
	@endforeach
@stop


