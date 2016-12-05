<?php
namespace App\Repositories;
use  App\Product as Model;
use Illuminate\Http\Request;

class Products  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}
}
 ?>

