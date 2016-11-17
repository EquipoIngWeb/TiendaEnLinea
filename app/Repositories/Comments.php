<?php
namespace App\Repositories;
use  App\Comment as Model;
use Illuminate\Http\Request;

class Comments  extends BaseRepository
{
	private $model;
	function __construct(Model $model){
		$this->model = $model;
	}
	function getModel(){
		return $this->model;
	}
	
}
 ?>