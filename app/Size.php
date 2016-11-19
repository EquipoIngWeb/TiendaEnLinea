<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
		'id', 'name'
	];
	public function inventories()
	{
		return $this->hasMany('App\Inventory');
	}
}
