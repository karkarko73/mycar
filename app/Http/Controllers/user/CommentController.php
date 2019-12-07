<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Product;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->product_id = $request->product_id;
        $comment->body = $request->body;
        $product = Product::findOrFail($request->product_id);
        $product->comments()->save($comment);

        return back();

    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        // echo "comment user_id ". $comment->user_id ."<br>";
        // echo "product creator user_id ". $comment->product->user_id ."<br>";

        if(auth()->user()->id == $comment->user_id || auth()->user()->id == $comment->product->user_id )
        {
            $comment->delete();
            return back()->with('status','Comment deleted successfully!');
        }
            return back()->with('status','You cannot deleted!');
    }
}
