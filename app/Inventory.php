<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Specification;
class Inventory extends Model
{
	protected $fillable = [
		'id','amount','specification_id'
	];
	public function specification()
	{
		return $this->belongsTo(Specification::class);
	}
}
