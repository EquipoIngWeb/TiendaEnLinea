<?php
namespace App\Repositories;
use App\Brand as Model;
use Illuminate\Http\Request;

/*
	Marcas
*/

class Brands extends BaseRepository
{
	function __construct(Model $model)
	{
		$this->model = $model;
	}

	public function getByName($name='')
	{
		return $this->getModel()->where('name',$name)->first();
	}
	public function filterByName($name='')
	{
		return $this->getModel()->where('name','LIKE',"%$name%")->first();
	}
}
