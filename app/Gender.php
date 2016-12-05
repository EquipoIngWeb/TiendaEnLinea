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

	public function subcategories()
	{
		// hasManyThrough(FarModel, closeModel, keyOnCloseModel = gender_id, keyOnFarModel = through_id)
		return $this->hasManyThrough(Subcategory::class, Category::class);
	}
	public function getImageAttribute()
	{
		return asset('storage/'.$this->attributes['image']);
	}
	public function setImageAttribute($image='')
	{
		$root='images/genders/';
		$name = $image->getClientOriginalName();
		\Storage::disk('local')->put($root.$name,  \File::get($image));
		$this->attributes['image'] = $root.$name;
	}
}
