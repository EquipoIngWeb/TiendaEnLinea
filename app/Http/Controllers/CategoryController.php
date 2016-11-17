<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Categories;


class CategoryController extends Controller
{
	protected $categories;
	function __construct(Categories $categories)
	{
		$this->categories = $categories;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$this->categories->updateMenu();
		$categories = $this->categories->getMenu();
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
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.category.create');
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->categories->save($request->all());
		return redirect('admin/categories')->with('message','Categoria agregada satistactoriamente');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		// return view('admin.category.create');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		return view('admin.category.create');
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
		//
	}
}
