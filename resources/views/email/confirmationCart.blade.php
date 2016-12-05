<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Se realizara la siguiente compra:</h2>

        <div>
        	<h5>Estimado {{$user['full_name']}}</h5>
        	<p>
        		Su le notifica que esta apunto de realizar la siguiente compra:

        	</p>
            <table class="centered">
                <thead>
                    <tr>
                        <th>Cantidad</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                @foreach($cart as $item)
                    <tr>
                        <td>{{$item->amount}}</td>
                        <td>{{$item->product->name}}</td>
                        <td>${{$item->product->price}}</td>
                    </tr>
                @endforeach
            </table>
            Porfavor  siga el siguiente enlace para confirmar su compra en Lara-shop
            <a href=" {{ url('user/buy_the_cart/' . $user['confirmation_code']) }}">
                Confirmar compra
            </a>
			<p>
				Gracias por unirse a nosotros!!
			</p>
        </div>

    </body>
</html>
