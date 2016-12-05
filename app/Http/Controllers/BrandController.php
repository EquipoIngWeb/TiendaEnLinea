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
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.brand.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
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

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		 $this->brands->remove($id);
		 return redirect('admin/brands')->with('message','Marca Eliminada!');
	}
}
