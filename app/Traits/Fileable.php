<?php

namespace App\Traits;

use App\Models\Criteria\Criteria;
use App\Models\File\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait Fileable
{
    public function user()
    {
        return $this->belongsTo(User::class, 'uploaded_by', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

    public function inspector()
    {
        return $this->belongsTo(User::class, 'inspector_id', 'id');
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }

    public function status()
    {
        $statuses = [
            'pending' => [
                'name' => 'Kutilmoqda',
                'color' => 'warning',
            ],
            'reviewed' => [
                'name' => 'Tasdiqlanmoqda',
                'color' => 'info',
            ],
            'approved' => [
                'name' => 'Tasdiqlandi',
                'color' => 'success',
            ],
            'rejected' => [
                'name' => 'Rad etildi',
                'color' => 'danger',
            ],
        ];

        return $statuses[$this->file->status];
    }

    public function upload_file(Request $request, $directory = null, $key = 'file')
    {
        $file = $request->file($key);
        $name = $file->getClientOriginalName();
        $mime = $file->getClientMimeType();

        $path = $file->store($directory, 'public');

        return $this->file()->create([
            'uuid' => (string) Str::uuid(),
            'name' => $name,
            'path' => $path,
            'mime_type' => $mime,
            'size' => $file->getSize(),
            'type' => $key,
            'uploaded_by' => $request->user()->id,
        ]);
    }
}
