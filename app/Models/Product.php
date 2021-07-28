<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =['model','description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function malfunctions()
    {
        return $this->belongsToMany(Malfunction::class);
    }
}
