<?php

namespace App\Helpers;

class PayPal implements IPayPal
{
	protected $details;
	protected $curlopt;
	protected $api;
	protected $method;
	protected $setDetails;
	protected $url_web;
	function __construct()
	{
		$this->api 		=\Config::get('paypal.api');
		$this->url_web 	=\Config::get('paypal.web');
		$this->method 	=\Config::get('paypal.method');
		$this->details 	=\Config::get('paypal.details');
		$this->curlopt 	=\Config::get('paypal.curlopt');
	}
	public function setCheckout($payment=[])
	{
		$out = $this->callPaypal($payment,'set');
		if ($out['ACK']=='Success')
			return ['status'=>0,'url'=>$this->url_web.$out['TOKEN']];
		return ['status'=>0,'message'=>$out['L_LONGMESSAGE0']];
	}

	public function getCheckout($token = null)
	{
		$payment = ['TOKEN'=>$token];
		$out = $this->callPaypal($payment,'get');
		return $out;
	}
	public function doCheckout($details=null)
	{
		$out = $this->callPaypal($details,'do');
		if($out['PAYMENTINFO_0_PAYMENTSTATUS'] == 'Completed'){
			return true;
		}
		return false;
	}
	public function callPaypal($parameters = [],$method='set')
	{
		$parameters = array_merge($this->details,$this->method[$method],$parameters);
		$charge = curl_init($this->api);
		$this->curlopt[CURLOPT_POST]		= count($parameters);
		$this->curlopt[CURLOPT_POSTFIELDS]	= http_build_query($parameters);
		curl_setopt_array($charge, $this->curlopt);
		$result = curl_exec($charge);
		if (curl_errno($charge)) {
			var_dump(curl_error($charge));
			die();
		}
		curl_close($charge);
		parse_str(urldecode($result),$out);
		return $out;
	}
}


