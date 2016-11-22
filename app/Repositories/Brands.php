<?php
namespace App\Repositories;
use  App\Brand as Model;
use Illuminate\Http\Request;

class Brands  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}

	public function getByName($name='')
	{
		return $this->getModel()->where('name',$name)->first();
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
