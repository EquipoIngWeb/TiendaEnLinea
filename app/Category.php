<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
class Category extends Model
{
	protected $fillable = [
	'id', 'name','description','image','gender_id'
	];
	// public function save(array $options = [])
	// {
 //    	parent::save();
	// 	\Storage::disk('local')->makeDirectory('images/categories/'.$this->attributes['id'].'-'.$this->attributes['name']);
 //    }
	public function gender()
	{
		// belongsTo(RelatedModel, foreignKey = gender_id, keyOnRelatedModel = id)
		return $this->belongsTo(\App\Gender::class);
	}
	public function subcategories()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = category_id, localKey = id)
		return $this->hasMany(\App\Subcategory::class);
	}
	public function products()
	{
		// hasManyThrough(FarModel, closeModel, keyOnCloseModel = category_id, keyOnFarModel = through_id)
		return $this->hasManyThrough(\App\Product::class, \App\Subcategory::class);
	}
	public function getImageAttribute()
	{
		return asset('storage/'.$this->attributes['image']);
	}
	public function setImageAttribute($image='')
	{
		$root='images/categories/';
		$name = $image->getClientOriginalName();
		\Storage::disk('local')->put($root.$name,  \File::get($image));
		$this->attributes['image'] = $root.$name;
	}
}
