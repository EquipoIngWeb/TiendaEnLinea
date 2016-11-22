<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\Specification;
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
		$category=$this->categories()->first();
		$images_array = \Storage::disk('local')->files('images/categories/'.$category->id.'-'.$category->name.'/'.$this->attributes['id'].'-'.$this->attributes['name']);
		if (sizeof($images_array)==0) {
			return asset('images/default.png');//'http://simpledeveloper.com/wp-content/uploads/2014/08/how-to-use-laravel-model.jpg';
		}
		foreach ($images_array as $image) {
			if (strpos($image, 'default')) {
				return asset($image);
			}
		}
		return asset($images_array[0]);
	}
	public function comments()
	{
		return $this->hasMany(Comment::class);
	}
	public function specifications()
	{
		return $this->hasMany(Specification::class);
	}
}
