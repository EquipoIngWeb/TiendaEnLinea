<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Size;
use App\Discount;
use App\LineSale;
use App\Inventory;
class Specification extends Model
{
	protected $fillable = [
		'id', 'size_id','product_id','price'
	];
	public function product()
	{
		return $this->belongsTo(Product::class);
	}
	public function size()
	{
		return $this->belongsTo(Size::class);
	}
	public function discount()
	{
		return $this->belongsTo(Discount::class);
	}
	public function lineSales()
	{
		return $this->hasMany(LineSale::class);
	}
	public function inventory()
	{
		return $this->hasOne(Inventory::class);
	}
}

