<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use  App\Http\Requests\CityRequest;
use App\Http\Controllers\Controller;
use App\City;


class CityController extends Controller
{

    public function index()
    {
        $datas = City::orderBy('id','asc')->paginate(10);
        return view('backend.city.index',compact('datas'));
    }


    public function create()
    {
         return view('backend.city.create');
    }


    public function store(CityRequest $request)
    {
        // dd('hello');
        $data = new City();
        $data->name = $request->city;
        $data->save();

        return redirect('admin/city')->with('status','City added successfully!');
    }




    public function edit($id)
    {
        $data = City::findOrFail($id);
        return view('backend.city.edit',compact('data'));
    }


    public function update(CityRequest $request, $id)
    {
        $data = new City();
        $data->name = $request->name;
        $data->save();
        return redirect('admin/city')->with('status','City edited successfully!');
    }


    public function destroy($id)
    {
        //
    }
}
