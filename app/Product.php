<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\Score;
use App\Brand;
use App\Color;
use App\Subcateory;
use App\Specification;
class Product extends Model
{
	protected $fillable = [
	'id', 'name','price','color','brand_id','color_id','subcategory_id'
	];
	public function color()
	{
		return $this->belongsTo(Color::class);
	}

	public function subcateory()
	{
	// belongsTo(RelatedModel, foreignKey = subcateory_id, keyOnRelatedModel = id)
	return $this->belongsTo(Subcateory::class);
	}
	public function brand()
	{
		// belongsTo(RelatedModel, foreignKey = brand_id, keyOnRelatedModel = id)
		return $this->belongsTo(Brand::class);
	}
	// public function getImageAttribute()
	// {
	// 	$category=$this->categories()->first();
	// 	$images_array = \Storage::disk('local')->files('images/categories/'.$category->id.'-'.$category->name.'/'.$this->attributes['id'].'-'.$this->attributes['name']);
	// 	if (sizeof($images_array)==0) {
	// 		return asset('images/default.png');//'http://simpledeveloper.com/wp-content/uploads/2014/08/how-to-use-laravel-model.jpg';
	// 	}
	// 	foreach ($images_array as $image) {
	// 		if (strpos($image, 'default')) {
	// 			return asset($image);
	// 		}
	// 	}
	// 	return asset($images_array[0]);
	// }
	public function comments()
	{
		return $this->hasMany(Comment::class);
	}
	public function specifications()
	{
		return $this->hasMany(Specification::class);
	}
	public function scores()
	{
		return $this->hasMany(Score::class);
	}
}
