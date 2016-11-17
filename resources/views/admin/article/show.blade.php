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
	</style>

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


