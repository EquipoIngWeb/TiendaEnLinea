<?php
namespace App\Repositories;
use  App\Sale as Model;
use Illuminate\Http\Request;

class Sales  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}


}
