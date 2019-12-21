<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wishlist;
use App\Product;

class WishlistController extends Controller
{
    public function add(Request $request, $id)
    {
        $data = new Wishlist();
        $results = Wishlist::where('user_id',auth()->user()->id)->get();
        $ary = [];

        foreach($results as $result){
            array_push($ary , $result->product_id);
        }

        // if(in_array($id,$ary)){
        //     return 'exit!';
        // }return 'not exit!';
        // die();

        if(in_array($id,$ary)){
            return redirect('user/product')->with('status','Product already added!!');
        }
        $data->user_id = auth()->user()->id;
        $data->product_id = $id;
        $data->save();
        // return redirect('user/product')->with('status','Product saved successfully!');
        return back()->with('status','Product saved successfully!');

    }

    public function showall()
    {
        $results = Wishlist::where('user_id',auth()->user()->id)->get();
        return view('backend.user.wishlist.wishlist',compact('results'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.user.wishlist.show',compact('product'));
    }

    public function destroy($id)
    {
        // dd($id);
        $product = Wishlist::where('product_id',$id);
        // dd($product);
        if($product){
            $product->delete();
            // return redirect('user/mywishlist')->with('status','Remove from product successfully!!');
            return back()->with('status','Remove from product successfully!!');
        }
        return redirect('user/mywishlist')->with('status','Products not found!!');
        return back()->with('status','Products not found!!');
    }
}
