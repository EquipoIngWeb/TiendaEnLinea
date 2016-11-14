<?php

namespace App\Repositories;

abstract class BaseRepository
{
	abstract function getModel();

	public function getAll(){
		return $this->getModel()->all();
	}

	public function paginate($total=15){
		return $this->getModel()->paginate($total);
	}

	public function findOrFail($id){
		return $this->getModel()->findOrFail($id);
	}

	public function find($id){
		return $this->getModel()->find($id);
	}

	public function count(){
		return $this->getModel()->all()->count();
	}

	public function searchFor($field,$value){
		return $this->getModel()->where($field, 'LIKE', '%'.$value.'%');
	}

	public function save(Array $data){
		return $this->getModel()->create($data);
	}

	public function update($id,Array $datos){
		 $model = $this->findOrFail($id);
		 $model->fill($datos);
		 $model->save();
		 return $model;
	}

	public function remove($id){
		$model = $this->findOrFail($id);
		$model->delete();
		return $model ;
	}
}