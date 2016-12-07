@extends('admin.app')
	@php
		$breadcrumb=[
			['url'=>url('admin'),'name'=>'Ménu Principal'],
			['url'=>url('admin/brands'),'name'=>'Marcas'],
			['name'=>'Edición de '.$brand->name]
		];
	@endphp
@section('header')
	Edición de {{$brand->name}}
@stop
@section('content')
<div class="panel panel-default">
	<div class="panel-body">
			<div class="row">
				<div class="col-md-4">
					<img src="{{ url($brand->image) }}" class="img-responsive">
				</div>
				<div class="col-md-8">

					<form action="{{ url('admin/brands/'.$brand->id) }}" method="POST" class="form-horizontal" ccept-charset="UTF-8" enctype="multipart/form-data" style="display: block;">
						{{csrf_field()}}
						{{method_field('PUT')}}
		 				<div class="modal-body">
							<div class="form-group has-feedback {{ $errors->has('name')?'has-error ':''}}">
						    	<label class="col-sm-2 control-label" >Nombre:</label>
							    <div class="col-sm-10">
									<input type="text" name="name" class="form-control" value="{{$brand->name or old('name')}}" required="required">
								    @if ($errors->has('name'))
							    	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
				                        <span class="help-block">
				                            <strong>{{ $errors->first('name') }}</strong>
				                        </span>
				                    @endif
							    </div>
							</div>
							<div class="form-group has-feedback {{ $errors->has('url')?'has-error ':''}}">
						    	<label class="col-sm-2 control-label" >Url de Página:</label>
							    <div class="col-sm-10">
									<input type="text" name="url" class="form-control" value="{{$brand->url or old('url')}}" required="required">
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
										<input type="file" name="image" class="form-control" accept=" image/jpeg, image/png">
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
							<a href="{{ url('admin/brands') }}" class="btn btn-default">Cancelar</a>
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</form>
				</div>
			</div>

	</div>
</div>
@stop
