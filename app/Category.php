<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Category extends Model
{
    protected $table = 'category';
    public function product(){
        return $this->belongsToMany(Product::class)->using('App\CategoryProduct');
    }

    public function customProduct(){
        return $this->belongsToMany(Product::class)->using('App\CategoryProduct');
    }
}
