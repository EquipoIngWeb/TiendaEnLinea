
<!DOCTYPE html>
<html>
<head>
	<title>Lara - Shop</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>

		<!-- //for-mobile-apps -->
		<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
		<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />

		<!-- cart -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}">
		<!-- //for bootstrap working -->
		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
		<!-- animation-effect -->
		<link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
		<!-- //favicon -->
		<link rel="shortcut icon" href="{{asset('favi.ico')}}"/>
	</head>

	<body>
		@include('layouts.section.navbar')

		@yield('content')

		@include('layouts.section.footer')

		<script src="{{ asset('/js/jquery.min.js') }}"></script>
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);function hideURLbar(){ window.scrollTo(0,1); } </script>

		<script src="{{ asset('js/simpleCart.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap-3.1.1.min.js') }}"></script>
		<script src="{{ asset('js/jquery.countdown.js') }}"></script>

		<script src="{{ asset('js/wow.min.js') }}"></script>

		<script src="{{ asset('js/classie.js') }}"></script>
		<script src="{{ asset('js/uisearch.js') }}"></script>
		<script src="{{ asset('js/imagezoom.js') }}"></script>
		<script src="{{ asset('js/jquery.wmuSlider.js') }}"></script>
		<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
		<script src="{{ asset('js/jquery.flexslider.js') }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
		<script>
			$(document).ready(function(){
				/* ---- Countdown timer ---- */
				var comming = new Date(2016,10,14);
				$('#counter').countdown({
					timestamp : comming.getTime()
				});

				$('.example1').wmuSlider();
				new UISearch( document.getElementById( 'sb-search' ) );

				window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>

				new WOW().init();

			});
		</script>
		<script src="{{ asset('js/script.js') }}"></script>

	</body>
	</html>
