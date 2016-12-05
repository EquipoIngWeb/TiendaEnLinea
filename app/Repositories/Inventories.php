<?php
namespace App\Repositories;
use  App\Inventory as Model;
use Illuminate\Http\Request;

class Inventories  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}
	public function create($data){
		return $this->save($data);
	}
	public function getAllWithProduct()
	{
		return $this->getModel()->with(['specification'=>function ($query)
		{
			return $query->with('product');
		}])->get();
	}
	public function getBySpecification($specification_id='')
	{
		return $this->getModel()->where('specification_id',$specification_id)->first();
	}
}
