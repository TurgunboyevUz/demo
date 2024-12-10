<?php

namespace App\Traits;

use App\Models\Criteria\Criteria;
use App\Models\File\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait Fileable
{
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
