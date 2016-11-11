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
		return $this->menu($this->getModel()->get());
	}
	// $children = collect([]);

	// $children->push($subcategory);

	public function menu($list,$parents = [])
	{
		$children = collect([]);
		foreach ($list as $category) {
			$flat= false;
			foreach ($list as $brother) {
				if ($category->isParent($brother->id)) {
					$flat=true;
					break;
				}
			}
			if (!$flat) {
				if (sizeof($parents)>0) {
					$count=0;
					foreach ($parents as $parent) {
						if ($category->isParent($parent)) {
							$count++;
						}
					}
					if ($count == sizeof($parents)) {
						$children->put($category->name,$this->menu($category->children()->get(),array_merge($parents,[$category->id])));
					}
				}else{
					$children->put($category->name,$this->menu($category->children()->get(),array_merge($parents,[$category->id])));
				}
			}
		}
		return $children;
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
		create(Array $data)
		update($id,Array $datos)
		remove($id)
	-->
