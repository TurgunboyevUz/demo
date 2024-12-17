<?php

namespace App\Models\File;

use App\Models\User;
use App\Traits\Fileable;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use Fileable;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team_members()
    {
        if ($this->participant == 'team') {
            return $this->team_members;
        } else {
            return $this->user->fio();
        }
    }

    public function type()
    {
        $arr = ['sport' => 'Sport', 'cultural' => "Ma'naviy-ma'rifiy ishlar"];

        return $arr[$this->type];
    }

    public function location()
    {
        $arr = ['tashkent' => 'Toshkent', 'andijan' => 'Andijon'];

        return $arr[$this->location];
    }

    public function document_type()
    {
        $arr = ['certificate' => 'Sertifikat', 'diploma' => 'Diplom'];

        return $arr[$this->document_type];
    }
}
