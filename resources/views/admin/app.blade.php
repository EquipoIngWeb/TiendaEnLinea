<!DOCTYPE HTML>
<html>
<head>
	<title>Lara - Shop</title>


<meta http-equiv="Expires" content="0">

<meta http-equiv="Last-Modified" content="0">

<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">

<meta http-equiv="Pragma" content="no-cache">


	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<!-- Bootstrap Core CSS -->
	<link href="{{ asset('administrador/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="{{ asset('administrador/css/style.css') }}" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="{{ asset('administrador/css/icon-font.min.css') }}" type='text/css' />
	<link rel="shortcut icon" href="{{asset('favi.ico')}}"/>
</head>
<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				@include('admin.section.header')
				<!--content-->
				<div class="content">
					@if (isset($breadcrumb))
						@yield('breadcrumb')
						<ol class="breadcrumb">
							@foreach ($breadcrumb as $bc)
								@if (isset($bc['url']))
									<li>
										<a href="{{$bc['url']}}">{{$bc['name']}}</a>
									</li>
								@else
								<li class="active">{{$bc['name']}}</li>
								@endif
							@endforeach
						</ol>
					@endif

					<div class="page-header">
					  <h1>
						@yield('header', 'Menu Principal')
					  </h1>
					</div>

					@yield('content')
					</div>
					<!-- end content -->
					<!--sidebar-menu-->
					@include('admin.section.navbar')
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<script src="{{ asset('administrador/js/jquery-1.10.2.min.js') }}"></script>
		<script src="{{ asset('administrador/js/pie-chart.js') }}" type="text/javascript"></script>
		<script src="{{ asset('administrador/js/jquery.nicescroll.js') }}"></script>
		<script src="{{ asset('administrador/js/simpleCart.min.js') }}"> </script>
		<script src="{{ asset('administrador/js/scripts.js') }}"></script>
		<script src="{{ asset('administrador/js/bootstrap.min.js') }}"></script>
		<script language="javascript" type="text/javascript" src="{{ asset('administrador/js/jquery.flot.js') }}"></script>
		<script type="text/javascript"></script>
		<script src="{{ asset('administrador/js/jquery.fn.gantt.js') }}"></script>
		<script src="{{ asset('administrador/js/amcharts.js') }}"></script>
		<script src="{{ asset('administrador/js/serial.js') }}"></script>
		<script src="{{ asset('administrador/js/toaster.js') }}"></script>
		<script>
			$(document).ready(function() {
				@if (session()->has('message'))
						$.toaster({
							toaster:
									    {
									        'css'       :
									        {
									            'top'      : '80px',
									        }
									    },
							priority : 'success' || null,
							title    : 'Información' || null,
							message  : '{{session()->get('message')}}' || 'A message is required'
						});
				@endif
				var toggle = true;
				$(".sidebar-icon").click(function() {
					if (toggle)
					{
						$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
						$("#menu span").css({"position":"absolute"});
					}
					else
					{
						$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
						setTimeout(function() {
							$("#menu span").css({"position":"relative"});
						}, 400);
					}
					toggle = !toggle;
				});
			});
		</script>
		<script src="{{ asset('administrador/js/menu_jquery.js') }}"></script>
		@yield('script')

	</body>
</html>
