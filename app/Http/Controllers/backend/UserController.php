<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::all();
        return view('backend.user.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = User::all();
        $data = User::findOrFail($id);
        return view('backend.user.edit',compact('data','datas'));
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->role = $request->role;



        if(Hash::check($request->old_password, $data->password)){
            if($request->hasFile('image')){
                $img = $request->file('image');
                $imgname = uniqid() . '.' .$img->getClientOriginalExtension();
                $path = public_path('/uploads/user_imgs/');
                $old_img = $path.$data->image;

                if($data->image){
                    unlink($old_img);
                }
                $img->move($path,$imgname);
                $data->image = $imgname;
            }


            if($request->new_password != null){
                $data->password = bcrypt($request->new_password);
            }

            $data->save();
            return redirect("admin/user/$id/edit")->with('status','User updated successfully!');
        }
        return redirect("admin/user/$id/edit")->with('status','Old password do not match!!');
    }


    public function destroy($id)
    {
        //
    }
}
