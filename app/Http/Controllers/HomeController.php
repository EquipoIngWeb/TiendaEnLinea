<?php

namespace App\Http\Controllers;

use App\Repositories\Products;
use App\Repositories\Banners;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $products,$banners;
    function __construct(Products $products,Banners $banners)
    {
        $this->products = $products;
        $this->banners = $banners;
    }

    public function index()
    {
        $products = $this->products->paginate();
        $banners = $this->banners->getAll();
        return view('main',compact('products','banners'));
    }
}
