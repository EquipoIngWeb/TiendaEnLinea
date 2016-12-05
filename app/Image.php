<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
protected $fillable = [
	'id', 'image','product_id'
	];
	public function product()
	{
		// belongsTo(RelatedModel, foreignKey = product_id, keyOnRelatedModel = id)
		return $this->belongsTo(\App\Product::class);
	}
	public function setImageAttribute($image='')
	{
		$root='images/products/';
		$name = $image->getClientOriginalName();
		\Storage::disk('local')->put($root.$name,  \File::get($image));
		$this->attributes['image'] = $root.$name;
	}
	public function getNameAttribute()
	{
		return asset('storage/'.$this->attributes['image']);
	}
}
