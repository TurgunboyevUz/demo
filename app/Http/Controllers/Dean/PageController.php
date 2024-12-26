<?php

namespace App\Http\Controllers\Dean;

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
        $department = $user->employee->department('dean');

        $male_students = Student::whereHas('user', function ($query) {
            $query->where('gender_id', 1);
        })->count();

        $female_students = Student::whereHas('user', function ($query) {
            $query->where('gender_id', 2);
        })->count();

        $file_male_students = DistinguishedScholarship::whereHas('user_id', function ($query) {
            $query->where('gender_id', 1);
        })->count();

        $file_female_students = DistinguishedScholarship::whereHas('user_id', function ($query) {
            $query->where('gender_id', 2);
        })->count();

        $counts = [
            'students' => [
                'male' => $male_students,
                'female' => $female_students,
            ],

            'file' => [
                'male' => $file_male_students,
                'female' => $file_female_students,
            ],
        ];

        return view('dean.dashboard', compact('user', 'department', 'counts'));
    }

    public function attach_student(Request $request)
    {
        $user = $request->user();
        $students = Student::all();
        $employee = Employee::all();

        return view('dean.attach-student', compact('user', 'students', 'employee'));
    }

    public function distinguished_scholarship(Request $request)
    {
        $user = $request->user();
        $data = File::selectRaw('
        ANY_VALUE(id) as id,
        fileable_id,
        ANY_VALUE(name) as name,
        ANY_VALUE(path) as path,
        ANY_VALUE(type) as type,
        ANY_VALUE(status) as status,
        MAX(id) as max_id,
        ANY_VALUE(uploaded_by) as uploaded_by')
            ->where('fileable_type', DistinguishedScholarship::class)
            ->groupBy('fileable_id')
            ->get();

        return view('dean.distinguished-scholarship', compact('user', 'data'));
    }

    public function edit_profile(Request $request)
    {
        $user = $request->user();

        return view('dean.edit-profile', compact('user'));
    }
}
