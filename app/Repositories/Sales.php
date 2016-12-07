<?php
namespace App\Repositories;
use  App\Sale as Model;
use Illuminate\Http\Request;

class Sales  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}
	public function getOfUser($user_id)
	{
		return $this->model->where('user_id',$user_id)->with('lineSales')->get();
	}

}
