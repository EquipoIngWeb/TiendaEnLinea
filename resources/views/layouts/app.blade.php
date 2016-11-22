
<!DOCTYPE html>
<html>
<head>
	<title>Lara - Shop</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<meta name="keywords" content="" />
	<link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Ewert&subset=latin" rel="stylesheet" type="text/css">
	<link href="//fonts.googleapis.com/css?family=EB Garamond&subset=latin" rel="stylesheet" type="text/css">


	<link rel="shortcut icon" href="{{asset('favicon.ico')}}"/>
</head>

<body>

	@include('layouts.section.navbar')
	@yield('content')
	@include('layouts.section.footer')


	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/materialize.min.js') }}"></script>
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/script.js') }}"></script>
	<script type="text/javascript">
		$(function(){
			$('.modal').modal();
		});
	</script>
</body>
</html>
