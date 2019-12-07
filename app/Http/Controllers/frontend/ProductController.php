<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{


    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(9);
        return view('frontend.product.index',compact('products'));
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.product.show',compact('product'));

    }


}
