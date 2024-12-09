<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    public function departments()
    {
        return $this->belongsToMany(Department::class)
            ->withPivot(['position', 'type'])
            ->withTimestamps();
    }

    public function nation()
    {
        $this->belongsTo(Nation::class);
    }

    public function students()
    {
        $this->hasMany(Student::class);
    }
}
