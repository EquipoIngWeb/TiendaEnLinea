<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;

class Comment extends Model
{
    protected $table="comments";
    protected $fillable = [
		'id', 'message','user_id','product_id','status'
	];
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
