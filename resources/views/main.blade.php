@extends('layouts.app')
@section('content')

<div id="main-carousel" class="owl-carousel owl-theme">

	<div class="item">
		<img src="{{asset('images/carrusel/banner_1.jpg')}}" alt="Damas, Caballeros y Niños">
		<p class="center">Damas, Caballeros y Niños</p>
	</div>
	<div class="item">
		<img src="{{asset('images/carrusel/banner_2.jpg')}}" alt="Todo lo que necesites a tu alcance">
		<p class="center">Todo lo que necesites a tu alcance</p>
	</div>
	<div class="item">
		<img src="{{asset('images/carrusel/banner_3.jpg')}}" alt="Descubre más con un clic">
		<p class="center">Descubre más con un clic</p>
	</div>

</div>

<div class="container">
	<div class="row">
		<h1 class="center col s12">No pierdas mas tiempo,<br>encuentra con nosotros lo que necesitas</h1>
		
		<div class="col s12 m6 l4">
			<div class="card">
				<div class="card-image">
					<img src="{{asset('images/img4.jpg')}}">
					<span class="card-title">Descuentos de hasta el 50%</span>
				</div>
				<div class="card-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat.</p>
				</div>
			</div>
		</div>
		<div class="col s12 m6 l4">
			<div class="card">
				<div class="card-image">
					<img src="{{asset('images/15.jpg')}}">
					<span class="card-title">Encuentra lo más nuevo</span>
				</div>
				<div class="card-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat.</p>
				</div>
			</div>
		</div>
		<div class="col s12 m6 l4">
			<div class="card">
				<div class="card-image">
					<img src="{{asset('images/16.jpg')}}">
					<span class="card-title">Los mejores diseños de temporada</span>
				</div>
				<div class="card-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<h2 class="center col s12">Articulos populares</h2>
		<div id="popular-carousel" class="owl-carousel owl-theme">
			@each('components.article', $products, 'product')
		</div>
	</div>



</div>

{{--

		<div class="new-collections">
			<div class="container">
				<h3 class="animated wow zoomIn" data-wow-delay=".5s">Nuevos productos</h3>
				<p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
					deserunt mollit anim id est laborum.</p>
					<div class="new-collections-grids">

						<div id="owl-demo" class="owl-carousel owl-theme">
							@each('components.article', $products, 'product')
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>

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
				</div>
--}}
@stop