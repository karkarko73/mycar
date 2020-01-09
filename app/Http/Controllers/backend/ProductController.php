<?php

namespace App\Http\Controllers\backend;


use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Product;
use App\City;
use App\Category;
use App\Http\Requests\ProductEditRequest;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(9);
        return view('backend.admin.index',compact('products'));
    }


    public function create()
    {
        $cities = City::all();
        $cats = Category::all();
        // foreach($results as $result){
        //     var_dump($result->name) ;
        // }
        return view('backend.admin.create',compact('cities','cats'));
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
        $data->license = $request->license;
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
                $img = Image::make($image)->resize(600,350);
                $img->save($path.$name);
                array_push($imgary,$name);

            }
            $data->images = implode('|' , $imgary) ;
        }
        $data->save();

        return redirect('admin/post')->with('status','Product create successfully!');
    }

    public function show($id)
    {

        $product = Product::findOrFail($id);
        return view('backend.admin.show',compact('product'));
    }


    public function edit($id)
    {
        $cities = City::all();
        $cats = Category::all();
        $product = Product::findOrFail($id);
        // $data = $product->city->name;
        // dd($data);
        return view('backend.admin.edit',compact('product','cities','cats'));
    }


    public function update(ProductEditRequest $request, $id)
    {
        $data = Product::findOrFail($id);

        $city = $request->city;
        $cdata = explode('.',$city);
        $cat = $request->category;
        $catdata = explode('.',$cat);
        // echo $data[0];


        $data->name = $request->name;
        $data->model_year = $request->model;
        $data->license = $request->license;
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
                //
                $img = Image::make($image)->resize(500,300);
                // dd($img);
                $img->save($path.$name);
                array_push($imgary,$name);
            }
            $impimg = implode('|',$imgary);

            $result = $data->images .'|'. $impimg ;
            // dd($result);
            $data->images = $result;

        }
        $data->save();

        return redirect('admin/post')->with('status','Product Updated successfully!');
    }


    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        if($data){
            $path = public_path('/uploads/car_imgs/');
            $file = $data->images;

            foreach(explode('|',$file) as $result){
                // var_dump($result) ."<br>";
                // dd($path.$result);
                unlink($path.$result);
            }

            $data->delete();
        }
        return redirect('admin/post')->with('status','Post Deleted Successfully!');
    }

    // public function test(Request $request)
    // {
    //         $data = new Brand();
    //         $images = $request->file('image');
    //         $imgary = array();
    //         foreach($images as $image){
    //             $name = uniqid() .'.'. $image->getClientOriginalExtension();
    //             array_push($imgary,$name);
    //             $path = public_path('/uploads/car_imgs/');
    //             $image->move($path,$name);
    //         }
    //         $data->name = serialize($imgary);
    //         $data->save();
    // }
}
