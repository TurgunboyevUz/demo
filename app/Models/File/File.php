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

    public function user()
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

    public function achievement()
    {
        return $this->belongsTo(Achievement::class, 'fileable_id', 'id');
    }

    public function article()
    {
        return $this->belongsTo(Article::class, 'fileable_id', 'id');
    }

    public function distinguished_scholarship()
    {
        return $this->belongsTo(DistinguishedScholarship::class, 'fileable_id', 'id');
    }

    public function grand_economy()
    {
        return $this->belongsTo(GrandEconomy::class, 'fileable_id', 'id');
    }

    public function invention()
    {
        return $this->belongsTo(Invention::class, 'fileable_id', 'id');
    }

    public function lang_certificate()
    {
        return $this->belongsTo(LangCertificate::class, 'fileable_id', 'id');
    }

    public function olympic()
    {
        return $this->belongsTo(Olympic::class, 'fileable_id', 'id');
    }

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class, 'fileable_id', 'id');
    }

    public function startup()
    {
        return $this->belongsTo(Startup::class, 'fileable_id', 'id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'fileable_id', 'id');
    }
}