<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lara - Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lobster+Two:400,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="container" id="total">
    <div class="opacidad negro">
    <div class="text-right" id="log">
        <div class="container">
        <!-- <div class="flex-center position-ref full-height"> -->
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login </a>
                    <a href="{{ url('/register') }}"> Register</a>
                </div>
            @endif
        <!-- </div> -->
        </div>
        </div>


        <div class="row">
            <div class="col-md-12 col-xs-12 text-center" id="titulo">
                <h1>Coming Soon ...</h1>
            </div>
            <div class="col-md-12 col-xs-12 text-center" id="descripcion">
                Estamos construyendo sueños, en unos días estará lista nuestra página<br>
                para que la disfrutes y compartas con todos tus amigos. 
            </div>
            <div class="col-md-12 col-xs-12 text-center" id="engrane">
                <i class="fa fa-cog fa-spin"></i>
            </div>
            <div class="col-md-12 col-xs-12 text-center" id="fecha">
                14 - 11 - 16
            </div>
            <div class="col-md-12 col-xs-12 text-center" id="textosociales">
                Síguenos en nuestras redes sociales para recibir noticias.
            </div>
            <div class="col-md-12 col-xs-12 text-center" id="redessociales">
                <a href="#"><i class="fa fa-facebook"></i> Me gusta  </a>
                <a href="#"><i class="fa fa-twitter"></i> Seguir  </a>
                <a href="#"><i class="fa fa-instagram"></i> Seguir  </a>
                <a href="#"><i class="fa fa-google-plus"></i> Seguir</a>
            </div>
        </div>
    </div>
    

            <!-- <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div> -->
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <script type="text/javascript" src="/js/npm.js"></script>
</body>
</html>