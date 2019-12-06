<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public function products()
    {
        // return $this->hasMany('App\products');
        return $this->hasMany('App\Product', 'id', 'product_id');
    }
}
