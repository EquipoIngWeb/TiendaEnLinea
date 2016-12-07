<?php
namespace App\Helpers;


interface IPayPal {
	public function setCheckout();
	public function callPaypal($parameters,$method);
}
