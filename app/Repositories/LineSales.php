<?php
namespace App\Repositories;
use  App\LineSale as Model;
use Illuminate\Http\Request;

class LineSales  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}


}
