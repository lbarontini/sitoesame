<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =['model','description', 'installation_notes','use_notes','photo_path','user_id','malfunctions'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function malfunctions()
    {
        return $this->hasMany(Malfunction::class);
    }
}
