@extends('admin.app')
@section('header')
	Articulos
	<a href="{{ url('admin/filecsv/format') }}" class="btn btn-primary"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Formato CSV</a>
	<form action="{{ url('admin/filecsv') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="fileUpload btn btn-warning">
		    <span><span class="glyphicon glyphicon-file" aria-hidden="true"></span>SUBIR Archivo CSV</span>
		    <input type="file" name="csv" class="upload" onchange="this.form.submit()"   accept=".csv" />
		</div>
	</form>
	<a href="" data-toggle="modal" data-target=".bs-example-modal-lg"  class="btn btn-warning"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo articulo</a>
@stop
@section('content')
<div class=" text-center">
<div class="panel panel-default">
	<div class="panel-body">
		<form action="{{ url('admin/products') }}" method="GET" class="form-inline" role="form">
			{{csrf_field()}}
			<div class="form-group">
				<label class="sr-only" for="">Género</label>
				<select name="gender_id" id="gender" class="form-control">
						<option value=""  disabled selected> Seleccione un Género </option>
					@foreach ($genders as $gender)
						<option value="{{$gender->id}}" {{Request::input('gender_id') == $gender->id ? 'selected':''}}>{{$gender->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label class="sr-only" for="">Categoria</label>
				<select name="category_id" id="category" class="form-control">
					<option value=""  disabled selected> Seleccione una Categoria</option>
					@foreach ($genders as $gender)
						@foreach ($gender->categories as $category)
							<option class="category_id" data-id="{{$gender->id}}" value="{{$category->id}}" {{Request::input('category_id') == $category->id ? 'selected':''}}>{{$category->name}}</option>
						@endforeach
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label class="sr-only" for="">Subcategoria</label>
				<select name="subcategory_id" id="subcategory" class="form-control">
					<option value="" disabled selected> Seleccione una Subcategoria </option>
					@foreach ($genders as $gender)
						@foreach ($gender->categories as $category)
							@foreach ($category->subcategories as $subcategory)
								<option class="subcategory_id" data-id="{{$category->id}}" value="{{$subcategory->id}}" {{Request::input('subcategory_id') == $subcategory->id ? 'selected':''}}>{{$subcategory->name}}</option>
							@endforeach
						@endforeach
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label >  - ó - </label>
			</div>
			<div class="form-group">
				<label class="sr-only" for="">Marca</label>
				<select name="brand_id"  class="form-control">
						<option value=""  disabled selected> Seleccione una Marca </option>
					@foreach ($brands as $brand)
						<option value="{{$brand->id}}" {{Request::input('brand_id') == $brand->id ? 'selected':''}}>{{$brand->name}}</option>
					@endforeach
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Filtrar</button>
		</form>
	</div>
		@if ($products->isEmpty())
			<h4 style="text-align: center;">Sin Productos</h4>
		@endif
		@foreach ($products->chunk(6) as $prods)
			<div class="row">
				@foreach ($prods as $product)
					<div class="col-md-2">
						<div class="thumbnail image product">
							<a href="{{ url("admin/categories/".$product->subcategory->id."/products/$product->id") }}">
								<img src="{{ $product->image }}" class="img-responsive" width="100%" alt="">
							</a>
							<div class="caption">
								<h4><a href="details.html"> {{$product->name}}</a></h4>
								<p><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> <a href="">{{$product->brand()->first()->name}}</a></p>
								<div class="options">
										@if ($product->specifications->isEmpty())
											<form action="{{ url('admin/products/'.$product->id) }}" method="post">
												{{csrf_field()}}
												{{method_field('DELETE')}}
												<button type="submit" class="btn btn-primary btn-delete">
													ELIMINAR
												</button>
											</form>
										@endif
										<a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-warning">editar</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		@endforeach
		<div class="row">
			{{ $products->appends(Request::all())->links() }}
		</div>
	</div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="{{ url('admin/products') }}" method="POST" class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data" style="display: block;">
				{{csrf_field()}}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="gridSystemModalLabel">Nuevo Articulo</h4>
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
					<div class="form-group has-feedback {{ $errors->has('brand_id')?'has-error ':''}}">
				    	<label class="col-sm-2 control-label" >Marca:</label>
					    <div class="col-sm-10">
							<select name="brand_id"  class="form-control">
									<option value=""  disabled selected> Seleccione una Marca </option>
								@foreach ($brands as $brand)
									<option value="{{$brand->id}}" {{(old('brand_id')== $brand->id||Request::input('brand_id') == $brand->id) ? 'selected':''}}>{{$brand->name}}</option>
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
									<option value="{{$color->id}}" {{(old('color_id')== $color->id||Request::input('color_id') == $color->id) ? 'selected':''}}>{{$color->name}}</option>
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
									<option data-index="1" value="{{$gender->id}}" {{(old('gender_id') == $gender->id || Request::input('gender_id') == $gender->id) ? 'selected':''}}>{{$gender->name}}</option>
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
										<option class="category_id" data-index="1" data-id="{{$gender->id}}" value="{{$category->id}}" {{(old('category_id') == $category->id || Request::input('category_id') == $category->id) ? 'selected':''}}>{{$category->name}}</option>
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
											<option class="subcategory_id" data-index="1" data-id="{{$category->id}}" value="{{$subcategory->id}}" {{(old('subcategory_id')== $subcategory->id||Request::input('subcategory_id') == $subcategory->id) ? 'selected':''}}>{{$subcategory->name}}</option>
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
		</div>
	</div>
</div>
@stop
@section('script')
	<script>
		$(document).ready(function() {
			@if (count($errors) > 0)
			    $('.modal').modal('show');
			@endif
			$('#gender').change(function(event) {
				var op= null;
				$( "#gender option:selected" ).each(function() {
	      			op = $( this );
	    		});
				$( ".category_id" ).each(function( index ) {
					if (op.val() == $( this ).data('id')){
						  $( this ).show();
					}else{
						  $( this ).hide();
					}
				});
			});
			$('#category').change(function(event) {
				var op= null;
				$( "#category option:selected" ).each(function() {
	      			op = $( this );
	    		});
				$( ".subcategory_id" ).each(function( index ) {
					if (op.val() == $( this ).data('id')){
						  $( this ).show();
					}else{
						  $( this ).hide();
					}
				});
			});
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

