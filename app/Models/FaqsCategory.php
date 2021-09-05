<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqsCategory extends Model
{
    protected $fillable =['name'];
    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
}
