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
	public function getWithCategories($id='')
	{
		return $this->getModel()->where('id',$id)->with('categories')->first();
	}
	public function getWithProducts($id)
	{
		return $this->getModel()->where('id',$id)->with(['categories'=>function($query=''){
				$query->with('products');
		}])->first();
	}
	public function filterByName($name='')
	{
		return $this->getModel()->where('name','LIKE',"%$name%")->first();
	}

	// public function filterBy($category,$filter='')
	// {
	// 	if ($filter=='down') {
	//  		return $this->getModel()->where('id',$category)->with(['children'=> function ($query){
	//  			return $query->with(['products' => function($query)
	//  			{
	//  				$query->orderBy('price', 'asc');
	//  			}]);
	//  		}])->first();
	// 	}
	// 	if ($filter=='up') {
	//  		return $this->getModel()->where('id',$category)->with(['children'=> function ($query){
	//  			return $query->with(['products'=>function($query)
	//  			{
	//  				$query->orderBy('price', 'desc');
	//  			}]);
	//  		}])->first();
	// 	}
	// }

	// public function getOfCategories($category='',$filter='')
	// {
	// 	if ($filter=='') {
	//  		return $this->getModel()->where('id',$category)->with(['children'=> function ($query){
	//  			return $query->with('products');
	//  		}])->first();
	// 	}
	// 	if ($filter=='down') {
	//  		return $this->getModel()->where('id',$category)->with(['children'=> function ($query){
	//  			return $query->with('products')->orderBy('price', 'desc');
	//  		}])->first();
	// 	}
	// 	if ($filter=='up') {
	//  		return $this->getModel()->where('id',$category)->with(['children'=> function ($query){
	//  			return $query->with('products')->orderBy('price', 'asc');
	//  		}])->first();
	// 	}
	// 	if ($filter=='up') {
	//  		return $this->getModel()->where('id',$category)->with(['children'=> function ($query){
	//  			return $query->with('products')->orderBy('name');
	//  		}])->first();
	// 	}
	// }


}
