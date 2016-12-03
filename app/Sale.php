<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\LineSale;
class Sale extends Model
{
   protected $fillable = [
		'id','user_id','country','address','postal_code','city','phone'
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
