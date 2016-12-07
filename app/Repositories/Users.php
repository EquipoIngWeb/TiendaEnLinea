<?php
namespace App\Repositories;
use  App\User as Model;
use Illuminate\Http\Request;

class Users  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}

	public function getUsers()
	{
		return $this->getModel()->where('role_id','user')->get();
	}
	public function getByCodeConfirmation($code='')
	{
		return $this->getModel()->where('confirmation_code',$code)->first();
	}
	public function getByUsername($username)
	{
		return $this->getModel()->where('username',$username)->firstOrFail();
	}
}
