<?php
namespace App\Repositories;
use  App\User as Model;
use Illuminate\Http\Request;

class Users  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}
<<<<<<< HEAD
=======
	function getModel(){
		return $this->model;
	}
>>>>>>> 1ad0629066d60ac6fd8cf6dc072cb2e18b61e69d

	public function getUsers()
	{
		return $this->getModel()->where('role_id','user')->get();
	}
	public function getByCodeConfirmation($code='')
	{
		return $this->getModel()->where('confirmation_code',$code)->first();
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
