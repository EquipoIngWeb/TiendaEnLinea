<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	 protected $fillable = [
		'id', 'name','description'
	];
	public function parents()
	{
		return $this->belongsToMany('App\Category', 'subcategories', 'parent_id', 'child_id');
	}
	public function children()
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
	public function scopeBase($query)
    {
        return $query->with('parents');
    }
}
