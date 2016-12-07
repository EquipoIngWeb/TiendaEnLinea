@extends('layouts.app')
@section('content')
<style>
	.header-title{
		@if (isset($category))
			background:url('{{$category->image}}');
		@else
			background:url('{{asset('storage/images/categories/default.jpg') }}');
		@endif
		background-size: cover;
		width: 100%;
		height: 300px;
	}
	.header-title .title{
		margin: 1px auto;
		font-size: 60px;
	    text-shadow: 5px 1px 10px rgba(0,0,0,0.6);
		font-weight: 400;
	}
</style>
<div class="header-title valign-wrapper ">
<div class="title white-text valign center-align center">
		{{$title or $category->name}}
</div>
</div>
	<div class="row">
		<div class="col s12 m9 l10">
			 @foreach($products as $product)
				@include('components.product',['product'=>$product,'format'=>'materialize'])
			@endforeach
		</div>
		<div class="col s12 m3 l2 center">
			<form action="{{ url($route) }}" method="GET">
				{{csrf_field()}}
				<div class="input-field col s12">
				    <select name="filter" onchange="this.form.submit();">
				      <option value="" disabled selected>Filtros</option>
				      <option value="down">Precio mas bajos</option>
				      <option value="up">Precio mas altos</option>
				    </select>
				    <label>Filtrar Por</label>
				  </div>
			</form>


			<h2>Categorias</h2>
			<ul>
				@foreach ($genders as $gender)
						<li><a href="{{ url('/gender/'.$gender->id) }}" class="btn black col s12">{{$gender->name}}</a></li>
					@foreach ($gender->categories as $category)
						<li><a href="{{ url('/category/'.$category->id) }}" class="btn  col s12">{{$category->name}}</a></li>
						@foreach ($category->subcategories as $subcategory )
							<li><a href="{{ url('/subcategory/'.$subcategory->id) }}" class="btn grey darken-1 col s12">{{$subcategory->name}}</a></li>
						@endforeach
					@endforeach
				@endforeach
			</ul>
		</div>
	</div>
@stop
