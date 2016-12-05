@extends('admin.app')
@section('breadcrumb')
	@php
		$breadcrumb=[
			['url'=>url('admin'),'name'=>'Ménu Principal'],
			['name'=>'Banners ']
		];
	@endphp
@stop
@section('header')
 Marcas
<a href="" data-toggle="modal" data-target=".bs-example-modal-lg"  class="btn btn-default">Nuevo Banner</a>

@stop
@section('content')
	@foreach ($banners->chunk(2) as $row)
		<div class="row">
			@foreach ($row as $banner)
				<div class="col-md-6">
					<div class="thumbnail image product">
						<img src="{{ $banner->image }}"  alt="" >
						<div class="caption">
							<h4><a href="details.html"> {{$banner->description}}</a></h4>
							<div class="options">
								<a href="{{ url("admin/banners/$banner->id/edit") }}" class="btn btn-primary">editar</a>
								<form action="{{ url("admin/banners/$banner->id") }}" method="POST">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button type="submit" class="btn btn-primary btn-delete">Eliminar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	@endforeach
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="{{ url('admin/banners') }}" method="POST" class="form-horizontal" ccept-charset="UTF-8" enctype="multipart/form-data" style="display: block;">
				{{csrf_field()}}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="gridSystemModalLabel">Nuevo Banner</h4>
				</div>
				<div class="modal-body">
					<div class="form-group has-feedback {{ $errors->has('description')?'has-error ':''}}">
				    	<label class="col-sm-2 control-label" >Descripción a mostrar:</label>
					    <div class="col-sm-10">
							<input type="text" name="description" class="form-control" value="{{old('description')}}" required="required">
						    @if ($errors->has('description'))
					    	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		                        <span class="help-block">
		                            <strong>{{ $errors->first('description') }}</strong>
		                        </span>
		                    @endif
					    </div>
					</div>
					<div class="form-group has-feedback {{ $errors->has('image')?'has-error ':''}}">
					    	<label class="col-sm-2 control-label" >Imagen:</label>
						    <div class="col-sm-10">
								<input type="file" name="image" class="form-control" required="required" accept=" image/jpeg, image/png">
						        @if ($errors->has('image'))
						    	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
			                        <span class="help-block">
			                            <strong>{{ $errors->first('image') }}</strong>
			                        </span>
			                    @endif
						    </div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div>
</div>
@stop
@section('script')
	<script>
		$(document).ready(function() {
			@if (count($errors) > 0)
			    $('.modal').modal('show');
			@endif
		});
	</script>
@stop

