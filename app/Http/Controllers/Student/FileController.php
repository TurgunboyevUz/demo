<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function article()
    {
        return view('student.article');
    }
}