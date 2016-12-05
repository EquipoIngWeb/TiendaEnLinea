<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Categories;
use App\Repositories\Genders;


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
		return view('admin.category.add',compact('route'));
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
		return view('admin.category.create');
	}

	public function store(Request $request)
	{
		$this->categories->save($request->all());
		return redirect('admin/categories')->with('message','Categoria agregada satistactoriamente');
	}

	public function show(Request $request,$id)
	{
		if ($request->has('filter')) {
			$category = $this->categories->filterBy($id,$request->filter);
		}else{
			$category = $this->categories->findOrFail($id);
		}
		$products = $category->products;
		$genders = $this->genders->getAllFull();
		$title = $category->name." - ".$category->gender->name;
		return view('web.products',compact('title','category','products','genders'));
	}

	public function edit($id)
	{
		return view('admin.category.create');
	}

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
		//
	}
}
