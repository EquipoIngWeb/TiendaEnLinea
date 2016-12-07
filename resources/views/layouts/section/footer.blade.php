<footer class="page-footer">
	<div class="container">
		<div class="row">
			<div class="col s12 m4">
				<b class="big-font">Acerca de nosotros</b>
				<hr>
				Somos una empresa confiable en donde tu podras encontras todo lo que estés bucando sin perder tu tiempo, rápido y seguro.

			</div>
			<div class="col s12 m4">
				<b class="big-font">Contáctanos</b>
				<hr>

				<div>
					<i class="material-icons">location_on</i>
					Tec de Culiacan, Culiacan Sinaloa.
				</div>

				<div>
					<i class="material-icons">email</i>
					lara.shop9@gmail.com
				</div>

				<div>
					<i class="material-icons">phone</i>
					+52 (6673) 15-1726
				</div>
			</div>
			<div class="col s12 m4">
				<b class="big-font">Enlaces</b>
				<hr>
				<div>
					<a style="color: white;" href="{{ url('/') }}">
					<i class="material-icons">location_on</i>
						Pagina Principal
					</a>
				</div>
				<div>
					<a style="color: white;" href="{{ url('login') }}">
						<i class="material-icons">input</i>
						Inicio de sesión
					</a>
				</div>
				<div>
					<a style="color: white;" href="{{ url('register') }}">
					<i class="material-icons">person_pin</i>
						Registro
					</a>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="row center">
		<hr class="inline">
		<div class="inline">
			<b class="big-font">Lara - Shop</b>
			<br>
			Todo lo que necesitas a tu alcance
		</div>
		<hr class="inline">
	</div>
</footer>
{{--
<div class="footer">
	<div class="container">
		<div class="footer-grids">
			<div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".5s">
				<h3>Acerca de Nosotros</h3>
				<p>Somos una empresa confiable en donde tu podras encontras todo lo que estés bucando
				sin perder tu tiempo, rápido y seguro.</span>
				</p>
			</div>
			<div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".6s">
				<h3>Contáctanos</h3>
				<ul>
					<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Tec de Culiacan, <span>Culiacan Sinaloa.</span></li>
					<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">lara.shop9@gmail.com</a></li>
					<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
				</ul>
			</div>
			<div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".7s">
				<h3>Galeria</h3>
				<div class="footer-grid-left">
					<a href="single.html"><img src="{{ asset('images/13.jpg')}}" alt=" " class="img-responsive" /></a>
				</div>
				<div class="footer-grid-left">
					<a href="single.html"><img src="{{ asset('images/14.jpg')}}" alt=" " class="img-responsive" /></a>
				</div>
				<div class="footer-grid-left">
					<a href="single.html"><img src="{{ asset('images/15.jpg')}}" alt=" " class="img-responsive" /></a>
				</div>
				<div class="footer-grid-left">
					<a href="single.html"><img src="{{ asset('images/16.jpg')}}" alt=" " class="img-responsive" /></a>
				</div>
				<div class="footer-grid-left">
					<a href="single.html"><img src="{{ asset('images/13.jpg')}}" alt=" " class="img-responsive" /></a>
				</div>
				<div class="footer-grid-left">
					<a href="single.html"><img src="{{ asset('images/14.jpg')}}" alt=" " class="img-responsive" /></a>
				</div>
				<div class="footer-grid-left">
					<a href="single.html"><img src="{{ asset('images/15.jpg')}}" alt=" " class="img-responsive" /></a>
				</div>
				<div class="footer-grid-left">
					<a href="single.html"><img src="{{ asset('images/16.jpg')}}" alt=" " class="img-responsive" /></a>
				</div>
				<div class="footer-grid-left">
					<a href="single.html"><img src="{{ asset('images/13.jpg')}}" alt=" " class="img-responsive" /></a>
				</div>
				<div class="footer-grid-left">
					<a href="single.html"><img src="{{ asset('images/14.jpg')}}" alt=" " class="img-responsive" /></a>
				</div>
				<div class="footer-grid-left">
					<a href="single.html"><img src="{{ asset('images/15.jpg')}}" alt=" " class="img-responsive" /></a>
				</div>
				<div class="footer-grid-left">
					<a href="single.html"><img src="{{ asset('images/16.jpg')}}" alt=" " class="img-responsive" /></a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!- <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".8s">
				<h3>Blog Posts</h3>
				<div class="footer-grid-sub-grids">
					<div class="footer-grid-sub-grid-left">
						<a href="single.html"><img src="images/9.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="footer-grid-sub-grid-right">
						<h4><a href="single.html">culpa qui officia deserunt</a></h4>
						<p>Posted On 25/3/2016</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="footer-grid-sub-grids">
					<div class="footer-grid-sub-grid-left">
						<a href="single.html"><img src="images/10.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="footer-grid-sub-grid-right">
						<h4><a href="single.html">Quis autem vel eum iure</a></h4>
						<p>Posted On 25/3/2016</p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div> ->
			<div class="clearfix"> </div>
		</div>
		<div class="footer-logo animated wow slideInUp" data-wow-delay=".5s">
			<h2><a href="{{url ('/')}}">Lara - Shop <span>Todo lo que necesites a tu alcance</span></a></h2>
		</div>
		<div class="copy-right animated wow slideInUp" data-wow-delay=".5s">
			<p>&copy 2016 Lara - Shop. Derechos Reservados | Diseñado por <a href="http://w3layouts.com/">w3layouts</a></p>
		</div>
	</div>
</div>

--}}
