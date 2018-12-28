<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Countries extends Model
{
    public function users(){
        return $this->hasMany('App\User', 'country_id', 'id')->with('posts');
    }
    static function usersWithPosts(){
        return Countries::with(['users'])->get();
    }
    public function posts()
    {
        return $this->hasManyThrough(
            'App\Post',
            'App\User',
            'country_id', // Foreign key on users table...
            'user_id', // Foreign key on posts table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        );
    }

    public function user(){
        return $this->belongsTo('App\User', 'id', 'id');
    }
}
