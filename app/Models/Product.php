<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function malfunctions()
    {
        return $this->belongsToMany(Malfunction::class);
    }
}
