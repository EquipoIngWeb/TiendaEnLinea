<?php
namespace App\Repositories;
use  App\Category as Model;
use Illuminate\Http\Request;

class Categories  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}

	public function filterByName($name='',$gender_id)
	{
		return $this->getModel()->where('name','LIKE',"%$name%")->where('gender_id',$gender_id)->first();
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

