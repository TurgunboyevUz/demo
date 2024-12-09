<?php

namespace App\Models;

use App\Models\Auth\Employee;
use App\Models\Auth\Student;
use App\Models\File\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable;

    protected $guarded = [];

    public function full_name()
    {
        return $this->name . ' ' . $this->surname . ' ' . $this->patronymic;
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}