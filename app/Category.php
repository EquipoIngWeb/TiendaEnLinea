<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
class Category extends Model
{
	 protected $fillable = [
		'id', 'name','description','image'
	];
	public function products()
	{
		return $this->belongsToMany('App\Product', 'products_categories', 'category_id', 'product_id');
	}
	public function children()
	{
		return $this->belongsToMany('App\Category', 'subcategories', 'parent_id', 'child_id');
	}
	public function parents()
	{
		return $this->belongsToMany('App\Category', 'subcategories', 'child_id', 'parent_id');
	}
	public function countChildren()
	{
		return count($this->children()->get());
	}
	public function countParents()
	{
		return count($this->parents()->get());
	}
	public function hasChildren()
	{
		return $this->countChildren() > 0;
	}
	public function hasParents()
	{
		return $this->countParents() > 0;
	}
	public function isParent($parent)
	{
		return $this->parents()->find($parent);
	}
	public function getChildren($parents = [])
	{
		$children = collect([]);
		$subcategories= $this->children()->get();
		foreach ($subcategories as $subcategory) {
			$flat=false;
			foreach ($subcategories as $brother) {
				if ($subcategory->isParent($brother->id)) {
					$flat=true;
					break;
				}
			}
			if (!$flat) {
				if (sizeof($parents)>0) {
					$count=0;
					foreach ($parents as $parent) {
						if ($subcategory->isParent($parent)) {
							$count++;
						}
					}
					if ($count == sizeof($parents)) {
						$children->push($subcategory);
					}
				}else{
					$children->push($subcategory);
				}
			}
		}
		return $children;
	}
}
