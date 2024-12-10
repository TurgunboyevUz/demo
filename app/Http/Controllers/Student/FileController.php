<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreArticleRequest;

class FileController extends Controller
{
    public function article(StoreArticleRequest $request)
    {
        $data = $request->validated();

        dd($data);

        return view('student.article');
    }
}