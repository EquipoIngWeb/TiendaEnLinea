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
	public function getDisaproved()
	{
		return $this->getModel()->where('status',0)->with('user')->with('product')->get();
	}
	public function getOfProduct($product='')
	{
		return $this->getModel()->where('id_product',$product)->orderBy('id_product')->get();
	}
}
 ?>
