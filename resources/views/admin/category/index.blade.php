@extends('admin.app')
@section('header')
 Categorias
@stop
@section('content')
<style>
	ul.categories{
		list-style: none;
	}
	ul.categories li {
		margin: 11px!important;
	}
	.btn-options{
		padding: 2px 4px!important;
	}
</style>
	<ul class="categories">
		@foreach ($categories as $category_first)
			<li>
				<a class="btn btn-primary btn-options" data-toggle="collapse" data-target="#fc{{$category_first['id']}}">
					{{ $category_first['name'] }}
					@if (sizeof($category_first['children'])>0)
						<b class="caret"></b>
					@endif
				</a>
				<a href="{{ url('admin/categories/add/'.$category_first['id']) }}" class="btn btn-success btn-options"><span class="glyphicon glyphicon-plus" ></span></a>
				@if (sizeof($category_first['children'])>0)
					<ul id="fc{{$category_first['id']}}" class="collapse categories">
						@foreach ($category_first['children'] as $category_second)
							<li>
								<a class="btn btn-primary btn-options" data-toggle="collapse" data-target="#sc{{$category_first['id']}}-{{$category_second['id']}}">{{ $category_second['name'] }}
									@if (sizeof($category_second['children'])>0)
										<b class="caret"></b>
									@endif
								</a>
								<a href="{{ url('admin/categories/add/'.$category_first['id'].'/'.$category_second['id']) }}" class="btn btn-success btn-options"><span class="glyphicon glyphicon-plus" ></span></a>
							</li>
							@if (sizeof($category_second['children'])>0)
								<ul id="sc{{$category_first['id']}}-{{$category_second['id']}}" class="collapse categories">
									@foreach ($category_second['children'] as $category_third)
										<li><a href="" class="btn btn-primary btn-options">{{ $category_third['name'] }}</a></li>
									@endforeach
								</ul>
							@endif
						@endforeach
					</ul>
				@endif
			</li>
		@endforeach
	</ul>
	<a href="{{ url('/admin/categories/create') }}" class="btn btn-default">Nueva Categoria</a>
@stop

