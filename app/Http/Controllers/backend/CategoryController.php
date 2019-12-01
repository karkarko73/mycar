<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{


    public function index()
    {
        $datas = Category::orderBy('id','asc')->paginate(10);
        return view('backend.category.index',compact('datas'));
    }

    public function create()
    {
         return view('backend.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = new Category();
        $data->name = $request->name;
        $data->save();
        return redirect('admin/category')->with('status','Category add successfully!');
    }

    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view('backend.category.edit',compact('data'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $data = Category::findOrFail($id);
        $data->name = $request->name;
        $data->save();
        return redirect('admin/category')->with('status','Category edit successfully!');
    }
    public function destroy($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();
        return redirect('admin/category')->with('status','Category deleted successfully!');
    }
}
