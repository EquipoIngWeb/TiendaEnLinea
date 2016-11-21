<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\LineSale;
class Sale extends Model
{
   protected $fillable = [
		'id','user_id'
	];

	public function lineSales()
	{
		return $this->hasMany(LineSale::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
