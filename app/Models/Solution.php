<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    public function malfunctions()
    {
        return $this->belongsToMany(Malfunction::class);
    }
}
