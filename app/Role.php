<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class)->using('App\UserRole');
    }

    public function getUsersFromRole($role){
        $role = $this->with('users')->whereIn('name', $role)->first()->toArray();
        return $role;
    }
}
