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
        $files = File::where('fileable_type', DistinguishedScholarship::class)
            ->whereIn('type', ['passport', 'rating_book', 'faculty_statement', 'department_recommendation'])
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();
        
        $files = $files->groupBy('fileable_id');

        return view('dean.distinguished-scholarship', compact('user', 'files'));
    }

    public function edit_profile(Request $request)
    {
        $user = $request->user();

        return view('dean.edit-profile', compact('user'));
    }
}
