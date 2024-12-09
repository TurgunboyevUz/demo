<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $guarded = [];

    public function employee()
    {
        $this->belongsTo(Employee::class);
    }

    public function faculty()
    {
        $this->belongsTo(Faculty::class);
    }

    public function specialty()
    {
        $this->belongsTo(Specialty::class);
    }

    public function group()
    {
        $this->belongsTo(Group::class);
    }

    public function nation()
    {
        $this->belongsTo(Nation::class);
    }
}
