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
        $products = Product::all();
        return view('search',compact(['cities','cats','products']));
    }

    public function find(Request $request)
    {
        $city = $request->city;
        $ecity = explode('.',$city);
        $cat = $request->category;
        $ecat = explode('.',$cat);
        $price = $request->price;
        $eprice = explode('-',$price);

        // echo $ecity[0] ."<br>";
        // echo $ecat[0]."<br>";
        // echo $request->model ."<br>";
        // echo $eprice[0]  ."<br>";

        die();
        $result = Product::query();

        if(!empty($ecity[0]))
        {
            $results = $result->where('city_id','like', '%'.$ecity[0].'%');
        }

        if(!empty($ecat[0]))
        {
            $results = $result->where('category_id','like', '%'.$ecat[0].'%');
        }

        if(!empty($request->model))
        {
            $results = $result->where('name','like', '%'.$request->model.'%');
        }

        if(!empty($request->price))
        {
            $results = $result->whereBetween('price',[$eprice[0],$eprice[1]]);
        }

        $results->get();
        dd($results);
    }
}
// https://stackoverflow.com/questions/43637848/laravel-and-php-best-multiple-search-method/43638023#43638023
// https://stackoverflow.com/questions/31975250/searching-between-two-numbersprices-in-laravel/31975292
