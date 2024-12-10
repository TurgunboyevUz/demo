<?php

namespace App\Models\File;

use App\Models\User;
use App\Traits\Fileable;
use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    use Fileable;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team_members()
    {
        if($this->participant == 'team') {
            return $this->team_members;
        }else{
            return $this->user->fio();
        }
    }
}
