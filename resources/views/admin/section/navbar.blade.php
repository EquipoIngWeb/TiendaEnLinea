<div class="sidebar-menu">
	<header class="logo1">
		<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
	</header>
	<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
	<div class="menu">
		<ul id="menu" >
			<li><a href="{{ url('admin') }}"><i class="fa fa-tachometer"></i> <span>Principal</span></a></li>
			<li>
				<a href="{{ url('admin/sales') }}">
					<i class="fa fa-shopping-cart"></i>
					<span>Ventas</span>
				</a>
			</li>
			<li>
				<a href="{{ url('admin/inventories') }}">
					<i class="fa fa-list-ol"></i>
					<span>Inventario</span>
				</a>
			</li>
			<li>
				<a href="{{ url('admin/images') }}">
					<i class="fa fa-file"></i>
					<span>Banco de Imagenes</span>
				</a>
			</li>
			<li>
				<a href="{{ url('/admin/categories') }}">
					<i class="fa fa-sitemap"></i>
					<span>Categorias</span>
				</a>
			</li>
			<li>
				<a href="{{ url('admin/products') }}">
					<i class="fa fa-suitcase"></i>
					<span>Productos</span>
				</a>
			</li>
			<li>
				<a href="{{ url('admin/users') }}">
					<i class="fa fa-users"></i>
					<span>Usuarios</span>
				</a>
			</li>
			<li>
				<a href="{{ url('admin/brands') }}">
					<i class="fa fa-tags"></i>
					<span>Marcas</span>
				</a>
			</li>
			<li>
				<a href="{{ url('admin/sizes') }}">
					<i class="fa fa-sliders"></i>
					<span>Tallas</span>
				</a>
			</li>
			<li>
				<a href="{{ url('admin/colors') }}">
					<i class="fa fa-hashtag"></i>
					<span>Colores</span>
				</a>
			</li>
			<li>
				<a href="{{ url('admin/comments') }}">
					<i class="fa fa-list"></i>
					<span>Comentario</span>
				</a>
			</li>

			{{-- <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span> New Arrivals</span> <span class="fa fa-angle-right" style="float: right"></span></a>
				<ul id="menu-academico-sub" >
					<li id="menu-academico-avaliacoes" ><a href="shoes.html">Shoes</a></li>
					<li id="menu-academico-avaliacoes" ><a href="products.html">Watches</a></li>
					<li id="menu-academico-boletim" ><a href="sunglasses.html">Sunglasses</a></li>
				</ul>
			</li>
			 --}}
		</ul>
	</div>
</div>

