<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Specification;
class Size extends Model
{
    protected $fillable = [
		'id', 'name'
	];
<<<<<<< HEAD
	public function specifications()
	{
		return $this->hasMany(Specification::class);
=======
	public function inventories()
	{
		return $this->hasMany('App\Inventory');
>>>>>>> 1ad0629066d60ac6fd8cf6dc072cb2e18b61e69d
	}
}
