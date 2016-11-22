<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineSale extends Model
{
	 protected $fillable = [
		'id', 'specification_id', 'price', 'amount','sale_id'
	];
	public function specification()
	{
		return $this->belongsTo(Specification::class);
	}
}
