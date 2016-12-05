<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Genders;
use App\Http\Requests\GenderRequest;

class GenderController extends Controller
{
	protected $genders;

    function __construct(Genders $genders){
    	$this->genders = $genders;
    }
    public function index(){
		$genders = $this->genders->getAll();
		return view('admin.gender.index',compact('genders'));
	}
	public function edit($id='')
	{
		$gender = $this->genders->findOrFail($id);
		return view('admin.gender.edit',compact('gender'));
	}
    public function showPublic(Request $request,$id=''){
		if ($request->has('filter')) {
			$category = $this->genders->filterBy($id,$request->filter);
		}else{
			$category = $this->genders->getWithProducts($id);
		}
		$products =collect([]);
		foreach ($category->categories as $cat) {
			foreach ($cat->products as $product) {
				$products->push($product);
			}
		}
		$genders = $this->genders->getAllFull();
		return view('web.products',compact('category','products','genders'));
    }
    public function show($id)
    {
	  $gender = $this->genders->getWithCategories($id);
       return view('admin.gender.show',compact('gender'));
	}
    public function store(GenderRequest $request){
    	$this->genders->save($request->all());
    	return redirect()->back()->with('message','Genero registrado con exito');
    }
    public function update(GenderRequest $request,$id){
    	if (!$this->genders->update($id,$request->all())) {
    		return redirect()->back()->with('message','Genero no pudo ser acatualizado con exito');
    	}
    	return redirect('admin/genders')->with('message','Genero actualizado con exito');

    }
    public function destroy($id){
    	if (!$this->genders->remove($id)) {
	    	return redirect()->back()->with('message','El genero no pudo ser borrado');
    	}
    	return redirect()->back()->with('message','Genero borrado con exito');
    }
}
