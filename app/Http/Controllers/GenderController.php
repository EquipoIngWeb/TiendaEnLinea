<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Genders;

class GenderController extends Controller
{
	protected $genders;

    function __construct(Genders $genders)
    {
    	$this->genders = $genders;
    }
    public function show(Request $request,$id='')
    {
		if ($request->has('filter')) {
			$category = $this->genders->filterBy($id,$request->filter);
		}else{
			$category = $this->genders->findOrFail($id);
		}
		$products = $category->products($id)->get();
		$genders = $this->genders->getAllFull();
		return view('web.products',compact('category','products','genders'));

    }
}
