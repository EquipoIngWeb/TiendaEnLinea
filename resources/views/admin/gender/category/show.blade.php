@extends('admin.app')
@section('breadcrumb')
	@php
		$breadcrumb=[
			['url'=>url('admin'),'name'=>'Ménu Principal'],
			['url'=>url('admin/genders/'),'name'=>'Generos'],
			['url'=>url('admin/genders/'.$category->gender->id),'name'=>$category->gender->name],
			['name'=>$category->name]
		];
	@endphp
@stop
@section('header')
 {{$category->gender->name}} -
 {{$category->name}} <small>Con Subcategorias</small>
<a href="" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-warning"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Subcategoria</a>
@stop
@section('content')
<div class="panel panel-default">
	<div class="panel-body">
		@foreach ($category->subcategories->chunk(4) as $cats)
			<div class="row">
				@foreach ($cats as $subcategory)
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<div class="thumbnail">
							<img src="{{$subcategory->image}}"  alt="">
							<div class="caption">
								<h3>{{$subcategory->name}}</h3>
								@if ($subcategory->description)
									<p>
										{{$subcategory->description}}
									</p>
								@endif
								<p>
									<a href="{{ url('admin/subcategories/'.$subcategory->id.'/edit') }}" class="btn btn-warning">Editar</a>
{{-- 									<a href="{{ url('admin/subcategories/'.$subcategory->id) }}" class="btn btn-primary">subcategorias</a>
 --}}									@if ($subcategory->products->isEmpty())
										<form action="{{ url('admin/subcategories/'.$subcategory->id) }}" method="POST">
											{{method_field('delete')}}
											{{csrf_field()}}
											<button class="btn btn-danger">borrar</button>
										</form>
									@endif
								</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		@endforeach
	</div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="{{ url('admin/subcategories') }}" method="POST" class="form-horizontal" ccept-charset="UTF-8" enctype="multipart/form-data" style="display: block;">
				{{csrf_field()}}
				<input type="hidden" name="category_id" value="{{$category->id}}">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="gridSystemModalLabel">Nuevo Categoria</h4>
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
					<div class="form-group has-feedback {{ $errors->has('description')?'has-error ':''}}">
				    	<label class="col-sm-2 control-label" >Descripción:</label>
					    <div class="col-sm-10">
							<textarea name="description" id="textareaDescription" class="form-control" rows="3">{{old('description')}}</textarea>
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
