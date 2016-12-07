<?php
namespace App\Repositories;
use  App\Score as Model;
use Illuminate\Http\Request;

class Scores  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}

}
