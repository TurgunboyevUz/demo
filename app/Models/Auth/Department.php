<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    public function employees()
    {
        return $this->belongsToMany(Employee::class)
            ->withPivot(['staff_position', 'employee_type'])
            ->withTimestamps();
    }
}
