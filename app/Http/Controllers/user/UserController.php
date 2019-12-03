<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('backend.user.personalprofile.show',compact('data'));
    }

    public function edit($id)
    {
        $datas = User::all();
        $data = User::findOrFail($id);
        return view('backend.user.personalprofile.edit',compact('data','datas'));
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;



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
            return redirect("user/personalaccount/$data->id/show")->with('status','User updated successfully!');
        }
        return redirect("user/personalaccount/$data->id/edit")->with('status','Old password do not match!!');
    }
}
