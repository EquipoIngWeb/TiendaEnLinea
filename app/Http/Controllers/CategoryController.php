<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Categories;
use App\Repositories\Genders;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
	protected $categories;
	protected $genders;
	function __construct(Categories $categories,Genders $genders)
	{
		$this->categories = $categories;
		$this->genders = $genders;
	}
	public function index()
	{
		$categories = $this->categories->getAll();
		return view('admin.category.index',compact('categories'));
	}
	public function add($id_first="")
	{
		$route="/";
		if ($id_first!="") {
			$route.=$id_first."/";
		}
		return view('admin.gender.category.add',compact('route'));
	}
	public function attach(Request $request,$id_first="")
	{
		$category = $this->categories->save($request->all());
		if ($id_first!="") {
			$category->parents()->attach($id_first);
		}
		return redirect('admin/categories')->with('message','Categoria agregada satistactoriamente');
	}

	public function create()
	{
		return view('admin.gender.category.create');
	}

	public function store(CategoryRequest $request)
	{
		$this->categories->save($request->all());
		return redirect()->back()->with('message','Categoria agregada satistactoriamente');
	}
	public function show($id='')
	{
		$category = $this->categories->findOrFail($id);
		return view('admin.gender.category.show',compact('category'));
	}
	public function showPublic(Request $request,$id)
	{
		$category = $this->categories->find($id);
		$products = $category->products;
		if ($request->has('filter')) {
			if ($request->filter == 'down')
				$products = $category->products->sortBy('price');
			else
				$products = $category->products->sortByDesc('price');
		}
		$genders = $this->genders->getAllFull();
		$title = $category->name." - ".$category->gender->name;
		$route = 'category/'.$id;
		return view('web.products',compact('route','title','category','products','genders'));
	}

	public function edit($id)
	{
		$category = $this->categories->findOrFail($id);
		return view('admin.gender.category.edit',compact('category'));
	}

	public function update(CategoryRequest $request, $id){
		if (!$this->categories->update($id,$request->all())) {
    		return redirect()->back()->with('message','La categoria no pudo ser acatualizado con exito');
    	}
    	return redirect('admin/genders/'.$request->gender_id)->with('message','Categoria actualizada con exito');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if (!$this->categories->remove($id)) {
	    	return redirect()->back()->with('message','La categoria no pudo ser borrado');
    	}
    	return redirect()->back()->with('message','Categoria borrada con exito');
	}
}
