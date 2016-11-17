<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
		'id', 'message','user_id','product_id','status'
	];
	public function user()
	{
	    return $this->hasOne('App\User','id','user_id');
	}
	public function product()
	{
	    return $this->hasOne('App\Product','id','product_id');
	}
}
