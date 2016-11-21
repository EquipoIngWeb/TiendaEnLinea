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
	public function setImageAttribute($image='')
	{
		$root='images/brands/';
		if (is_string($image)) {
			$this->attributes['image'] = $image;
			return;
		}
		$nombre = $image->getClientOriginalName();
		$this->attributes['image'] = $root.$nombre;
	}
}
