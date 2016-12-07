@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12 m8 offset-m2  l6 offset-l3">
				<h1>
					<i class="material-icons" style="font-size:50px; vertical-align: middle;">perm_identity</i>
					{{$user->full_name}} <b class="hide-on-med-and-down"> - {{$user->username}}</b>
				</h1>
				<h2>Ticket:</h2>
				<table>
					<thead class="centered">
						<tr>
							<th>Producto</th>
							<th>Talla</th>
							<th>Precio</th>
						</tr>
							
						@foreach($ticket as $product)
							<tr>
								<td>
									<a href="{{url('view/'.$product->specification->product->id)}}">
										{{$product->specification->product->name}}
									</a>
								</td>
								<td>
									Talla {{$product->specification->size->name}}
								</td>
								<td>
								{{$product->price}}
								</td>
							</tr>
						@endforeach

					</thead>
				</table>
			</div>
		</div>
	</div>
@endsection