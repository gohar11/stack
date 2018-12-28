<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductCategory;
class Product extends Model
{
    protected $table = 'product';
    public function category(){
        return $this->belongsToMany('App\Category')->using('App\CategoryProduct');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id')->with('category');
    }


}
