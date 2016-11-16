<div class="col-md-3">
	<div class="content_box text-center">
		<a href="details.html">
			<img src="{{ asset('images/7.jpg') }}" class="img-responsive" width="100%" alt="">
		</a>
		<h4><a href="details.html"> {{$product->name}}</a></h4>
		<p><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> <a href="">{{$product->brand()->first()->name}}</a></p>
		<div class="grid_1 simpleCart_shelfItem">
			<div class="item_add"><span class="item_price"><h6>ONLY ${{$product->price}}</h6></span></div>
		</div>
	</div>
</div>
