<?php

namespace App\Http\Controllers;

use App\Repositories\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $products;
    function __construct(Products $products)
    {
        $this->products = $products;
    }

    public function index()
    {
        $products = $this->products->paginate();
        return view('main',compact('products'));
    }
}
