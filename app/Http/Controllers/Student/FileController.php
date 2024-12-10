<?php

namespace App\Http\Controllers\Student;

use App\Facade\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreArticleRequest;
use App\Http\Requests\Student\StoreInventionRequest;
use App\Http\Requests\Student\StoreScholarshipRequest;

class FileController extends Controller
{
    public function article(StoreArticleRequest $request)
    {
        File::user($request)->article($request);

        return redirect()->route($request->route()->getName());
    }

    public function scholarship(StoreScholarshipRequest $request)
    {
        File::user($request)->scholarship($request);

        return redirect()->route($request->route()->getName());
    }

    public function invention(StoreInventionRequest $request)
    {
        File::user($request)->invention($request);

        return redirect()->route($request->route()->getName());
    }
}