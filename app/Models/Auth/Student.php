<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function nation()
    {
        return $this->belongsTo(Nation::class);
    }
}
