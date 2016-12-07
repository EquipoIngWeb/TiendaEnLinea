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
		if ($this->attributes['image']=='images/categories/default.jpg') {
			return $this->category()->first()->image;
		}
		return asset('storage/'.$this->attributes['image']);
	}
	public function setImageAttribute($image='')
	{
		$root='images/subcategory/';
		$name = $image->getClientOriginalName();
		\Storage::disk('local')->put($root.$name,  \File::get($image));
		$this->attributes['image'] = $root.$name;
	}
}
