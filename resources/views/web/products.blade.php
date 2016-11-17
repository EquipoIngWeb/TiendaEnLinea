@extends('layouts.app')
@section('content')

	@inject('categories', 'App\Repositories\Categories')
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories animated wow slideInUp" data-wow-delay=".5s">
					<h3>Categories</h3>
					<ul class="cate">
					@foreach ($categories->getMenu() as $category)
						<li class="dropdown">
							@foreach ($category->children as $category_second)
								<li><a href="{{ url('/category/'.$category_second->id) }}">{{$category_second->name}}</a></li>
								@foreach ($category_second->children as $category_third )
									<li><a href="{{ url('/category/'.$category_third->id) }}">{{$category_third->name}}</a></li>
								@endforeach
							@endforeach
						</li>
					@endforeach
						{{--
						@foreach ($categories->getMenu() as $category )
							<li><a href="{{ url('/category/'.$category['id']) }}">{{$category['name']}}</a> <span></span></li>
							@if (sizeof($category['children'])>0)
								<ul>
									@foreach ($category['children'] as $category_second)
										<li><a href="{{ url('/category/'.$category['id'].'/'.$category_second['id']) }}">{{$category_second['name']}}</a> <span></span></li>
										@if (sizeof($category_second['children'])>0)
											<ul>
												@foreach ($category_second['children'] as $category_third )
													<li><a href="{{ url('/category/'.$category['id'].'/'.$category_second['id'].'/'.$category_third['id']) }}">{{$category_third['name']}}</a> <span></span></li>
												@endforeach
											</ul>
										@endif
									@endforeach
								</ul>
							@endif
						@endforeach
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
					<div class="row">
						@each('article.item', $products, 'product')
					</div>

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
		</div>
	</div>
@stop
