<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
