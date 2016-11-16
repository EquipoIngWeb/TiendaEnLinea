<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
class Brand extends Model
{
    protected $fillable = [
		'id', 'name','url'
	];
	public function types()
	{
	    return $this->belongsToMany(Type::class, 'types_brands', 'type_id', 'brand_id');
	}
}
