<?php

namespace App\Models\File;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'uuid',
        'name',
        'path',
        'mime_type',
        'size',
        'uploaded_by',
        'type',
        'status' //pending, reviewed, approved, declined etc..
    ];

    public function fileable()
    {
        return $this->morphTo();
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    //approve
    public function inspector()
    {
        return $this->belongsTo(User::class, 'inspector_id');
    }
}
