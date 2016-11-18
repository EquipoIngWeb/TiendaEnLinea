<div class="item center">
		
	<a href="{{ route('view_product',['product_id'=>$product->id]) }}" class="product-image">
		<img src="{{$product->image}}" alt=" " class="col s12" />
	</a>
	<a href="{{ route('view_product',['product_id'=>$product->id]) }}">{{$product->name}}</a>
		
	{{$product->description}} <br>
	<b>${{$product->price}}</b> <br>
	<a href="" class="btn orange">Al carrito</a>

</div>
