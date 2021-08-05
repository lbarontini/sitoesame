<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $fillable =['name','description'];
    public function malfunctions()
    {
        return $this->belongsToMany(Malfunction::class);
    }
}
