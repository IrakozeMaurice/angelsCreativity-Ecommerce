<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function presentPrice()
    {
        return number_format($this->price);
    }

    public function slide()
    {
        return $this->hasOne(Slide::class);
    }
}
