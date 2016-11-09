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
}
