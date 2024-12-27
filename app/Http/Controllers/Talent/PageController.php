<?php

namespace App\Http\Controllers\Talent;

use App\Enums\StructureType;
use App\Http\Controllers\Controller;
use App\Models\Auth\Student;
use App\Models\File\DistinguishedScholarship;
use App\Models\File\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = $request->user();
        $department = $user->employee->department('inspeksiya');

        $students = File::select('uploaded_by', DB::raw('SUM(student_score) as total_student_score'))
            ->where('teacher_id', '!=', null)
            ->groupBy('uploaded_by')
            ->orderBy('total_student_score', 'desc')
            ->take(3)
            ->get();

        $employees = File::select('teacher_id', DB::raw('SUM(teacher_score) as total_teacher_score'))
            ->where('teacher_id', '!=', null)
            ->groupBy('teacher_id')
            ->orderBy('total_teacher_score', 'desc')
            ->take(3)
            ->get();

        $top3_stu = [];

        foreach ($students as $student) {
            $top3_stu[] = [
                'fio' => $student->user->short_fio(),
                'level' => $student->user->student->level,
                'direction' => $student->user->student->direction->name,

                'total_score' => $student->total_student_score,
                'picture_path' => $student->user->picture_path(),
            ];
        }

        $top3_ins = [];
        foreach ($employees as $employee) {
            $user = $employee->teacher;

            $department = $user->employee->department('teacher', StructureType::DEPARTMENT);
            $faculty = $user->employee->department('teacher', StructureType::FACULTY);

            $top3_ins[] = [
                'fio' => $user->short_fio(),
                'faculty' => $faculty->name ?? 'Tanlanmagan',
                'department' => $department->name,

                'total_score' => $employee->total_teacher_score,
                'picture_path' => $user->picture_path(),
            ];
        }

        $data = compact('top3_stu', 'top3_ins');

        return view('talent.dashboard', compact('user', 'department', 'data'));
    }

    public function distinguished_scholarship(Request $request)
    {
        $user = $request->user();

        $files = File::where('fileable_type', DistinguishedScholarship::class)
            ->whereIn('type', ['passport', 'rating_book', 'faculty_statement', 'department_recommendation'])
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();
        
        $files = $files->groupBy('fileable_id');

        return view('talent.distinguished-scholarship', compact('user', 'files'));
    }

    public function student_list(Request $request)
    {
        $user = $request->user();
        $students = Student::all();

        return view('talent.student-list', compact('user', 'students'));
    }

    public function edit_profile(Request $request)
    {
        $user = $request->user();

        return view('talent.edit-profile', compact('user'));
    }
}
