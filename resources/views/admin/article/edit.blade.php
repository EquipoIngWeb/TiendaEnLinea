@extends('admin.app')
@section('breadcrumb')
	@php
		$breadcrumb=[
			['url'=>url('admin'),'name'=>'Ménu Principal'],
			['url'=>url('admin/products/'),'name'=>'Articulos'],
			['name'=>'Edición '.$product->name]
		];
	@endphp
@stop
@section('header')
{{$product->name}} <small>Edición</small>
@stop
@section('content')
<div class="panel panel-default">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-4">
				<img src="{{$product->image}}" alt="" class="img-responsive">
			</div>
			<div class="col-md-8">
				<form action="{{ url('admin/products/'.$product->id) }}" method="POST" class="form-horizontal" ccept-charset="UTF-8" enctype="multipart/form-data" style="display: block;">
					{{csrf_field()}}
					{{method_field('PUT')}}
	 				<div class="modal-body">
						<div class="form-group has-feedback {{ $errors->has('name')?'has-error ':''}}">
					    	<label class="col-sm-2 control-label" >Nombre:</label>
						    <div class="col-sm-10">
								<input type="text" name="name" class="form-control" value="{{$product->name or old('name')}}" required="required">
							    @if ($errors->has('name'))
						    	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
			                        <span class="help-block">
			                            <strong>{{ $errors->first('name') }}</strong>
			                        </span>
			                    @endif
						    </div>
						</div>
						<div class="form-group has-feedback {{ $errors->has('brand_id')?'has-error ':''}}">
					    	<label class="col-sm-2 control-label" >Marca:</label>
						    <div class="col-sm-10">
								<select name="brand_id"  class="form-control">
										<option value=""  disabled selected> Seleccione una Marca </option>
									@foreach ($brands as $brand)
										<option value="{{$brand->id}}" {{(old('brand_id')== $brand->id||$product['brand_id'] == $brand->id) ? 'selected':''}}>{{$brand->name}}</option>
									@endforeach
								</select>
							    @if ($errors->has('brand_id'))
						    	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
			                        <span class="help-block">
			                            <strong>{{ $errors->first('brand_id') }}</strong>
			                        </span>
			                    @endif
						    </div>
						</div>

						<div class="form-group has-feedback {{ $errors->has('color_id')?'has-error ':''}}">
					    	<label class="col-sm-2 control-label" >Color:</label>
						    <div class="col-sm-10">
								<select name="color_id"  class="form-control">
										<option value=""  disabled selected> Seleccione un Color </option>
									@foreach ($colors as $color)
										<option value="{{$color->id}}" {{(old('color_id')== $color->id||$product['color_id'] == $color->id) ? 'selected':''}}>{{$color->name}}</option>
									@endforeach
								</select>
							    @if ($errors->has('color_id'))
						    	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
			                        <span class="help-block">
			                            <strong>{{ $errors->first('color_id') }}</strong>
			                        </span>
			                    @endif
						    </div>
						</div>
						<div class="form-group">
					    	<label class="col-sm-2 control-label" >Genero:</label>
						    <div class="col-sm-10">
								<select   class="form-control gender-select">
									<option value=""  disabled selected> Seleccione un Género </option>
									@foreach ($genders as $gender)
										<option data-index="1" value="{{$gender->id}}" {{(old('gender_id') == $gender->id || $product['gender_id'] == $gender->id) ? 'selected':''}}>{{$gender->name}}</option>
									@endforeach
								</select>
						    </div>
						</div>
						<div class="form-group">
					    	<label class="col-sm-2 control-label" >Categoria:</label>
						    <div class="col-sm-10">
								<select   class="form-control category-select">
									<option value=""  disabled selected> Seleccione una Categoria</option>
									@foreach ($genders as $gender)
										@foreach ($gender->categories as $category)
											<option class="category_id" data-index="1" data-id="{{$gender->id}}" value="{{$category->id}}" {{(old('category_id') == $category->id || $product['category_id'] == $category->id) ? 'selected':''}}>{{$category->name}}</option>
										@endforeach
									@endforeach
								</select>
						    </div>
						</div>
						<div class="form-group has-feedback {{ $errors->has('subcategory_id')?'has-error ':''}}">
					    	<label class="col-sm-2 control-label" >Subcategoria:</label>
						    <div class="col-sm-10">
								<select name="subcategory_id"  class="form-control">
									<option value="" disabled selected> Seleccione una Subcategoria </option>
									@foreach ($genders as $gender)
										@foreach ($gender->categories as $category)
											@foreach ($category->subcategories as $subcategory)
												<option class="subcategory_id" data-index="1" data-id="{{$category->id}}" value="{{$subcategory->id}}" {{(old('subcategory_id')== $subcategory->id||$product['subcategory_id'] == $subcategory->id) ? 'selected':''}}>{{$subcategory->name}}</option>
											@endforeach
										@endforeach
									@endforeach
								</select>

							    @if ($errors->has('subcategory_id'))
						    	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
			                        <span class="help-block">
			                            <strong>{{ $errors->first('subcategory_id') }}</strong>
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
						<a href="{{ url('admin/products/') }}" class="btn btn-default">Cancelar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
@stop
@section('script')
	<script>
		$(document).ready(function() {
			$(".gender-select").change(function(event){
	            var option = $(this).find(':selected');
	            	$( ".category_id").each(function( index ) {
						if($( this ).data('index') == option.data('index')){
							if (option.val() == $( this ).data('id') ){
								  $( this ).show();
							}else{
								  $( this ).hide();
							}
						}
					});
	        });
			 $(".category-select").change(function(event){
	            var option = $(this).find(':selected');
	           	$( ".subcategory_id").each(function( index ) {
	            		if($( this ).data('index') == option.data('index')){
							if (option.val() == $( this ).data('id') ){
								  $( this ).show();
							}else{
								  $( this ).hide();
							}
						}
					});
	        });
		});
	</script>
@stop
