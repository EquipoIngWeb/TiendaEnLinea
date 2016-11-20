
<div
	class="center 
		@if($format == 'owl-carousel')
			item
		@elseif($format == 'materialize')
			col s12 m6 l4
		@endif
	"
	style="position: relative;"
>

	<a href="{{ route('view_product',['product_id'=>$product->id]) }}" class="product-image">
		<img src="{{$product->image}}" alt=" " class="col s12" />
	</a>
	<a href="{{ route('view_product',['product_id'=>$product->id]) }}">{{$product->name}}</a>

	{{$product->description}} <br>
	<b>${{$product->price}}</b> <br>
	
	<a href="{{route('add_to_cart',['product_id'=>$product->id])}}" class="btn orange">Al carrito</a>
</div>
