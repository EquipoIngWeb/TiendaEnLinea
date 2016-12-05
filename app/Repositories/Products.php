<?php
namespace App\Repositories;
use  App\Product as Model;
use Illuminate\Http\Request;

class Products  extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}
	public function filterBySubcategories($subcategory_id='')
	{
			return  $this->getModel()->where('subcategory_id',$subcategory_id)->paginate(24);
	}
	public function filterByCategories($category_id='')
	{
		return  $this->getModel()->whereIn('subcategory_id',\App\Subcategory::select('id')->where('category_id',$category_id)->get()->toArray())->paginate(24);
	}
	public function filterByBrands($brand_id='')
	{
		return  $this->getModel()->where('brand_id',$brand_id)->paginate(24);
	}
}
