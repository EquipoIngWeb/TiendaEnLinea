<?php
namespace App\Repositories;
use  App\Category as Model;
use Illuminate\Http\Request;

class Categories  extends BaseRepository
{
	private $model;
	function __construct(Model $model){
		$this->model = $model;
	}
	function getModel(){
		return $this->model;
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
		session()->put('categories',$this->menu($this->getFirsts()));
	}

	public function menu($list,$parents = [])
	{
		$children = collect([]);
		foreach ($list as $category) {
			$children->put($category->name,[
								   'name'=>$category->name,
								   'children'=> $this->menu($category->children()->get(),array_merge($parents))
								   ,'id'=>$category->id
								   ]);
		}
		return $children;
	}
	public function getOfCategories($first='')
	{
 		return $this->getModel()->where('id',$first)->with(['children'=> function ($query){
 			$query->with('products');
 		}])->first();
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
