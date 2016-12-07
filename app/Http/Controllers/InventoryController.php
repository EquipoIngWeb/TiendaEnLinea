<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Specifications;
use App\Repositories\Inventories;
use App\Repositories\Products;
use App\Repositories\Sizes;
use App\Repositories\Colors;

class InventoryController extends Controller
{
	protected $products;
	protected $sizes;
	protected $colors;
	protected $inventories;
	protected $specifications;

	function __construct(Inventories $inventories,Products $products,Sizes $sizes,Colors $colors,Specifications $specifications)
	{
		$this->inventories = $inventories;
		$this->specifications = $specifications;
		$this->products = $products;
		$this->sizes = $sizes;
		$this->colors = $colors;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$inventories = $this->inventories->getAllWithProduct();
		$products = $this->products->getAll();
		$products_no_specifications = $this->products->getModel()->withCount('specifications')->get()->filter(function ($value, $key) {
		    return $value->specifications_count == 0;
		});
		$sizes = $this->sizes->getAll();
		$colors = $this->colors->getAll();
		return view('admin.inventory.index',compact('products_no_specifications','inventories','products','sizes','colors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$specification = $this->specifications->save($request->all());
		$inventory = [
					'specification_id'=>$specification->id,
					'amount'=> $request->amount
						];
		$inventory = $this->inventories->save($inventory);
		return redirect()->back()->with('message','Existencia agregada correctamente');
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
		$this->inventories->update($id,$request->all());
		return redirect('admin/inventories')->with('message','Existencia Actualizada correctamente!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$this->inventories->remove($id);
		return redirect()->back()->with('message','Existencia Borrada!');
	}
}
