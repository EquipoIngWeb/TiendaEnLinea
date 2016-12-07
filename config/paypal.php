 <?php
return [
		'api' => env('API_PAYPAL'),
		'web' => env('URL_WEB_PAYPAL').'/cgi-bin/webscr?cmd=_express-checkout&token=',
		'account' => env('ACCOUNT_PAYPAL'),
		'details' => [
			'USER'      => env('USERNAME_PAYPAL'),
			'PWD'       => env('PASSWORD_PAYPAL'),
			'SIGNATURE' => env('SIGNATURE_PAYPAL'),
			'VERSION'	=> '93',
		 ],
		 'curlopt' => [
			CURLOPT_URL				 => env('API_PAYPAL'),
			CURLOPT_RETURNTRANSFER	=> true,
			CURLOPT_SSL_VERIFYPEER	=> false,
			CURLOPT_POST 			=> '',
			CURLOPT_POSTFIELDS		=> 0
		 ],
		 'method'=>[
			'set'=> ['METHOD'=>'SetExpressCheckout',
					'RETURNURL' 					=> 'http://localhost/public/user/donations/paypal/success',
					'PAYMENTREQUEST_0_PAYMENTACTION'=> 'SALE',
					'LOGOIMG'						=> 'http://104.236.6.68/img/Logo1.png'
			],
			'get'=> ['METHOD' => 'GetExpressCheckoutDetails'],
			'do'=> ['METHOD'  => 'DoExpressCheckoutPayment',
					'PAYMENTREQUEST_0_PAYMENTACTION'=>'Sale'],
		 ],
	 ];
  ?>
