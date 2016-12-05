<?php
namespace App\Repositories;
use  App\Gender as Model;
use Illuminate\Http\Request;

class Genders  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}
	# Obtener los articulos por genero.
	#	Cada genero con sus respectivas ccategorias y subcategorias.
	public function getAllFull()
	{
		return $this->getModel()->with(['categories'=>function($query)
		{
			$query->with('subcategories');
		}])->get();
	}
	public function getWithProducts($id)
	{
		return $this->getModel()->where('id',$id)->with(['categories'=>function($query=''){
				$query->with('products');
		}])->first();
	}
}
?>
