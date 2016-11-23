@extends('layouts.app')
@section('content')

	@inject('categories', 'App\Repositories\Categories')

	<div class="row">
		<h1 class="center">{{$category->parent()->name or ''}} {{$category->name}}</h1>
		<div class="col s12 m9 l10">
			<form action="{{ url('/category/'.$category->id) }}" method="GET">
				{{csrf_field()}}
				<div class="input-field col s12">
				    <select name="filter" onchange="this.form.submit();">
				      <option value="" disabled selected>Filtros</option>
				      <option value="down">Precios más bajos</option>
				      <option value="up">Precios más altos</option>
				      {{-- <option value="alfa">Alfabético</option> --}}
				    </select>
				    <label>Materialize Select</label>
				  </div>
			</form>
			<img src="{{$category->imge}}" alt=" " class="col s12" />
			@foreach($category->products as $product)
				@include('components.product',['product'=>$product,'format'=>'materialize'])
			@endforeach
			@foreach($category->children as $child)
				@foreach ($child->products as $product)
					@include('components.product',['product'=>$product,'format'=>'materialize'])
				@endforeach
				@foreach($child->children as $child1)
					@foreach ($child1->products as $product)
						@include('components.product',['product'=>$product,'format'=>'materialize'])
					@endforeach
				@endforeach
			@endforeach
		</div>
		<div class="col s12 m3 l2 center">
			<h2>Categorias</h2>
			<ul>
				@foreach ($categories->getMenu() as $category)
					@foreach ($category->children as $category_second)
						<li><a href="{{ url('/category/'.$category_second->id) }}" class="btn col s12">{{$category_second->name}}</a></li>
						@foreach ($category_second->children as $category_third )
							<li><a href="{{ url('/category/'.$category_third->id) }}" class="btn col s12">{{$category_third->name}}</a></li>
						@endforeach
<<<<<<< HEAD
					@endforeach
				@endforeach
			</ul>
=======
						--}}
					</ul>
				</div>
				<div class="new-products animated wow slideInUp" data-wow-delay=".5s">
					<h3>New Products</h3>
					<div class="new-products-grids">
						<div class="new-products-grid">
							<div class="new-products-grid-left">
								<a href="single.html"><img src="images/6.jpg" alt=" " class="img-responsive" /></a>
							</div>
							<div class="new-products-grid-right">
								<h4><a href="single.html">occaecat cupidatat</a></h4>
								<div class="rating">
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="simpleCart_shelfItem new-products-grid-right-add-cart">
									<p> <span class="item_price">$180</span><a class="item_add" href="#">add to cart </a></p>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="new-products-grid">
							<div class="new-products-grid-left">
								<a href="single.html"><img src="images/26.jpg" alt=" " class="img-responsive" /></a>
							</div>
							<div class="new-products-grid-right">
								<h4><a href="single.html">eum fugiat quo</a></h4>
								<div class="rating">
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="simpleCart_shelfItem new-products-grid-right-add-cart">
									<p> <span class="item_price">$250</span><a class="item_add" href="#">add to cart </a></p>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="new-products-grid">
							<div class="new-products-grid-left">
								<a href="single.html"><img src="images/11.jpg" alt=" " class="img-responsive" /></a>
							</div>
							<div class="new-products-grid-right">
								<h4><a href="single.html">officia deserunt</a></h4>
								<div class="rating">
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="simpleCart_shelfItem new-products-grid-right-add-cart">
									<p> <span class="item_price">$259</span><a class="item_add" href="#">add to cart </a></p>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-8 products-right">
				<div class="products-right-grid">
					{{--
					<div class="products-right-grids animated wow slideInRight" data-wow-delay=".5s">
						<div class="sorting">
							<select id="country" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="null">Default sorting</option>
								<option value="null">Sort by popularity</option>
								<option value="null">Sort by average rating</option>
								<option value="null">Sort by price</option>
							</select>
						</div>
						<div class="sorting-left">
							<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="null">Item on page 9</option>
								<option value="null">Item on page 18</option>
								<option value="null">Item on page 32</option>
								<option value="null">All</option>
							</select>
						</div>
						<div class="clearfix"> </div>
					</div>
					--}}
					<div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s">
						<img src="{{asset('images/18.jpg')}}" alt=" " class="img-responsive" />
						<div class="products-right-grids-position1">
							<h4>2016 New Collection</h4>
							<p>Temporibus autem quibusdam et aut officiis debitis aut rerum
								necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae
								non recusandae.</p>
						</div>
					</div>
				</div>

				<div class="products-right-grids-bottom">
						@foreach ($products->chunk(3) as $prds)
							<div class="row">
								@each('article.item', $prds, 'product')
							</div>
						@endforeach

				</div>
				{{--
				<nav class="numbering animated wow slideInRight" data-wow-delay=".5s">
				  <ul class="pagination paging">
					<li>
					  <a href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					  </a>
					</li>
					<li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li>
					  <a href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					  </a>
					</li>
				  </ul>
				</nav>
				--}}
			</div>
			<div class="clearfix"> </div>
>>>>>>> 1ad0629066d60ac6fd8cf6dc072cb2e18b61e69d
		</div>

	</div>
@stop
