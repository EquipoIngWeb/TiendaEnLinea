<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
		'id', 'name','description'
	];
	public function type()
	{
		return $this->belongsTo(Type::class);
	}
}
