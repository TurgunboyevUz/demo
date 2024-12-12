<?php

namespace App\Http\Controllers\Employee\Teacher;

use App\Facade\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\Teacher\StoreTaskRequest;

class FileController extends Controller
{
    public function create_task(StoreTaskRequest $request)
    {
        $user = $request->user();

        File::user($request)->task($request);

        return redirect()->route($request->route()->getName());
    }
}