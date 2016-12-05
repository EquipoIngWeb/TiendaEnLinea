@extends('admin.app')
@section('header')
	Articulos <small>Documento CSV</small>
@stop
@section('content')
<div class=" text-center">
<div class="panel panel-default">
	<div class="panel-body">
		@if ($products_corrects->isEmpty())
			<h4 style="text-align: center;">Sin Productos Correctos</h4>
		@endif
		<form action="{{ url('admin/filecsv/store') }}" method="POST" style="display: block;" accept-charset="UTF-8" enctype="multipart/form-data">
			{{csrf_field()}}
			<table class="table table-striped table-hover table-responsive">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Color</th>
						<th>Marca</th>
						<th>Genero</th>
						<th>Categoria</th>
						<th>Subcategoria</th>
						<th>Imagen</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($products_corrects as $product)
							<tr>
								<td>
									{{$product['name']}}
									<input type="hidden" name="product[{{$loop->index}}][name]" value="{{$product['name']}}">

								</td>
								<td>
									{{$product['description']}}
									<input type="hidden" name="product[{{$loop->index}}][description]" value="{{$product['description']}}">

								</td>
								<td>
									{{$product['color_name']}}
									<input type="hidden" name="product[{{$loop->index}}][color_id]" value="{{$product['color_id']}}">

								</td>
								<td>
									{{$product['brand_name']}}
									<input type="hidden" name="product[{{$loop->index}}][brand_id]" value="{{$product['brand_id']}}">
								</td>
								<td>
									{{$product['gender_name']}}
									<input type="hidden" name="product[{{$loop->index}}][gender_id]" value="{{$product['gender_id']}}">

								</td>
								<td>
									{{$product['category_name']}}
									<input type="hidden" name="product[{{$loop->index}}][category_id]" value="{{$product['category_id']}}">

								</td>
								<td>
									{{$product['subcategory_name']}}
									<input type="hidden" name="product[{{$loop->index}}][subcategory_id]" value="{{$product['subcategory_id']}}">
								</td>
								<td>
									<input type="file" name="product[{{$loop->index}}][image]" class="form-control" required="required" accept=" image/jpeg, image/png">
								</td>
							</tr>
					@endforeach
				</tbody>
			</table>
			@if ($products_incorrects->isEmpty())
				<h4 style="text-align: center;">Sin Productos Correctos</h4>
			@else
				<h4 style="text-align: center;">Productos que tienen errores</h4>
			@endif
			<table class="table table-striped table-hover table-responsive">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Color</th>
						<th>Marca</th>
						<th>Genero</th>
						<th>Categoria</th>
						<th>Subcategoria</th>
						<th>Imagen</th>
					</tr>
				</thead>
				<tbody>
				@php
					$index=-1;
				@endphp
					@foreach ($products_incorrects as $product)
						@php
							$index = $index+1;
						@endphp
							<tr>
								<td>
									{{$product['name']}}
									<input type="hidden" name="product_v[{{$loop->index}}][name]" value="{{$product['name']}}">
								</td>
								<td>
									{{$product['description']}}
									<input type="hidden" name="product_v[{{$loop->index}}][description]" value="{{$product['description']}}">
								</td>
								<td>
									@if (isset($product['color_name']))
										{{$product['color_name']}}
										<input type="hidden" name="product_v[{{$loop->index}}][color_id]" value="{{$product['color_id']}}">
									@else
										<select name="product_v[{{$loop->index}}][color_id]" class="form-control">
											<option value=""  disabled selected>Seleccione un Género</option>
											@foreach ($colors as $color)
												<option value="{{$color->
													id}}" {{Request::input('color_id') == $color->id ? 'selected':''}}>{{$color->name}}
												</option>
											@endforeach
										</select>
									@endif
								</td>
								<td>
									@if (isset($product['brand_name']))
										{{$product['brand_name']}}
										<input type="hidden" name="product_v[{{$loop->index}}][brand_id]" value="{{$product['brand_id']}}">
									@else
										<select name="product_v[{{$loop->index}}][brand_id]" class="form-control">
											<option value=""  disabled selected>Seleccione un Género</option>
											@foreach ($brands as $brand)
												<option value="{{$brand->
													id}}" {{Request::input('brand_id') == $brand->id ? 'selected':''}}>{{$brand->name}}
												</option>
											@endforeach
										</select>
									@endif
								</td>
								<td>
									@if (isset($product['gender_name']))
										{{$product['gender_name']}}
										<input type="hidden" name="product_v[{{$loop->index}}][gender_id]" value="{{$product['gender_id']}}">
									@else
										<select name="product_v[{{$loop->index}}][gender_id]" class="form-control gender-select">
											<option value=""  disabled selected>Seleccione un Género</option>
											@foreach ($genders as $gender)
												<option value="{{$gender->
													id}}" data-index="{{$loop->parent->index}}" {{Request::input('gender_id') == $gender->id ? 'selected':''}}>{{$gender->name}}
												</option>
											@endforeach
										</select>
									@endif
								</td>
								<td>
									@if (isset($product['category_name']))
										{{$product['category_name']}}
										<input type="hidden" name="product_v[{{$loop->index}}][category_id]" value="{{$product['category_id']}}">
									@else
										<select name="product_v[{{$loop->index}}][category_id]" class="form-control category-select">
											<option value=""  disabled selected>Seleccione una Categoria</option>
											@foreach ($genders as $gender)
												@if (isset($product['gender_name']))
													@if ($gender->id == $product['gender_id'])
														@foreach ($gender->categories as $category)
															<option class="category_id" data-id="{{$gender->
																id}}" data-index="{{$index}}" value="{{$category->id}}" {{Request::input('category_id') == $category->id ? 'selected':''}}>{{$category->name}}
															</option>
														@endforeach
													@endif
												@else
													@foreach ($gender->categories as $category)
														<option class="category_id" data-id="{{$gender->
															id}}" data-index="{{$index}}" value="{{$category->id}}" {{Request::input('category_id') == $category->id ? 'selected':''}}>{{$category->name}}
														</option>
													@endforeach
												@endif
											@endforeach
										</select>
									@endif
								</td>
								<td>
									@if (isset($product['subcategory_name']))
										{{$product['subcategory_name']}}
										<input type="hidden" name="product_v[{{$loop->index}}][subcategory_id]" value="{{$product['subcategory_id']}}">
									@else
										<select name="product_v[{{$loop->index}}][subcategory_id]" class="form-control">
											<option value="" disabled selected>Seleccione una Subcategoria</option>
											@foreach ($genders as $gender)
												@if (isset($product['gender_name']))
													@if ($gender->id == $product['gender_id'])
														@foreach ($gender->categories as $category)
															@if (isset($product['category_name']))
																@if ($category->id == $product['category_id'])
																	@foreach ($category->subcategories as $subcategory)
																		<option class="subcategory_id" data-id="{{$category->
																			id}}" data-id="{{$category->id}}" data-index="{{$index}}" value="{{$subcategory->id}}" {{Request::input('subcategory_id') == $subcategory->id ? 'selected':''}}>{{$subcategory->name}}
																		</option>
																	@endforeach
																@endif
															@else
																@foreach ($category->subcategories as $subcategory)
																	<option class="subcategory_id" data-id="{{$category->
																		id}}" data-index="{{$index}}" value="{{$subcategory->id}}" {{Request::input('subcategory_id') == $subcategory->id ? 'selected':''}}>{{$subcategory->name}}
																	</option>
																@endforeach
															@endif
														@endforeach
													@endif
												@else
													@foreach ($gender->categories as $category)
														@foreach ($category->subcategories as $subcategory)
															<option class="subcategory_id" data-id="{{$category->
																id}}" data-index="{{$index}}" value="{{$subcategory->id}}" {{Request::input('subcategory_id') == $subcategory->id ? 'selected':''}}>{{$subcategory->name}}
															</option>
														@endforeach
													@endforeach
												@endif
											@endforeach

										</select>
									@endif
									{{isset($product['subcategory_name'])?$product['subcategory_name']:''}}
								</td>
								<td>
									<input type="file" name="product_v[{{$loop->index}}][image]" class="form-control" required="required" accept=" image/jpeg, image/png">
								</td>
							</tr>
					@endforeach
				</tbody>
			</table>
			<button type="submit" class="btn btn-warning">Enviar Datos </button>
		</form>
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

