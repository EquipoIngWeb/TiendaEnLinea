<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
class Category extends Model
{
	protected $fillable = [
	'id', 'name','description','image','gender_id'
	];
	public function save(array $options = [])
	{
    	parent::save();
		\Storage::disk('local')->makeDirectory('images/categories/'.$this->attributes['id'].'-'.$this->attributes['name']);
    }
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
		return $this->subcategories()->products();
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
