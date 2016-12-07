<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Subcategories;
use App\Repositories\Genders;
use App\Http\Requests\SubcategoryRequest;
class SubcategoryController extends Controller
{
	protected $subcategories;
	protected $genders;

    function __construct(Subcategories $subcategories,Genders $genders)
    {
    	$this->subcategories = $subcategories;
    	$this->genders = $genders;
    }
	public function edit($id)
	{
		$subcategory = $this->subcategories->findOrFail($id);
		return view('admin.gender.category.subcategory.edit',compact('subcategory'));
	}

    public function store(SubcategoryRequest $request){
		$this->subcategories->save($request->all());
    	return redirect()->back()->with('message','Subcategoria agregada satisfactoriamente');
    }
    public function update(SubcategoryRequest $request,$id)
    {
		if (!$this->subcategories->update($id,$request->all())) {
    		return redirect()->back()->with('message','Subcategoria no pudo ser acatualizado con exito');
    	}
    	return redirect('admin/categories/'.$request->category_id)->with('message','Subcategoria actualizada con exito');
    }
    public function destroy($id)
	{
		if (!$this->subcategories->remove($id)) {
	    	return redirect()->back()->with('message','La categoria no pudo ser borrado');
    	}
    	return redirect()->back()->with('message','Categoria borrada con exito');
	}
	public function showPublic(Request $request,$id)
	{
		$subcategory = $this->subcategories->find($id);
		if ($request->has('filter')) {
			if ($request->filter == 'down')
				$products = $subcategory->products->sortBy('price');
			else
				$products = $subcategory->products->sortByDesc('price');
		}else{
				$products = $subcategory->products;
		}
		$genders = $this->genders->getAllFull();
		$title = $subcategory->name." - ".$subcategory->category->name." - ".$subcategory->category->gender->name;
		$category = $subcategory;
		$route = 'subcategory/'.$id;
		return view('web.products',compact('route','category','products','genders','title'));
	}

}
