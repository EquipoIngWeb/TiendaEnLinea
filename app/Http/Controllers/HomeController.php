<?php

namespace App\Http\Controllers;

use App\Repositories\Products;
use App\Repositories\Categories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $products,$categories;
    function __construct(Products $products,Categories $categories)
    {
        $this->products = $products;
        $this->categories = $categories;
    }

    public function index()
    {
        $products = $this->products->paginate();
        $categories = $this->categories->getAll();
        return view('main',compact('products'));
    }
}
