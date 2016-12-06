<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FileCsvRequest;
use App\Repositories\Products;
use App\Repositories\Brands;
use App\Repositories\Colors;
use App\Repositories\Subcategories;
use App\Repositories\Categories;
use App\Repositories\Genders;
use App\Repositories\Images;
use Excel;

class FileCsvController extends Controller
{
	protected $products;
	protected $brands;
	protected $colors;
	protected $subcategories;
	protected $categories;
	protected $genders;
	protected $images;

    function __construct(Products $products,
                         Brands $brands,
					    Colors $colors,
					    Subcategories $subcategories,
					    Categories $categories,
					    Genders $genders,
					    Images $images
					    ){
    	$this->products= $products;
		$this->brands= $brands;
		$this->colors= $colors;
		$this->subcategories= $subcategories;
		$this->categories= $categories;
		$this->genders= $genders;
		$this->images= $images;
    }

    public function load(Request $request)
	{
		$products =collect([]);
		Excel::load($request->csv, function($reader) use ($products){
			foreach ($reader->get() as $article) {
				$products->push($article->toArray());
			}
		});
		$products_corrects =collect([]);
		$products_incorrects =collect([]);
		foreach ($products as $product) {
			$flat=true;
			$prd = ['name'=>$product['name'],'description'=>$product['description']];
			if ($brand = $this->brands->filterByName($product['brand_name'])){
				$prd = array_merge($prd,['brand_id' => $brand->id,'brand_name' => $brand->name]);
			}else{
				$flat = false;
			}
			if ($color = $this->colors->filterByName($product['color_name'])){
				$prd = array_merge($prd,['color_id' => $color->id,'color_name' => $color->name]);
			}else{
				$flat = false;
			}
			if ($gender = $this->genders->filterByName($product['gender_name'])) {
				$prd = array_merge($prd,['gender_id' => $gender->id,'gender_name' => $gender->name]);
				if ($category = $this->categories->filterByName($product['category_name'],$gender->id)) {
					$prd = array_merge($prd,['category_id' => $category->id,'category_name' => $category->name]);
					if ($subcategory = $this->subcategories->filterByName($product['subcategory_name'],$category->id)) {
						$prd = array_merge($prd,['subcategory_id' => $subcategory->id,'subcategory_name' => $subcategory->name]);
						if ($flat) {
							$products_corrects->push($prd);
							continue;
						}
					}
				}
			}
			$products_incorrects->push($prd);
		}
		$genders = $this->genders->getAllFull();
		$brands = $this->brands->getAll();
		$colors = $this->colors->getAll();
		return view('admin.article.csv.index',compact('products_corrects','products_incorrects','genders','brands','colors'));
    }
    public function store(Request $request)
	{
		foreach ($request->product as $product) {
			$p = $this->products->firstOrCreate(['name'=>$producto['name'],
				                                    'description'=>$producto['description'],
													'color_id'=>$producto['color_id'],
													'brand_id'=>$producto['brand_id'],
													'subcategory_id'=>$producto['subcategory_id']
													]);
			if (isset($product['image'])) {
				$this->images->firstOrCreate(['image'=>$product['image'],'product_id'=>$p->id]);
			}
		}
		$products_corrects =collect([]);
		$products_incorrects =collect([]);
		foreach ($request->product_v as $product) {
			$flat=true;
			$prd = ['name'=>$product['name'],'description'=>$product['description']];
			if (isset($product['brand_id']) && $brand = $this->brands->find($product['brand_id'])){
				$prd = array_merge($prd,['brand_id' => $brand->id,'brand_name' => $brand->name]);
			}else{
				$flat = false;
			}
			if (isset($product['color_id']) && $color = $this->colors->find($product['color_id'])){
				$prd = array_merge($prd,['color_id' => $color->id,'color_name' => $color->name]);
			}else{
				$flat = false;
			}
			if (isset($product['gender_id']) && $gender = $this->genders->find($product['gender_id'])) {
				$prd = array_merge($prd,['gender_id' => $gender->id,'gender_name' => $gender->name]);
				if (isset($product['category_id']) && $category = $this->categories->find($product['category_id'])) {
					$prd = array_merge($prd,['category_id' => $category->id,'category_name' => $category->name]);
					if (isset($product['subcategory_id']) && $subcategory = $this->subcategories->find($product['subcategory_id'])) {
						$prd = array_merge($prd,['subcategory_id' => $subcategory->id,'subcategory_name' => $subcategory->name]);
						if ($flat) {
								$p = $this->products->firstOrCreate(['name'=>$producto['name'],
								                                    'description'=>$producto['description'],
																	'color_id'=>$producto['color_id'],
																	'brand_id'=>$producto['brand_id'],
																	'subcategory_id'=>$producto['subcategory_id']
																	]);
								if (isset($product['image'])) {
									$this->images->firstOrCreate(['image'=>$product['image'],'product_id'=>$p->id]);
								}
							continue;
						}
					}
				}
			}
			$products_incorrects->push($prd);
		}
		if (!$products_incorrects->isEmpty()) {
			$genders = $this->genders->getAllFull();
			$brands = $this->brands->getAll();
			$colors = $this->colors->getAll();
			return view('admin.article.csv.index',compact('products_corrects','products_incorrects','genders','brands','colors'));
		}
		return redirect('admin/products')->with('message','Productos del archivo agregados correctament, ahora vallaa agregar existencia');
	}
    public function format()
    {
    	$brands = $this->brands->getAll();
    	$colors = $this->colors->getAll();
    	$subcategories = $this->subcategories->getAll();
    	$categories = $this->categories->getAll();
    	$genders = $this->genders->getAll();
    	$excel = \App::make('excel');
    	ob_end_clean();
		ob_start();
		 Excel::create('Format Products', function($excel) use ($brands,$colors,$subcategories,$categories,$genders) {
		  	$excel->sheet('Products', function ($sheet) use ($brands) {
		  		$sheet->setOrientation('landscape');
		  		$sheet->fromArray([['name','description','color_name','brand_name','gender_name','category_name','subcategory_name']], NULL,'A1',true,false);
		  	});
		  	$excel->sheet('Brands', function ($sheet) use ($brands) {
		  		$sheet->setOrientation('landscape');
		  		$sheet->fromArray($brands, NULL,'A1',true,true);
		  	});
		  	$excel->sheet('Colors', function($sheet) use ($colors) {
		  		$sheet->setOrientation('landscape');
		  		$sheet->fromArray($colors, NULL,'A1',true,true);
		  	});
		    $excel->sheet('Subcategories', function($sheet) use ($subcategories){
  			 $sheet->setOrientation('landscape');
  			 	 $sheet->fromArray($subcategories, NULL,'A1',true,true);
		    });
		    $excel->sheet('Categories', function($sheet) use ($categories){
  			 $sheet->setOrientation('landscape');
  			 	 $sheet->fromArray($categories, NULL,'A1',true,true);
		    });
		    $excel->sheet('Genders', function($sheet) use ($genders){
  			 $sheet->setOrientation('landscape');
  			 	 $sheet->fromArray($genders, NULL,'A1',true,true);
  			});
		})->download('xls');
    }
}
