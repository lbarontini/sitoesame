<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Malfunction extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function solutions()
    {
        return $this->belongsToMany(Solution::class);
    }
}
