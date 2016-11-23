<?php
namespace App\Repositories;
use  App\Inventory as Model;
use Illuminate\Http\Request;

class Inventories  extends BaseRepository
{
	private $model;
	function __construct(Model $model){
		$this->model = $model;
	}
	function getModel(){
		return $this->model;
	}
	public function create($data){
		return $this->save($data);
	}
	public function getAllWithProducts()
	{
		return $this->getModel()->with('product')->get();
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
