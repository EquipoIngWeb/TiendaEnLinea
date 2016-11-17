<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Products;
use App\Repositories\Categories;
use App\Repositories\Brands;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
	protected $products;
	protected $categories;
	protected $brands;
	function __construct(Products $products,Categories $categories,Brands $brands)
	{
		$this->products = $products;
		$this->brands = $brands;
		$this->categories = $categories;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$categories = $this->categories->getFirsts();
		return view('admin.article.index',compact('categories'));
	}
	public function ofCategories($category='')
	{
		$category = $this->categories->getOfCategories($category);
		$categories=$category->children;
		return view('admin.article.index',compact('categories','category'));
	}

	public function ofCategory($category='')
	{

	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create($category)
	{
		$category = $this->categories->find($category);
		$brands = $this->brands->getAll();
		return view('admin.article.create',compact('category','brands'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$category = $this->categories->find($request->category);
		$product= $this->products->save($request->except('category'));
		$product->categories()->attach($category->id);
		\Storage::disk('local')->makeDirectory('images/categories/'.$category->id.'-'.$category->name.'/'.$product->id.'-'.$product->name);
		return redirect()->to($request->redirect)->with('message','Articulo registrado con exito');
	}
	public function csv(Request $request,$category='')
	{
		$category = $this->categories->find($category);
		$nombre = $request->csv->getClientOriginalName();
		Excel::load($request->csv, function($reader) use ($category){
			foreach ($reader->get() as $article) {
				$product = $this->products->save([
				                      'name' => $article->nombre,
				                      'price' => $article->precio,
				                      'brand_id' => $this->brands->getByName($article->marca)->id
				                      ]);
     			$product->categories()->attach($category->id);
				\Storage::disk('local')->makeDirectory('images/categories/'.$category->id.'-'.$category->name.'/'.$product->id.'-'.$product->name);
			}
		});
		return redirect()->back()->with('message','Articulos agregados correctamente');
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
		//
	}
}
