<?php
namespace App\Repositories;
use  App\LineSale as Model;
use Illuminate\Http\Request;

class LineSales  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}

	public function ticket($sale_id)
	{
		return $this->getModel()->where('sale_id',$sale_id)->with(['specification'=>function($query){
			$query->with('product');
			$query->with('size');
		}])->get();
	}
}
