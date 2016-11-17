<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
		'id', 'message','user_id','product_id'
	];
	public function user()
	{
	    return $this->hasOne('App\User','id','user_id');
	}
}
