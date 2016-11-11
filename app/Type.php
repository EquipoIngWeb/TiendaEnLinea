<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Brand;
class Type extends Model
{
    protected $fillable = [
	'id', 'name','description'
	];
	public function products()
	{
	    return $this->hasMany(Product::class, 'type_id', 'id');
	}
	public function brands()
	{
	    return $this->belongsToMany(Brand::class, 'types_brands', 'brand_id', 'type_id');
	}

}
