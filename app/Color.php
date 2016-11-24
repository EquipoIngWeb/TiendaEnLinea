<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Specification;
class Color extends Model
{
    protected $fillable = [
		'id', 'name', 'example'
	];
	public function specifications()
	{
		return $this->hasMany(Specification::class);
	}
}
