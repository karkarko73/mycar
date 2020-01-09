<?php

namespace App\Http\Controllers\frontend;

use App\City;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{


    public function index()
    {
        $cities = City::all();
        $cats = Category::orderBy('name','asc')->get();
        $products = Product::orderBy('name', 'asc')->get();
        $idproducts = Product::orderBy('id','desc')->paginate(9);

        return view('frontend.product.index',compact(['idproducts','cities','cats','products']));
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.product.show',compact('product'));

    }


}
