<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
class Category extends Model
{
	protected $fillable = [
	'id', 'name','description','image'
	];
	public function save(array $options = [])
	{
    	parent::save();
		\Storage::disk('local')->makeDirectory('images/categories/'.$this->attributes['id'].'-'.$this->attributes['name']);
    }
	public function products()
	{
		return $this->belongsToMany('App\Product', 'products_categories', 'category_id', 'product_id');
	}
	public function children()
	{
		return $this->belongsToMany('App\Category', 'subcategories', 'parent_id', 'child_id')->with('children');
	}
	public function parents()
	{
		return $this->belongsToMany('App\Category', 'subcategories', 'child_id', 'parent_id')->with('children');
	}
	public function getImageAttribute()
	{
		$images_array = \Storage::disk('local')->files('images/categories/'.$this->attributes['id'].'-'.$this->attributes['name']);
		if (sizeof($images_array)==0) {
			return asset('images/default.jpg');//'http://simpledeveloper.com/wp-content/uploads/2014/08/how-to-use-laravel-model.jpg';
		}
		return asset($images_array[0]);
	}
}
