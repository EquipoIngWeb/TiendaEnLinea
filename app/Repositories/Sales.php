<?php
namespace App\Repositories;
use  App\Sale as Model;
use Illuminate\Http\Request;
use HPayPal;
class Sales  extends BaseRepository
{
	private $paypal;
	function __construct(Model $model,HPayPal $paypal){
		$this->paypal = $paypal;
		$this->model = $model;
	}
	public function getOfUser($user_id)
	{
		return $this->model->where('user_id',$user_id)->with('lineSales')->get();
	}

	// public function savePayPal($array=[])
 //    {

 //        $user = $this->users->findOrFail($array['id_user']);
 //        foreach ($collection as $value) {

 //        }
 //        $project = $this->projects->findOrFail($array['id_project']);
 //        $payment= [
 //            'PAYMENTREQUEST_0_CUSTOM'        => $user->full_name,
 //            'PAYMENTREQUEST_0_CURRENCYCODE'  => 'MXN',
 //            'CANCELURL'                      => \URL::previous(),
 //            'PAYMENTREQUEST_0_AMT'           => $array['amount'],
	// 		'L_PAYMENTREQUEST_0_DESC0' 		=> 'Compra en Lara-Shop',
	// 		'L_PAYMENTREQUEST_0_QTY0' 		=> 1,
 //            'L_PAYMENTREQUEST_0_NAME0'       => $project->title,
 //            'L_PAYMENTREQUEST_0_NUMBER0'     => $project->id,
 //            'L_PAYMENTREQUEST_0_AMT0'        => $array['amount'],
 //        ];
 //        $response = $this->paypal->setCheckout($payment);
 //        $array['token_id'] = \HString::getValueOf($response['url'],'token');
 //        $donation = $this->insert($array);
 //        return $response['url'];
 //    }

 //    public function paypalSuccess($token_id)
 //    {
 //        return $this->paypal->getCheckout($token_id);
 //    }
 //    public function paypalConfirm($parameters=[])
 //    {
 //        $response = $this->paypal->doCheckout($parameters);
 //        if ($response){
 //            $donation = $this->getByToken($parameters['TOKEN']);
 //            $donation->status = 'paid';
 //            $donation->save();
 //        }
 //        return $response;
 //    }
}
