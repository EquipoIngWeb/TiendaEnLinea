<?php
namespace App\Repositories;
use  App\Size as Model;
use Illuminate\Http\Request;

class Sizes  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}

}
