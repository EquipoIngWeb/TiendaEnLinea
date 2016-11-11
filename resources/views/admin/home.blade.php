@extends('admin.app')

@section('content')
<!-- start content -->
<div class="women_main">
	<div class="tab-main">

		<!--/tabs-inner-->
		<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle">Menu Principal </h2>
				<div class="graph">
					<nav>
						<ul>
							<li class="tab-current"><a href="#section-1" class="icon-shop"><span>Shop</span></a></li>
							<li><a href="#section-2" class="icon-cup"><span>Men</span></a></li>
							<li><a href="#section-3" class="icon-food"><span>Women</span></a></li>
							<li><a href="#section-4" class="icon-lab"><span>Kids</span></a></li>
							<li><a href="#section-5" class="icon-truck"><span>Order</span></a></li>
						</ul>
					</nav>
					<div class="content tab">
						<section id="section-1" class="content-current">
							<div class="mediabox">
								<i class="fa fa-shopping-cart"></i>
								<h3>Industry's standard</h3>
								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
							</div>
							<div class="mediabox">
								<i class="fa fa-sitemap"></i>
								<h3>Into electronic</h3>
								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
							</div>
							<div class="mediabox">
								<i class="fa fa-suitcase"></i>
								<h3>Various versions</h3>
								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
							</div>
						</section>
						<section id="section-2">
							<div class="mediabox">
								<i class="fa fa-suitcase"></i>
								<h3>Various versions</h3>
								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
							</div>
							<div class="mediabox">
								<i class="fa fa-shopping-cart"></i>
								<h3>Industry's standard</h3>
								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
							</div>
							<div class="mediabox">
								<i class="fa fa-sitemap"></i>
								<h3>Into electronic</h3>
								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
							</div>
						</section>
						<section id="section-3">
							<div class="mediabox">
								<i class="fa fa-sitemap"></i>
								<h3>Into electronic</h3>
								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
							</div>
							<div class="mediabox">
								<i class="fa fa-suitcase"></i>
								<h3>Various versions</h3>
								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
							</div>
							<div class="mediabox">
								<i class="fa fa-shopping-cart"></i>
								<h3>Industry's standard</h3>
								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
							</div>
						</section>
						<section id="section-4">
							<div class="mediabox">
								<i class="fa fa-suitcase"></i>
								<h3>Various versions</h3>
								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
							</div>
							<div class="mediabox">
								<i class="fa fa-shopping-cart"></i>
								<h3>Industry's standard</h3>
								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
							</div>
							<div class="mediabox">
								<i class="fa fa-sitemap"></i>
								<h3>Into electronic</h3>
								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
							</div>
						</section>
						<section id="section-5">
							<div class="mediabox">
								<i class="fa fa-sitemap"></i>
								<h3>Into electronic</h3>
								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
							</div>
							<div class="mediabox">
								<i class="fa fa-suitcase"></i>
								<h3>Various versions</h3>
								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
							</div>
							<div class="mediabox">
								<i class="fa fa-shopping-cart"></i>
								<h3>Industry's standard</h3>
								<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
							</div>
						</section>
					</div><!-- /content -->
				</div>
				<!-- /tabs -->
			</div>
			<div class="clearfix"> </div>
		</div>

	</div>

</div>
<!-- end content -->

@stop

@section('script')
<script src="{{ asset('administrador/js/cbpFWTabs.js') }}"></script>
<script>
	new CBPFWTabs( document.getElementById( 'tabs' ) );
</script>
<script>
	$(function() {
		$('.tabs nav a').on('click', function() {
			show_content($(this).index());
		});
		show_content(0);

		function show_content(index) {
		// Make the content visible
		$('.tabs .context.visible').removeClass('visible');
		$('.tabs .context:nth-of-type(' + (index + 1) + ')').addClass('visible');

		// Set the tab to selected
		$('.tabs nav.second a.selected').removeClass('selected');
		$('.tabs navnav.second a:nth-of-type(' + (index + 1) + ')').addClass('selected');
	}
});
</script>		

@stop