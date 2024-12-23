<?php

namespace App\Http\Controllers\Employee\Teacher;

use App\Facade\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\Teacher\StoreProfileRequest;
use App\Http\Requests\Employee\Teacher\StoreTaskRequest;

class FileController extends Controller
{
    public function create_task(StoreTaskRequest $request)
    {
        $user = $request->user();

        File::user($request)->task($request);

        return redirect()->route($request->route()->getName());
    }

    public function edit_profile(StoreProfileRequest $request)
    {
        $user = $request->user();
        $data = $request->validated();

        $user->employee->update([
            'faculty_id' => $data['faculty_id'],
        ]);

        $user->update([
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);

        return redirect()->route($request->route()->getName());
    }
}
