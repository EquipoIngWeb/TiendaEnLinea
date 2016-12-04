<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\Score;
use App\Brand;
use App\Color;
use App\Subcateory;
use App\Image;
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
	public function images(){
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = product_id, localKey = id)
		return $this->hasMany(Image::class);
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
	public function getImageAttribute(){
		// if (sizeof($this->images()->get()) <= 0) {
			return asset('images/default.png');//'http://simpledeveloper.com/wp-content/uploads/2014/08/how-to-use-laravel-model.jpg';
		// }
		// return $this->images()->first()->name;
	}
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
