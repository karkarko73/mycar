<?php

namespace App\Http\Controllers\user;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Product;
use App\City;

class ProductController extends Controller
{

    public function index()
    {

        $products = Product::orderBy('id','desc')->paginate(10);
        return view('backend.user.index',compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.user.show',compact('product'));
    }

    /////////////////////////  personal products //////////////////////////

    public function personalproducts()
    {
        $products = Product::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        return view('backend.user.personalproduct',compact('products'));
    }


    public function create()
    {
        $cities = City::all();
        $cats = Category::all();
        return view('backend.user.create',compact(['cities','cats']));
    }


    public function store(ProductRequest $request)
    {

        $data = new Product();

        $city = $request->city;
        $cdata = explode('.',$city);
        $cat = $request->category;
        $catdata = explode('.',$cat);
        // echo $data[0];

        $data->name = $request->name;
        $data->model_year = $request->model;
        $data->city_id = $cdata[0];
        $data->category_id = $catdata[0];
        $data->price = $request->price;
        $data->user_id = $request->user_id;
        $data->description = $request->description;


        if($request->hasFile('image')){
            $images = $request->file('image');
            $imgary = array();
            foreach($images as $image){
                $name = uniqid() .'.'. $image->getClientOriginalExtension();
                $path = public_path('/uploads/car_imgs/');
                $img = Image::make($image)->resize(500,300);
                $img->save($path.$name);
                array_push($imgary,$name);

            }
            $data->images = implode('|' , $imgary) ;
        }
        $data->save();

        return redirect('user/personalproducts')->with('status','Product create successfully!');
    }

    public function personalproductshow($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.user.personalproductshow',compact('product'));
    }

    public function edit($id)
    {
        $cities = City::all();
        $cats = Category::all();
        $product = Product::findOrFail($id);
        return view('backend.user.personalproductedit',compact(['product','cats','cities']));
    }


    public function update(Request $request, $id)
    {
        $data = Product::findOrFail($id);

        $city = $request->city;
        $cdata = explode('.',$city);
        $cat = $request->category;
        $catdata = explode('.',$cat);
        // echo $data[0];


        $data->name = $request->name;
        $data->model_year = $request->model;
        $data->city_id = $cdata[0];
        $data->category_id = $catdata[0];
        $data->price = $request->price;
        $data->user_id = $request->user_id;
        $data->description = $request->description;
        // dd($data->images);


        if($request->hasFile('image')){
            $images = $request->file('image');
            $imgary = array();

            // dd($imgary);
            foreach($images as $image){
                $name =  uniqid() .'.'. $image->getClientOriginalExtension();
                $path = public_path('/uploads/car_imgs/');
                $img = Image::make($image)->resize(500,300);
                $img->save($path.$name);
                array_push($imgary,$name);
            }
            $impimg = implode('|',$imgary);

            $result = $data->images .'|'. $impimg ;
            // dd($result);
            $data->images = $result;

        }
        $data->save();

        return redirect('user/personalproducts')->with('status','Product Updated successfully!');
    }


    public function destroy($id)
    {
        //
    }
}
