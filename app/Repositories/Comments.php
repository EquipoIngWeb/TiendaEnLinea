<?php
namespace App\Repositories;
use  App\Comment as Model;
use Illuminate\Http\Request;

class Comments  extends BaseRepository
{
	private $model;
	function __construct(Model $model){
		$this->model = $model;
	}
	function getModel(){
		return $this->model;
	}

	public function getAprovedOfProduct($product)
	{
		return $this->getModel()->where('status',1)->where('product_id',$product)->with('user')->get();
	}
	public function getSend()
	{
		return $this->getModel()->where('status',0)->with('user')->with('product')->get();
	}
}
 ?>
