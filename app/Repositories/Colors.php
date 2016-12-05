<?php
namespace App\Repositories;
use App\Color as Model;
use Illuminate\Http\Request;

class Colors extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}
}
?>

