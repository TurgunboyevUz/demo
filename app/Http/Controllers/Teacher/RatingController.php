<?php

namespace App\Http\Controllers\Teacher;

use App\Enums\CriteriaEnum;
use App\Enums\StructureType;
use App\Http\Controllers\Controller;
use App\Models\File\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function attached_students(Request $request)
    {
        $user = $request->user();
        $students = File::select('uploaded_by', DB::raw('SUM(student_score) as total_student_score'))
            ->where('teacher_id', $user->id)
            ->groupBy('uploaded_by')
            ->orderBy('total_student_score', 'desc')
            ->get();

        $arr = [];

        foreach ($students as $student) {
            $arr[] = [
                'picture_path' => $student->user->picture_path,

                'fio' => $student->user->short_fio(),
                'level' => $student->user->student->level,
                'specialty' => $student->user->student->direction->name,

                'total_score' => $student->total_student_score,

                'articles' => [
                    'scopus' => $student->user->articles()->where('criteria_id', CriteriaEnum::ARTICLE_SCOPUS)->count(),
                    'local' => $student->user->articles()->where('criteria_id', CriteriaEnum::ARTICLE_LOCAL)->count(),
                    'global' => $student->user->articles()->where('criteria_id', CriteriaEnum::ARTICLE_GLOBAL)->count(),
                    'thesis' => $student->user->articles()->where('criteria_id', CriteriaEnum::ARTICLE_THESIS_GLOBAL)->count() + $student->user->articles()->where('criteria_id', CriteriaEnum::ARTICLE_THESIS_LOCAL)->count(),
                ],

                'scholarships' => [
                    'institute' => $student->user->scholarships()->where('criteria_id', CriteriaEnum::SCHOLARSHIP_INSTITUTE)->count(),
                    'region' => $student->user->scholarships()->where('criteria_id', CriteriaEnum::SCHOLARSHIP_REGION)->count(),
                    'republic' => $student->user->scholarships()->where('criteria_id', CriteriaEnum::SCHOLARSHIP_REPUBLIC)->count(),
                ],

                'inventions' => [
                    'invention' => $student->user->inventions()->where('criteria_id', CriteriaEnum::INVENTION_INV)->count(),
                    'dgu' => $student->user->inventions()->where('criteria_id', CriteriaEnum::INVENTION_DGU)->count(),
                    'model' => $student->user->inventions()->where('criteria_id', CriteriaEnum::INVENTION_MODEL)->count(),
                ],

                'startups' => [
                    'startup' => $student->user->startups()->where('criteria_id', CriteriaEnum::STARTUP_STARTUP)->count(),
                    'contest' => $student->user->startups()->where('criteria_id', CriteriaEnum::STARTUP_CONTEST)->count(),
                ],

                'grands' => [
                    'grand' => $student->user->grand_economies()->where('criteria_id', CriteriaEnum::GRAND)->count(),
                    'economy' => $student->user->grand_economies()->where('criteria_id', CriteriaEnum::ECONOMY)->count(),
                ],

                'olympics' => [
                    'institute' => $student->user->olympics()->where('criteria_id', CriteriaEnum::OLYMPIC_INSTITUTE)->count(),
                    'region' => $student->user->olympics()->where('criteria_id', CriteriaEnum::OLYMPIC_REGION)->count(),
                    'republic' => $student->user->olympics()->where('criteria_id', CriteriaEnum::OLYMPIC_REPUBLIC)->count(),
                ],

                'lang' => [
                    'ru' => $student->user->lang_certificates()->where('lang', 'ru')->count(),
                    'en' => $student->user->lang_certificates()->where('lang', 'en')->count(),
                    'de' => $student->user->lang_certificates()->where('lang', 'de')->count(),
                ],

                'achievements' => $student->user->achievements()->count(),
            ];
        }

        $students = $arr;

        return view('teacher.rating.attached-students', compact('user', 'students'));
    }

    public function department(Request $request)
    {
        $user = $request->user();
        $department = $user->employee->department('teacher', StructureType::DEPARTMENT);
        $employees = File::select('teacher_id', DB::raw('SUM(teacher_score) as total_teacher_score'))
            ->where('teacher_id', '!=', null)
            ->groupBy('teacher_id')
            ->orderBy('total_teacher_score', 'desc')
            ->get();

        $arr = [];
        foreach ($employees as $employee) {
            $user = $employee->teacher;

            $dep = $user->employee->department('teacher', StructureType::DEPARTMENT);
            if ($dep->id != $department->id) {
                continue;
            }

            $arr[] = [
                'fio' => $user->short_fio(),
                'staff_position' => $dep->pivot->staff_position,
                'student_count' => $user->employee->students->count(),
                'total_score' => $employee->total_teacher_score,
            ];
        }

        $employees = $arr;

        return view('teacher.rating.department', compact('user', 'employees'));
    }

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
            $data = $employee->teacher;

            $department = $data->employee->department('teacher', StructureType::DEPARTMENT);
            $current_faculty = $data->employee->department('teacher', StructureType::FACULTY);
            if ($current_faculty?->id != $faculty?->id) {
                continue;
            }

            $arr[] = [
                'fio' => $data->short_fio(),
                'department' => $department->name,
                'staff_position' => $department->pivot->staff_position,
                'student_count' => $data->employee->students->count(),
                'total_score' => $employee->total_teacher_score,
            ];
        }

        $employees = $arr;

        return view('teacher.rating.faculty', compact('user', 'employees'));
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

        return view('teacher.rating.institute', compact('user', 'employees'));
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

        return view('teacher.rating.general-institute', compact('user', 'students'));
    }
}
