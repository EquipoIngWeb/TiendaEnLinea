<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Brand extends Model
{
	protected $fillable = [
	'id', 'name','url','image'
	];
	public function products()
	{
<<<<<<< HEAD
		return $this->hasMany(Product::class);
=======
		return $this->hasMany('App\Product');
>>>>>>> 1ad0629066d60ac6fd8cf6dc072cb2e18b61e69d
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
