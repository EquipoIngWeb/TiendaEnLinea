<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Specification;
class Inventory extends Model
{
	protected $fillable = [
<<<<<<< HEAD
		'id','amount','specification_id'
	];
	public function specification()
	{
		return $this->belongsTo(Specification::class);
=======
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
>>>>>>> 1ad0629066d60ac6fd8cf6dc072cb2e18b61e69d
	}
}
