<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Specification;
class Size extends Model
{
    protected $fillable = [
		'id', 'name'
	];
	public function specifications()
	{
		return $this->hasMany(Specification::class);
	}
}
