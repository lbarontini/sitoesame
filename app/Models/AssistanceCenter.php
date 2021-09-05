<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class AssistanceCenter extends Model
{
    protected $fillable =['name','address','description'];
    public function technicians()
    {
        return $this->hasMany(User::class);
    }
}
