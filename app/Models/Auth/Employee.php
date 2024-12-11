<?php

namespace App\Models\Auth;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Employee extends Model
{
    protected $guarded = [];

    public function departments()
    {
        return $this->belongsToMany(Department::class)
            ->withPivot(['position', 'type', 'role_id'])
            ->withTimestamps();
    }

    public function department($role_code)
    {
        $role = Role::where('name', $role_code)->first();

        return $this->departments()->wherePivot('role_id', $role->id)->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nation()
    {
        return $this->belongsTo(Nation::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
