<?php

namespace App\Models\Criteria;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}