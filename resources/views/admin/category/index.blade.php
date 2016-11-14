@extends('admin.app')
@section('header')
 Categorias
@stop
@section('content')
<style>
	ul.categories{
		list-style: none;
	}
</style>
	<ul>
		@foreach ($categories as $fc => $se)
			<li>
				<a data-toggle="collapse" data-target="#fc{{$fc}}">
					{{ $fc }}
				</a>
				@if (sizeof($se)>0)
					<ul id="fc{{$fc}}" class="collapse">
						@foreach ($se as $sc => $th)
							<li>
								<a data-toggle="collapse" data-target="#sc{{$fc}}{{$sc}}">{{ $sc }}</a>
							</li>
							@if (sizeof($th)>0)
								<ul id="sc{{$fc}}{{$sc}}" class="collapse">
									@foreach ($th as $tc => $fh)
										<li>{{ $tc }}</li>
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

