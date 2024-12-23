<?php

namespace App\Http\Controllers\Employee\Dean;

use App\Http\Controllers\Controller;
use App\Models\Auth\Employee;
use App\Models\Auth\Student;
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
}
