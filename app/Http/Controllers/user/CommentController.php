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
        $comment->body = $request->body;
        $comment->user_id = auth()->user()->id;
        $comment->product_id = $request->product_id;
        $product = Product::findOrFail($request->product_id);
        // dd($product->comments);
        $product->comments()->save($comment);

        return back();
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        dd($product->comments);
    }
}
