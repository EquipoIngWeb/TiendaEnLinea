<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table="genders";
	protected $fillable = [
		'id', 'name','description','image'
	];
	public function categories()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = gender_id, localKey = id)
		return $this->hasMany(\App\Category::class);
	}
	public function scopeProducts($query,$id)
	{
	    $query
	        ->join('categories', 'genders.id', '=', 'categories.gender_id')
	        ->join('subcategories', 'categories.id', '=', 'subcategories.category_id')
	        ->join('products', 'subcategories.id', '=', 'products.subcategory_id')
	        ->where('genders.id',$id);
	    return $query;
	}
	public function subcategories()
	{
		// hasManyThrough(FarModel, closeModel, keyOnCloseModel = gender_id, keyOnFarModel = through_id)
		return $this->hasManyThrough(Subcategory::class, Category::class);
	}
	public function getImageAttribute()
	{
		return asset('images/'.$this->attributes['image']);
	}
}
