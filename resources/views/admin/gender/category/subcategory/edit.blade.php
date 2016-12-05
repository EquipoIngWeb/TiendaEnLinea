@extends('admin.app')
@section('breadcrumb')
	@php
		$breadcrumb=[
			['url'=>url('admin'),'name'=>'Ménu Principal'],
			['url'=>url('admin/genders/'),'name'=>'Generos'],
			['url'=>url('admin/genders/'.$subcategory->category->gender->id),'name'=>$subcategory->category->gender->name],
			['url'=>url('admin/categories/'.$subcategory->category->id),'name'=>$subcategory->category->name],
			['name'=>'Edición '.$subcategory->name]
		];
	@endphp
@stop
@section('header')
{{$subcategory->category->gender->name}} - {{$subcategory->category->name}} - {{$subcategory->name}} <small>Edición</small>
@stop
@section('content')
<div class="panel panel-default">
	<div class="panel-body">
			<form action="{{ url('admin/subcategories/'.$subcategory->id) }}" method="POST" class="form-horizontal" ccept-charset="UTF-8" enctype="multipart/form-data" style="display: block;">
				{{csrf_field()}}
				{{method_field('PUT')}}
				<input type="hidden" name="category_id" value="{{$subcategory->category->id}}">
 				<div class="modal-body">
					<div class="form-group has-feedback {{ $errors->has('name')?'has-error ':''}}">
				    	<label class="col-sm-2 control-label" >Nombre:</label>
					    <div class="col-sm-10">
							<input type="text" name="name" class="form-control" value="{{$subcategory->name or old('name')}}" required="required">
						    @if ($errors->has('name'))
					    	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		                        <span class="help-block">
		                            <strong>{{ $errors->first('name') }}</strong>
		                        </span>
		                    @endif
					    </div>
					</div>
					<div class="form-group has-feedback {{ $errors->has('description')?'has-error ':''}}">
				    	<label class="col-sm-2 control-label" >Descripción:</label>
					    <div class="col-sm-10">
							<textarea name="description" id="textareaDescription" class="form-control" rows="3">{{$subcategory->description or old('description')}}</textarea>
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
					<a href="{{ url('admin/categories/'.$subcategory->category->id) }}" class="btn btn-default">Cancelar</a>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
	</div>
</div>
@stop
