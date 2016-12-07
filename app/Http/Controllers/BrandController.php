<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Brands;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
	protected $brands;
	function __construct(Brands $brands)
	{
		$this->brands = $brands;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$brands = $this->brands->getAll();
		return view('admin.brand.index',compact('brands'));
	}
	public function store(Request $request)
	{
		$root='images/brands/';
		$name = $request->image->getClientOriginalName();
		$images_array = \Storage::disk('local')->files($root);
		foreach ($images_array as $image) {
			if (strpos($image, $name)) {
				return redirect()->back()->with('message','Ya hay una imagen con ese nombre!');
			}
		}
	    \Storage::disk('local')->put($root.$name,  \File::get($request->image));
		$data = $request->except('image');
		$data['image'] = $root.$name;
		$this->brands->save($data);
		return redirect('admin/brands')->with('message','Marca registrada con exito!');
	}

	public function edit($id)
	{
		$brand = $this->brands->findOrFail($id);
		return view('admin.brand.edit',compact('brand'));
	}

	public function update(Request $request, $id)
	{
		 if($this->brands->update($id,$request->all())){
		 	return redirect('admin/brands')->with('message','Marca Actualizada Correctamente!');
		 }
		 return redirect()->back()->with('message','La marca no pudo ser actualizada!');

	}

	public function destroy($id)
	{
		 if($this->brands->remove($id)){
		 	return redirect('admin/brands')->with('message','Marca Actualizada Correctamente!');
		 }
		 return redirect()->back()->with('message','La marca no pudo ser actualizada!');
	}
}
