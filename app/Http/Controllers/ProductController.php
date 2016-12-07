<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Products;
use App\Cart;
use App\Repositories\Categories;
use App\Repositories\Subcategories;
use App\Repositories\Genders;
use App\Repositories\Brands;
use App\Repositories\Colors;
use App\Repositories\Images;
use App\Repositories\Comments;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller{
	protected $products;
	protected $genders;
	protected $categories;
	protected $subcategories;
	protected $brands;
	protected $colors;
	protected $images;
	protected $comments;
	protected $cart;
	function __construct(Products $products,
	                     Genders $genders,
	                     Categories $categories,
	                     Subcategories $subcategories,
	                     Colors $colors,
	                     Brands $brands,
	                     Images $images,
	                     Comments $comments
	                     )
	{
		$this->products = $products;
		$this->brands = $brands;
		$this->genders = $genders;
		$this->colors = $colors;
		$this->images = $images;
		$this->categories = $categories;
		$this->subcategories = $subcategories;
		$this->comments = $comments;
		$this->cart = new Cart($request);
	}
	public function showAll(Request $request)
	{
		if ($request->has('filter')) {
			$products = $this->products->filterBy($request->filter);
		}else{
			$products = $this->products->getAll();
		}
		$genders = $this->genders->getAllFull();
		$title = " Todos Los Productos";
		$route = "products";
		return view('web.products',compact('route','title','products','genders'));
	}
	public function index(Request $request)
	{
		if ($request->has('subcategory_id')) {
			$products = $this->products->filterBySubcategories($request->subcategory_id);
		}else{
			if ($request->has('category_id')) {
				$products = $this->products->filterByCategories($request->category_id);
			}else{
				if ($request->has('brand_id')) {
					$products = $this->products->filterByBrands($request->brand_id);
				}else{
					$products = $this->products->paginate(24);
				}
			}
		}
		$brands = $this->brands->getAll();
		$colors = $this->colors->getAll();
		$genders = $this->genders->getAllFull();
		return view('admin.article.index',compact('genders','products','brands','colors'));
	}
	public function ofCategories($category='')
	{
		$category = $this->categories->getOfCategories($category);
		$categories = $category->children;
		return view('admin.article.index',compact('categories','category'));
	}
	public function ofCategory($category='')
	{

	}

	public function create($category)
	{
		$category = $this->categories->find($category);
		$brands = $this->brands->getAll();
		return view('admin.article.create',compact('category','brands'));
	}

	public function store(ProductRequest $request)
	{
		$product = $this->products->save($request->all());
		if ($request->hasFile('image')) {
			$this->images->save(['image'=>$request->image,'product_id'=>$product->id]);
		}
		return redirect()->back()->with('message','Articulo registrado con exito');
	}

	public function showPublic($id)
	{
		$product = $this->products->findOrFail($id);
		$comments = $this->comments->getAprovedOfProduct($id);
		return view('product.show',compact('product','comments'));
	}

	public function edit($product)
	{
    	$brands = $this->brands->getAll();
		$colors = $this->colors->getAll();
		$genders = $this->genders->getAllFull();
    	$product = $this->products->findOrFail($product);
    	return view('admin.article.edit',compact('product','brands','colors','genders'));
	}

	public function update(Request $request, $id)
	{
		$product = $this->products->update($id,$request->all());
		$product =$this->products->find($id);
		if ($request->hasFile('image')) {
			if (!$image = $product->images->first()) {
				$this->images->save(['image'=>$request->image,'product_id'=>$id]);
			}else{
				$image->image = $request->image;
				$image->save();
			}
		}
		return redirect('admin/products')->with('message','Articulo actualizado con exito');
	}

	public function destroy($id)
	{
		$this->images->getModel()->where('product_id',$id)->delete();
		if ($this->products->remove($id)) {
			return redirect()->back()->with('message','Producto eliminado correctamente.');
		}
		return redirect()->back()->with('message','Producto no pudo ser eliminado.');
	}

	public function addToCart($id)
	{
		$product = $this->products->findOrFail($id);
		$this->cart->add($product);
		return redirect()->back()->with('message','Producto agregado a carrito.');
	}

	public function saveComment($id,Request $request)
	{
		$this->comments->save(
			array_merge(
				$request->all(),
				['user_id'=>Auth::user()->id,'product_id'=>$id]
			)
		);

		 return redirect()->back()->with('message','Mensaje agregado');
	}
}
