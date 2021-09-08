<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $fillable =['name','description','malfunction_id'];
    public function malfunction()
    {
        return $this->belongsTo(Malfunction::class);
    }
}
