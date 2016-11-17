@extends('layouts.app')
@section('content')
		<!-- banner -->
		<div class="banner">
			<div class="container">
				<div class="banner-info animated wow zoomIn" data-wow-delay=".5s">
					<div class="wmuSlider example1">
						<div class="wmuSliderWrapper">
							<article style="position: absolute; opacity: 0;">
								<img src="{{asset('images/carrusel/ba1.jpg')}}" width="100%" height="100%">
								<!-- <h4>Up to <span>50% <i>Off/-</i></span></h4> -->
								<div class="banner-wrap">
									<div class="banner-info1">
										<p>Damas + Caballeros + Niños</p>
									</div>
								</div>
							</article>
							<article style="position: absolute; opacity: 0;">
								<img src="{{asset('images/carrusel/ba2.jpg')}}" alt="..." width="100%" height="100%">
								<div class="banner-wrap">
									<div class="banner-info1">
										<p>Todo lo que necesites a tu alcance</p>
									</div>
								</div>
							</article>
							<article style="position: absolute; opacity: 0;">
								<img src="{{asset('images/carrusel/ba3.jpg')}}" alt="..." width="100%" height="100%">
								<div class="banner-wrap">
									<div class="banner-info1">
										<p>Descubre más con un clic</p>
									</div>
								</div>
							</article>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- //banner -->
		<!-- banner-bottom -->
		<div class="banner-bottom">
			<div class="container">
				<div class="banner-bottom-grids">
					<div class="banner-bottom-grid-left animated wow slideInLeft" data-wow-delay=".5s">
						<div class="grid">
							<figure class="effect-julia">
								<img src="{{asset('administrador/images/47.jpg')}}" alt=" " class="img-responsive" />
								<figcaption>
									<h3>La mejor <span> manera</span><i> de comprar</i></h3>
									<div>
										<p>No pierdas mas tiempo</p>
										<p>Conocenos y encuentra</p>
										<p>todo lo que necesitas</p>
									</div>
								</figcaption>
							</figure>
						</div>
					</div>
					<div class="banner-bottom-grid-left1 animated wow slideInUp" data-wow-delay=".5s">
						<div class="banner-bottom-grid-left-grid left1-grid grid-left-grid1">
							<div class="banner-bottom-grid-left-grid1">
								<img src="{{asset('administrador/images/img4.jpg')}}" alt=" " class="img-responsive" />
							</div>
							<div class="banner-bottom-grid-left1-pos">
								<p>Descuentos desde</p>
							</div>
						</div>
						<div class="banner-bottom-grid-left-grid left1-grid grid-left-grid1">
							<div class="banner-bottom-grid-left-grid1">
								<img src="images/2.jpg" alt=" " class="img-responsive" />
							</div>
							<div class="banner-bottom-grid-left1-position">
								<div class="banner-bottom-grid-left1-pos1">
									<p>Encuentra lo más nuevo</p>
								</div>
							</div>
						</div>
					</div>
					<div class="banner-bottom-grid-right animated wow slideInRight" data-wow-delay=".5s">
						<div class="banner-bottom-grid-left-grid grid-left-grid1">
							<div class="banner-bottom-grid-left-grid1">
								<img src="{{asset('administrador/images/62.jpg')}}" alt=" " class="img-responsive" />
							</div>
							<div class="grid-left-grid1-pos">
								<p>Los mejores diseños <span>de temporada</span></p>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- //banner-bottom -->
		<!-- collections -->
		<div class="new-collections">
			<div class="container">
				<h3 class="animated wow zoomIn" data-wow-delay=".5s">Nuevos productos</h3>
				<p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
					deserunt mollit anim id est laborum.</p>
					<div class="new-collections-grids">
						<div class="col-md-3 new-collections-grid">
							<div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
								<div class="new-collections-grid1-image">
									<a href="single.html" class="product-image"><img src="{{asset('administrador/images/si.jpg')}}" alt=" " class="img-responsive" /></a>
									<div class="new-collections-grid1-image-pos">
										<a href="single.html">Ver más</a>
									</div>
									<div class="new-collections-grid1-right">
										<div class="rating">
											<div class="rating-left">
												<img src="images/2.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/2.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/2.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/1.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/1.png" alt=" " class="img-responsive" />
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
								</div>
								<h4><a href="single.html">Blusa rayada</a></h4>
								<p>Bonita y comoda.</p>
								<div class="new-collections-grid1-left simpleCart_shelfItem">
									<p><i>$325</i> <span class="item_price">$250</span><a class="item_add" href="#">al carrito </a></p>
								</div>
							</div>
							<div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
								<div class="new-collections-grid1-image">
									<a href="single.html" class="product-image"><img src="{{asset('administrador/images/tenis.jpg')}}" alt=" " class="img-responsive" /></a>
									<div class="new-collections-grid1-image-pos">
										<a href="single.html">Ver más</a>
									</div>
									<div class="new-collections-grid1-right">
										<div class="rating">
										<!-- estrellas -->
											<div class="rating-left">
												<img src="images/2.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/2.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/1.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/1.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/1.png" alt=" " class="img-responsive" />
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
								</div>
								<h4><a href="single.html">Tennis</a></h4>
								<p>Para ir a toda prisa.</p>
								<div class="new-collections-grid1-left simpleCart_shelfItem">
									<p><i>$280</i> <span class="item_price">$150</span><a class="item_add" href="#">al carrito </a></p>
								</div>
							</div>
						</div>
						<div class="col-md-6 new-collections-grid">
							<div class="new-collections-grid1 new-collections-grid1-image-width animated wow slideInUp" data-wow-delay=".5s">
								<div class="new-collections-grid1-image">
									<a href="single.html" class="product-image"><img src="{{asset('administrador/images/img2.jpg')}}" alt=" " class="img-responsive" /></a>
									<div class="new-collections-grid1-image-pos new-collections-grid1-image-pos1">
										<a href="single.html">Ver más</a>
									</div>
									<div class="new-collections-grid1-right new-collections-grid1-right-rate">
										<div class="rating">
											<div class="rating-left">
												<img src="images/2.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/2.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/2.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/2.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/1.png" alt=" " class="img-responsive" />
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
									<div class="new-one">
										<p>Nuevo</p>
									</div>
								</div>
								<h4><a href="single.html">Zapatillas</a></h4>
								<p>Para ocaciones especiales.</p>
								<div class="new-collections-grid1-left simpleCart_shelfItem">
									<p><i>$580</i> <span class="item_price">$550</span><a class="item_add" href="#">al carrito </a></p>
								</div>
							</div>
							<div class="new-collections-grid-sub-grids">
								<div class="new-collections-grid1-sub">
									<div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
										<div class="new-collections-grid1-image">
											<a href="single.html" class="product-image"><img src="{{asset('administrador/images/pc2.jpg')}}" alt=" " class="img-responsive" /></a>
											<div class="new-collections-grid1-image-pos">
												<a href="single.html">Ver más</a>
											</div>
											<div class="new-collections-grid1-right">
												<div class="rating">
													<div class="rating-left">
														<img src="images/2.png" alt=" " class="img-responsive" />
													</div>
													<div class="rating-left">
														<img src="images/2.png" alt=" " class="img-responsive" />
													</div>
													<div class="rating-left">
														<img src="images/2.png" alt=" " class="img-responsive" />
													</div>
													<div class="rating-left">
														<img src="images/2.png" alt=" " class="img-responsive" />
													</div>
													<div class="rating-left">
														<img src="images/1.png" alt=" " class="img-responsive" />
													</div>
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
										<h4><a href="single.html">Camisa a cuadros</a></h4>
										<p>Comoda y fresca para el.</p>
										<div class="new-collections-grid1-left simpleCart_shelfItem">
											<p><i>$295</i> <span class="item_price">$200</span><a class="item_add" href="#">al carrito </a></p>
										</div>
									</div>
								</div>
								<div class="new-collections-grid1-sub">
									<div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
										<div class="new-collections-grid1-image">
											<a href="single.html" class="product-image"><img src="{{asset('administrador/images/pc4.jpg')}}" alt=" " class="img-responsive" /></a>
											<div class="new-collections-grid1-image-pos">
												<a href="single.html">Ver más</a>
											</div>
											<div class="new-collections-grid1-right">
												<div class="rating">
													<div class="rating-left">
														<img src="images/2.png" alt=" " class="img-responsive" />
													</div>
													<div class="rating-left">
														<img src="images/1.png" alt=" " class="img-responsive" />
													</div>
													<div class="rating-left">
														<img src="images/1.png" alt=" " class="img-responsive" />
													</div>
													<div class="rating-left">
														<img src="images/1.png" alt=" " class="img-responsive" />
													</div>
													<div class="rating-left">
														<img src="images/1.png" alt=" " class="img-responsive" />
													</div>
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
										<h4><a href="single.html">Playera</a></h4>
										<p>Playera con dibujo.</p>
										<div class="new-collections-grid1-left simpleCart_shelfItem">
											<p><i>$200</i> <span class="item_price">$90</span><a class="item_add" href="#">al carrito </a></p>
										</div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="col-md-3 new-collections-grid">
							<div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
								<div class="new-collections-grid1-image">
									<a href="single.html" class="product-image"><img src="{{asset('administrador/images/woo2.jpg')}}" alt=" " class="img-responsive" /></a>
									<div class="new-collections-grid1-image-pos">
										<a href="single.html">Ver más</a>
									</div>
									<div class="new-collections-grid1-right">
										<div class="rating">
											<div class="rating-left">
												<img src="images/2.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/2.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/2.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/1.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/1.png" alt=" " class="img-responsive" />
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
								</div>
								<h4><a href="single.html">Vestido</a></h4>
								<p>Luce radiante con este vestido.</p>
								<div class="new-collections-grid1-left simpleCart_shelfItem">
									<p><i>$440</i> <span class="item_price">$220</span><a class="item_add" href="#">al carrito </a></p>
								</div>
							</div>
							<div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
								<div class="new-collections-grid1-image">
									<a href="single.html" class="product-image"><img src="{{asset('administrador/images/sh3.jpg')}}" alt=" " class="img-responsive" /></a>
									<div class="new-collections-grid1-image-pos">
										<a href="single.html">Ver más</a>
									</div>
									<div class="new-collections-grid1-right">
										<div class="rating">
											<div class="rating-left">
												<img src="images/2.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/2.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/2.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/2.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/1.png" alt=" " class="img-responsive" />
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
								</div>
								<h4><a href="single.html">Botas</a></h4>
								<p>Para cualquier emergencia.</p>
								<div class="new-collections-grid1-left simpleCart_shelfItem">
									<p><i>$340</i> <span class="item_price">$257</span><a class="item_add" href="#">al carrito </a></p>
								</div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!-- //collections -->
			<!-- new-timer -->
			<div class="timer">
				<div class="container">
					<div class="timer-grids">
						<div class="col-md-8 timer-grid-left animated wow slideInLeft" data-wow-delay=".5s">
							<h3><a href="products.html">Aprovecha nuestros grandes decuentos</a></h3>
							<div class="rating">
								<div class="rating-left">
									<img src="images/2.png" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="images/2.png" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="images/2.png" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="images/2.png" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="images/1.png" alt=" " class="img-responsive" />
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="new-collections-grid1-left simpleCart_shelfItem timer-grid-left-price">
								<p><i>$980</i> <span class="item_price">$550</span></p>
								<h4>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
									nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit
									qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui
									dolorem eum fugiat quo voluptas nulla pariatur.</h4>
									<p><a class="item_add timer_add" href="#">al carrito </a></p>
								</div>
								<!-- <div id="counter"> </div> -->

							</div>
							<div class="col-md-4 timer-grid-right animated wow slideInRight" data-wow-delay=".5s">
								<div class="timer-grid-right1">
									<img src="{{asset('images/3.jpg')}}" alt=" " class="img-responsive" />
									<div class="timer-grid-right-pos">
										<h4>Oferta especial</h4>
									</div>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<!-- //new-timer -->
				<!-- collections-bottom -->
				<!-- <div class="collections-bottom">
					<div class="container">
						<div class="collections-bottom-grids">
							<div class="collections-bottom-grid animated wow slideInLeft" data-wow-delay=".5s">
								<h3>45% Offer For <span>Women & Children's</span></h3>
							</div>
						</div>
						<div class="newsletter animated wow slideInUp" data-wow-delay=".5s">
							<h3>Newsletter</h3>
							<p>Join us now to get all news and special offers.</p>
							<form>
								<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
								<input type="email" value="Enter your email address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your email address';}" required="">
								<input type="submit" value="Join Us" >
							</form>
						</div>
					</div>
				</div> -->
				<!-- //collections-bottom -->
@stop
