<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
		'id', 'message'
	];
	public function user()
	{
	    return $this->hasOne('App\User','id');
	}
}
