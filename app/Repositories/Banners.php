<?php
namespace App\Repositories;
use App\Banner as Model;
use Illuminate\Http\Request;

/*
	Marcas
*/

class Banners extends BaseRepository
{
	function __construct(Model $model)
	{
		$this->model = $model;
	}
}
