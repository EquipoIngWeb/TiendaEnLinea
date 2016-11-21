<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
class Brand extends Model
{
	protected $fillable = [
	'id', 'name','url','image'
	];
	public function products()
	{
		return $this->hasMany('App\Product');
	}
	public function getImageAttribute()
	{
		$image=$this->attributes['image'];
		if (filter_var($image, FILTER_VALIDATE_URL)) {
		    return $image;
		}
		return asset($image);
	}
}
