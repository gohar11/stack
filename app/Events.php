<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewtable')->whereNull('parent_id');
    }
}
