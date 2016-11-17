<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
		'id', 'name','price','brand_id'
	];
	public function categories()
	{
	    return $this->belongsToMany('App\Category', 'products_categories', 'product_id', 'category_id')->withPivot('category_id');
	}
	/**
	 * Product belongs to Brand.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function brand()
	{
		// belongsTo(RelatedModel, foreignKey = brand_id, keyOnRelatedModel = id)
		return $this->belongsTo(Brand::class);
	}
	public function getImageAttribute()
	{
		return 'http://simpledeveloper.com/wp-content/uploads/2014/08/how-to-use-laravel-model.jpg';
	}
}
