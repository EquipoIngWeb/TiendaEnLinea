
<div class="col-md-12 new-collections-grid">
	<div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
		
		<div class="new-collections-grid1-image">
			<a href="{{ url('/see/'.$product->id) }}" class="product-image">
				<img src="{{$product->image}}" alt=" " class="img-responsive" />
			</a>
			<div class="new-collections-grid1-image-pos">
				<a href="{{ url('/see/'.$product->id) }}">Ver más</a>
			</div>
		</div>

		<h4><a href="{{ url('/see/'.$product->id) }}">{{$product->name}}</a></h4>
		<p>{{$product->description}}</p>
		<div class="new-collections-grid1-left simpleCart_shelfItem">
			<p><span class="item_price">${{$product->price}}</span><a class="item_add" href="#">al carrito </a></p>
		</div>
	</div>
	
</div>