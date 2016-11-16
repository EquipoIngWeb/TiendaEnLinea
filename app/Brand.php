<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
class Brand extends Model
{
    protected $fillable = [
		'id', 'name','url','image'
	];
}
