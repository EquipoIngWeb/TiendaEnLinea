<?php
namespace App\Repositories;
use  App\Specification as Model;
use Illuminate\Http\Request;

class Specifications  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}


}

