<?php
namespace App\Repositories;
use App\Comment as Model;
use Illuminate\Http\Request;

class Comments extends BaseRepository
{
	function __construct(Model $model){
		$this->model = $model;
	}
	# Obtener comentarios aprobados del producto.
	public function getAprovedOfProduct($product_id)
	{
		return $this->getModel()->where('status',1)->where('product_id',$product_id)->with('user')->get();
	}
	# Cargar los comentarios que aun no han sido aprobados.
	public function getSend()
	{
		return $this->getModel()->where('status',0)->with('user')->with('product')->get();
	}
}
