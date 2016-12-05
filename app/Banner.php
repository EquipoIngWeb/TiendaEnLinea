<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
	'id', 'image','description'
	];
	public function setImageAttribute($image='')
	{
		if (filter_var($image, FILTER_VALIDATE_URL) || is_string($image)) {
			$this->attributes['image'] = $image;
			return;
		}
		$root='images/banners/';
		$name = $image->getClientOriginalName();
		\Storage::disk('local')->put($root.$name,  \File::get($image));
		$this->attributes['image'] = $root.$name;
	}
	public function getImageAttribute()
	{
		$image=$this->attributes['image'];
		if (filter_var($image, FILTER_VALIDATE_URL)) {
		    return $image;
		}
		return asset('storage/'.$image);
	}
}
