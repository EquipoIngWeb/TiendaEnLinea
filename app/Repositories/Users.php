<?php
namespace App\Repositories;
use  App\User as Model;
use Illuminate\Http\Request;

class Users  extends BaseRepository
{
	private $model;
	function __construct(Model $model){
		$this->model = $model;
	}
	function getModel(){
		return $this->model;
	}
	public function create($data){
		return $this->insert($data);
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
