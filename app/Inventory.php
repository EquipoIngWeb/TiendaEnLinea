<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
	protected $fillable = [
			   'id','amount','price','product_id','size_id','color_id'
	];
	public function product()
	{
	    return $this->belongsTo('App\Product','product_id','id');
	}
	public function size()
	{
	    return $this->belongsTo('App\Size');
	}
	public function color()
	{
	    return $this->belongsTo('App\Color');
	}
}
