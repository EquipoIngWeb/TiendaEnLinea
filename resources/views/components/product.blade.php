
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
<<<<<<< HEAD:resources/views/components/product.blade.php
	<a href="" class="btn orange">Al carrito</a>
=======
	
	<a href="{{route('add_to_cart',['product_id'=>$product->id])}}" class="btn orange">Al carrito</a>
>>>>>>> 82474d1ca03c465aaad51dd34e6f7a546274f3a3:resources/views/components/product.blade.php
</div>
