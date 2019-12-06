<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function city()
    {
        return $this->belongsTo(City::class)->withDefault();
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable')->whereNull('product_id');
    }


}
