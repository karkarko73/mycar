<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\City;
use App\Product;

class SearchController extends Controller
{
    public function search()
    {
        $cities = City::all();
        $cats = Category::all();
        $products = Product::orderBy('name', 'asc')->get();
        return view('search', compact(['cities', 'cats', 'products']));
    }

    public function searchbyname(Request $request)
    {
        $name = $request->name;
        return redirect("user/showsinglebrand/$name");
        // dd($name);
    }

    public function findbrand(Request $request)
    {
        $cat = $request->category;
        $ecat = explode('.', $cat);

        $products = Product::where('category_id', $ecat[0])->paginate(9);
        $cities = City::all();
        $cats = Category::all();
        return view('backend.search.showbrand', compact(['products', 'cities', 'cats']));
    }

    public function findbrandid($id)
    {
        $cities = City::all();
        $cats = Category::all();
        $products = Product::where('category_id', $id)->paginate(9);
        return view('backend.search.showbrand', compact(['products', 'cities', 'cats']));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.search.showsinglebrand', compact('product'));
    }

    public function citybrand($id)
    {
        $city = City::findOrFail($id);
        $cities = City::all();
        $cats = Category::all();
        return view('backend.search.showcitybrand', compact(['city', 'cities', 'cats']));

        // foreach($city->products as $product){
        //     echo $product->name ."<br>";
        // }
    }
}
