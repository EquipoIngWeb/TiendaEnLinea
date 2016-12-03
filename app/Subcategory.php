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
		$images_array = \Storage::disk('local')->files('images/categories/'.$this->attributes['id'].'-'.$this->attributes['name']);
		if (sizeof($images_array)==0) {
			return asset('images/default.jpg');//'http://simpledeveloper.com/wp-content/uploads/2014/08/how-to-use-laravel-model.jpg';
		}
		return asset($images_array[0]);
	}
}
