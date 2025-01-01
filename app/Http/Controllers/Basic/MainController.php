<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use App\Models\File\File;
use Illuminate\Http\Request;
use ZipArchive;

class MainController extends Controller
{

    public function welcome(Request $request)
    {
        return view('welcome');
    }
}
