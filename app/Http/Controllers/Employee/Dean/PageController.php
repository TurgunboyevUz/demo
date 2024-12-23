<?php

namespace App\Http\Controllers\Employee\Dean;

use App\Http\Controllers\Controller;
use App\Models\Auth\Employee;
use App\Models\Auth\Student;
use App\Models\File\DistinguishedScholarship;
use App\Models\File\File;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = $request->user();
        $department = $user->employee->department('teacher');

        return view('employee.dean.dashboard', compact('user', 'department'));
    }

    public function attach_student(Request $request)
    {
        $user = $request->user();
        $students = Student::all();
        $employee = Employee::all();

        return view('employee.dean.attach-student', compact('user', 'students', 'employee'));
    }

    public function distinguished_scholarship(Request $request)
    {
        $user = $request->user();
        $data = File::selectRaw('ANY_VALUE(id) as id, fileable_id, ANY_VALUE(name) as name, ANY_VALUE(path) as path, ANY_VALUE(type) as type, ANY_VALUE(status) as status, MAX(id) as max_id')
            ->where('fileable_type', DistinguishedScholarship::class)
            ->groupBy('fileable_id')
            ->get();

        return view('employee.dean.distinguished-scholarship', compact('user', 'data'));
    }
}
