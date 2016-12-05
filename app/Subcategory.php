<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table="subcategories";
	protected $fillable = [
		'id', 'name','description','image','category_id'
	];
	public function category()
	{
		// belongsTo(RelatedModel, foreignKey = category_id, keyOnRelatedModel = id)
		return $this->belongsTo(\App\Category::class);
	}

	public function products()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = subcategory_id, localKey = id)
		return $this->hasMany(\App\Product::class);
	}
	public function getImageAttribute()
	{
		return asset('images/'.$this->attributes['image']);
	}
}
