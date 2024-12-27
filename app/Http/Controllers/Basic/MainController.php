<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use App\Models\File\File;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function welcome(Request $request)
    {
        return view('welcome');
    }

    public function download(Request $request)
    {
        $uuid = $request->query('uuid');
        $file = File::where('uuid', $uuid)->first();

        return response()->download(storage_path('app/public/' . $file->path), $file->name);
    }
}