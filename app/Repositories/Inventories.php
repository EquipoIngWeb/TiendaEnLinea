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
	public function getAllWithProducts()
	{
		return $this->getModel()->with('specifications')->get();
	}
	public function getBySpecification($specification_id='')
	{
		return $this->getModel()->where('specification_id',$specification_id)->first();
	}
}
 ?>

 <!--
		getModel()
		getAll()
		pag
		findOrFail($id)
		find($id)
		count()
		searchFor($field,$value)
		save(Array $data)
		update($id,Array $datos)
		remove($id)
  -->
