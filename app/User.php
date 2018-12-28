<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','country_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->using('App\UserRole');
    }

    public function authorizeRoles($roles)
    {
        return $this->hasRole($roles) || abort(401, 'This action is unauthorized.');
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->whereIn('name', $role)->first();
    }

    public function countries(){
        return $this->belongsTo('App\Countries');
    }

    public function posts(){
        return $this->hasManyThrough(
            'App\Post',
            'App\User',
            'country_id', // Foreign key on users table...
            'user_id', // Foreign key on posts table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        )->with('comments');
    }

    public function country(){
        return $this->hasOne('App\Countries', 'id', 'country_id')->with('user')->with('posts');
    }

    public function videos(){
        return $this->hasMany('App\Videos', 'user_id', 'id')->with('comments');
    }

    public function category(){
        return $this->hasMany(Category::class, 'user_id', 'id')->with('product');
}

}
