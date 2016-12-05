<?php
namespace App\Repositories;
use  App\Image as Model;
use Illuminate\Http\Request;

class Images  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}

}
