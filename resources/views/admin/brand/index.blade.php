@extends('admin.app')
@section('breadcrumb')
	@php
		$breadcrumb=[
			['url'=>url('admin'),'name'=>'Ménu Principal'],
			['name'=>'Marcas']
		];
	@endphp
@stop
@section('header')
 Marcas
	<a href="" data-toggle="modal" data-target=".bs-example-modal-lg"  class="btn btn-warning"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Marca</a>
@stop
@section('content')
	@foreach ($brands->chunk(6) as $row)
		<div class="row">
			@each ('admin.brand.item', $row, 'brand')
			<div class="clearfix"></div>
		</div>
	@endforeach
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="{{ url('admin/brands') }}" method="POST" class="form-horizontal" ccept-charset="UTF-8" enctype="multipart/form-data" style="display: block;">
				{{csrf_field()}}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="gridSystemModalLabel">Nueva Marca de Articulo</h4>
				</div>
				<div class="modal-body">
					<div class="form-group has-feedback {{ $errors->has('name')?'has-error ':''}}">
				    	<label class="col-sm-2 control-label" >Nombre:</label>
					    <div class="col-sm-10">
							<input type="text" name="name" class="form-control" value="{{old('name')}}" required="required">
						    @if ($errors->has('name'))
					    	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		                        <span class="help-block">
		                            <strong>{{ $errors->first('name') }}</strong>
		                        </span>
		                    @endif
					    </div>
					</div>
					<div class="form-group has-feedback {{ $errors->has('name')?'has-error ':''}}">
						<label for="inputUrl" class="col-sm-2 control-label">Url Página:</label>
						<div class="col-sm-10">
							<input type="url" name="url"  class="form-control" value="" required="required" title="">
						    @if ($errors->has('url'))
					    	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		                        <span class="help-block">
		                            <strong>{{ $errors->first('url') }}</strong>
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

