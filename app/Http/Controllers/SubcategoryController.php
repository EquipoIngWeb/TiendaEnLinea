<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Subcategories;
use App\Repositories\Genders;
class SubcategoryController extends Controller
{
	protected $subcategories;
	protected $genders;

    function __construct(Subcategories $subcategories,Genders $genders)
    {
    	$this->subcategories = $subcategories;
    	$this->genders = $genders;
    }
	public function show(Request $request,$id)
	{
		if ($request->has('filter')) {
			$subcategory = $this->subcategories->filterBy($id,$request->filter);
		}else{
			$subcategory = $this->subcategories->findOrFail($id);
		}
		$products = $subcategory->products;
		$genders = $this->genders->getAllFull();
		$title = $subcategory->name." - ".$subcategory->category->name." - ".$subcategory->category->gender->name;
		$category=$subcategory;
		return view('web.products',compact('category','products','genders','title'));
	}

}
