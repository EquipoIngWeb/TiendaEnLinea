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
	public function products()
	{
		return $this->categories()->subcategories()->products();
	}
}
