<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class principalController extends Controller
{
    public function index(){
        return view('principal');
    }

    public function inicio(){
        return view('inicio');
    }
}
