<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
		'id', 'name'
	];
	public function type()
	{
		return $this->belongsTo(Type::class);
	}
}
