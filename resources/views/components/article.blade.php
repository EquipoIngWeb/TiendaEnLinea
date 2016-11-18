<div class="item center">
		
	<a href="{{ url('/see/'.$product->id) }}" class="product-image">
		<img src="{{$product->image}}" alt=" " class="col s12" />
	</a>
	<a href="{{ url('/see/'.$product->id) }}">{{$product->name}}</a>
		
	{{$product->description}} <br>
	<b>${{$product->price}}</b> <br>
	<a href="" class="btn orange">Agregar al carrito</a>

</div>
