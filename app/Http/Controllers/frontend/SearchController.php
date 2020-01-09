<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\City;
use App\Product;

class SearchController extends Controller
{
    public function searchbyname(Request $request)
    {
        $name = $request->name;
        return redirect("showsinglebrand/$name");
        // dd($name);
    }

    public function findbrand(Request $request)
    {
        $cat = $request->category;
        $ecat = explode('.', $cat);

        $products = Product::where('category_id', $ecat[0])->paginate(9);
        $cities = City::all();
        $cats = Category::all();
        return view('frontend.search.showbrand', compact(['products', 'cities', 'cats']));
    }

    public function searchbyprice(Request $request)
    {
        $price = $request->price;
        $eprice = explode('.', $price);
        $products = Product::whereBetween('price', [$eprice[0], $eprice[1]])->paginate(9);
        $cities = City::all();
        $cats = Category::all();
        return view('frontend.search.showbyprice', compact(['products', 'cities', 'cats']));
    }

    public function findbrandid($id)
    {
        $cities = City::all();
        $cats = Category::all();
        $products = Product::where('category_id', $id)->paginate(9);
        return view('frontend.search.showbrand', compact(['products', 'cities', 'cats']));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.search.showsinglebrand', compact('product'));
    }

    public function citybrand($id)
    {
        $city = City::findOrFail($id);
        $cities = City::all();
        $cats = Category::all();
        return view('frontend.search.showcitybrand', compact(['city', 'cities', 'cats']));
    }
}
