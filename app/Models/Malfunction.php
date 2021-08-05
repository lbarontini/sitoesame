<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Malfunction extends Model
{
    protected $fillable =['name','description'];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function solutions()
    {
        return $this->belongsToMany(Solution::class);
    }
}
