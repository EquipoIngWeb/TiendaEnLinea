@extends('admin.app')
@section('header')
 Articulo {{$product->name}}
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
		.fileUpload {
			position: relative;
			overflow: hidden;
			margin: 10px;
		}
		.fileUpload input.upload {
			position: absolute;
			top: 0;
			right: 0;
			margin: 0;
			padding: 0;
			font-size: 20px;
			cursor: pointer;
			opacity: 0;
			filter: alpha(opacity=0);
		}
	</style>
	<h3>IMAGENES</h3>
	<p>Agregar Imagenes a esta carpeta</p>
	<form action="{{ url("admin/images/upload") }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="hidden" name="root" value="{{$root}}">
		<div class="form-group">
			<label class="control-label">Nuevo Archivo</label>
		</div>
		<div class="fileUpload btn btn-primary">
			<span>Subir Imagenes</span>
			<input type="file" name="images[]"  multiple=""  accept=" image/jpeg, image/png" class="upload" onchange="this.form.submit()"  />
		</div>
	</form>
	@foreach($images->chunk(5) as $imgs)
		<div class="row">
			@each ('admin.image.image', $imgs, 'image')
		</div>
	@endforeach
@stop


