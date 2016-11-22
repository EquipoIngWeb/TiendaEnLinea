<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Role extends Model
{
	protected $fillable = [
	'id', 'name'
	];
	public function users()
	{
	    return $this->hasMany(User::class);
	}
}
