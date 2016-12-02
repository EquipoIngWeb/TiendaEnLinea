<!DOCTYPE html>
<html lang="en-US">
    <head>
	    <title>Correo de confirmación</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verfique su correo con el siguiente enlace</h2>

        <div>
        	<h5>Estimado {{$user['full_name']}}</h5>
        	<p>
        		Su correo se a enlazado a la siguiente cuenta en nuestra plataforma.
        	</p>
        	<p>
        		Usuario:{{$user['username']}}
        	</p>
            Porfavor  siga el siguiente enlace para confirmar su cuenta en Lara-shop
            {{ url('register/verify/' . $user['confirmation_code']) }}.
			<p>
				Gracias por unirse a nosotros!!
			</p>
        </div>

    </body>
</html>
