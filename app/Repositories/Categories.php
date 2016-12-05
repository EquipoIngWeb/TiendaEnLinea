<?php
namespace App\Repositories;
use  App\Category as Model;
use Illuminate\Http\Request;

class Categories  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}
}
?>