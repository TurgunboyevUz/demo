<?php

namespace App\Http\Controllers\Dean;

use App\Enums\StructureType;
use App\Http\Controllers\Controller;
use App\Models\File\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function faculty(Request $request)
    {
        $user = $request->user();
        $faculty = $user->employee->department('teacher', StructureType::FACULTY);
        $employees = File::select('teacher_id', DB::raw('SUM(teacher_score) as total_teacher_score'))
            ->where('teacher_id', '!=', null)
            ->groupBy('teacher_id')
            ->orderBy('total_teacher_score', 'desc')
            ->get();

        $arr = [];
        foreach ($employees as $employee) {
            $user = $employee->teacher;

            $department = $user->employee->department('teacher', StructureType::DEPARTMENT);
            $current_faculty = $user->employee->department('teacher', StructureType::FACULTY);

            if ($current_faculty?->id != $faculty?->id) {
                continue;
            }

            $arr[] = [
                'fio' => $user->short_fio(),
                'department' => $department->name,
                'staff_position' => $department->pivot->staff_position,
                'student_count' => $user->employee->students->count(),
                'total_score' => $employee->total_teacher_score,
            ];
        }

        $employees = $arr;

        return view('dean.rating.faculty', compact('user', 'employees'));
    }

    public function institute(Request $request)
    {
        $user = $request->user();
        $employees = File::select('teacher_id', DB::raw('SUM(teacher_score) as total_teacher_score'))
            ->where('teacher_id', '!=', null)
            ->groupBy('teacher_id')
            ->orderBy('total_teacher_score', 'desc')
            ->get();

        $arr = [];
        foreach ($employees as $employee) {
            $user = $employee->teacher;

            $department = $user->employee->department('teacher', StructureType::DEPARTMENT);
            $faculty = $user->employee->department('teacher', StructureType::FACULTY);

            $arr[] = [
                'fio' => $user->short_fio(),
                'faculty' => $faculty->name ?? 'Tanlanmagan',
                'department' => $department->name,
                'staff_position' => $department->pivot->staff_position,
                'student_count' => $user->employee->students->count(),
                'total_score' => $employee->total_teacher_score,
            ];
        }

        $employees = $arr;

        return view('dean.rating.institute', compact('user', 'employees'));
    }

    public function general_faculty(Request $request)
    {
        $user = $request->user();
        $department = $user->employee->department('dean', StructureType::FACULTY);
        $students = File::select('uploaded_by', DB::raw('SUM(student_score) as total_student_score'))
            ->groupBy('uploaded_by')
            ->orderBy('total_student_score', 'desc')
            ->get();

        $arr = [];

        foreach ($students as $student) {
            if ($student->user->student->faculty->code != $department->code) {
                continue;
            }

            $data = $student->user;

            $arr[] = [
                'fio' => $data->short_fio(),
                'level' => $data->student->level,
                'teacher' => $data->student->employee->user->short_fio(),
                'specialty' => $data->student->direction->name,
                'total_score' => $student->total_student_score,
            ];
        }

        $students = $arr;

        return view('dean.rating.general-faculty', compact('user', 'students'));
    }

    public function general_institute(Request $request)
    {
        $user = $request->user();

        $students = File::select('uploaded_by', DB::raw('SUM(student_score) as total_student_score'))
            ->groupBy('uploaded_by')
            ->orderBy('total_student_score', 'desc')
            ->get();

        $arr = [];

        foreach ($students as $student) {
            $data = $student->user;

            $arr[] = [
                'fio' => $data->short_fio(),
                'level' => $data->student->level,
                'teacher' => $data->student->employee->user->short_fio(),
                'faculty' => $data->student->faculty->name,
                'specialty' => $data->student->direction->name,
                'total_score' => $student->total_student_score,
            ];
        }

        $students = $arr;

        return view('dean.rating.general-institute', compact('user', 'students'));
    }
}
