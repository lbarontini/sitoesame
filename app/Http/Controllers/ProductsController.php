<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    function show()
    {
        return view('products',['products'=>Product::latest()->get()]);
    }
    function add()
    {
        return view('addproduct');
    }
}
