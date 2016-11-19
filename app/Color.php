<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
		'id', 'name', 'example'
	];
	public function inventories()
	{
		return $this->hasMany('App\Inventory');
	}
}
