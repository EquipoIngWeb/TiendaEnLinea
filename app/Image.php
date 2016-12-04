<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
protected $fillable = [
	'id', 'name','produc_id'
	];
	public function product()
	{
		// belongsTo(RelatedModel, foreignKey = product_id, keyOnRelatedModel = id)
		return $this->belongsTo(\App\Product::class);
	}
	public function getNameAttribute()
	{
		return asset($this->attributes['name']);
	}
}
