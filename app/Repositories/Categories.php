<?php
namespace App\Repositories;
use  App\Category as Model;
use Illuminate\Http\Request;

class Categories  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}

	public function getMenu()
	{
		if (!session()->has('categories')) {
			$this->updateMenu();
		}
		return session()->get('categories');
	}

	public function updateMenu()
	{
		session()->put('categories',$this->getFirsts());
	}
	public function filterBy($category,$filter='')
	{
		if ($filter=='down') {
	 		return $this->getModel()->where('id',$category)->with(['children'=> function ($query){
	 			return $query->with(['products' => function($query)
	 			{
	 				$query->orderBy('price', 'asc');
	 			}]);
	 		}])->first();
		}
		if ($filter=='up') {
	 		return $this->getModel()->where('id',$category)->with(['children'=> function ($query){
	 			return $query->with(['products'=>function($query)
	 			{
	 				$query->orderBy('price', 'desc');
	 			}]);
	 		}])->first();
		}
	}
	public function getOfCategories($category='',$filter='')
	{
		if ($filter=='') {
	 		return $this->getModel()->where('id',$category)->with(['children'=> function ($query){
	 			return $query->with('products');
	 		}])->first();
		}
		if ($filter=='down') {
	 		return $this->getModel()->where('id',$category)->with(['children'=> function ($query){
	 			return $query->with('products')->orderBy('price', 'desc');
	 		}])->first();
		}
		if ($filter=='up') {
	 		return $this->getModel()->where('id',$category)->with(['children'=> function ($query){
	 			return $query->with('products')->orderBy('price', 'asc');
	 		}])->first();
		}
		if ($filter=='up') {
	 		return $this->getModel()->where('id',$category)->with(['children'=> function ($query){
	 			return $query->with('products')->orderBy('name');
	 		}])->first();
		}
	}

	public function getFirsts()
	{
		$categories = $this->getModel()->withCount('parents')->with('products')->with('children')->get();
		$categories = $categories->reject(function ($category) {
			return $category->parents_count <> 0;
		});
		return $categories;
	}

}
?>
 <!--
		getModel()
		getAll()
		paginate($total=15)
		findOrFail($id)
		find($id)
		count()
		searchFor($field,$value)
		save(Array $data)
		update($id,Array $datos)
		remove($id)
	-->
