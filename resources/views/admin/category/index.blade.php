@extends('admin.app')
@section('header')
 Categorias
@stop
@section('content')
	<ul>
	@foreach ($categories as $fc => $se)
	<li>
		{{ $fc }}
		@if (sizeof($se)>0)
			<ul>
				@foreach ($se as $sc => $th)
					<li>{{ $sc }}</li>
					@if (sizeof($th)>0)
						<ul>
							@foreach ($th as $tc => $fh)
								<li>{{ $tc }}</li>
							@endforeach
						</ul>
					@endif
				@endforeach
			</ul>
		@endif
		</ul>
	</li>	
	@endforeach
	</ul>
	<a href="{{ url('/admin/categories/create') }}" class="btn btn-default">Nueva Categoria</a>
@stop

