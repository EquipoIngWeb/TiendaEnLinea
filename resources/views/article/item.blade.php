<div class="col-md-4 products-right-grids-bottom-grid">
	<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
		<div class="new-collections-grid1-image">
			<a href="{{ url('/see/'.$product->id) }}" class="product-image"><img src="{{$product->image}}" alt=" " class="img-responsive"></a>
			<div class="new-collections-grid1-image-pos products-right-grids-pos">
				<a href=" {{ url('/see/'.$product->id) }}">Ver más</a>
			</div>
			<div class="new-collections-grid1-right products-right-grids-pos-right"></div>
		</div>
		<h4><a href="{{ url('/see/'.$product->id) }}">{{$product->name}}</a></h4>
		<p></p>
		<div class="simpleCart_shelfItem products-right-grid1-add-cart">
			<p><span class="item_price">${{$product->price}}</span><a class="item_add" href="#">add to cart </a></p>
		</div>
	</div>
</div>
