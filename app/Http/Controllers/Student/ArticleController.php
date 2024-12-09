<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        return view('student.article.index');
    }
}