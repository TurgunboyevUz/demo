<?php

namespace App\Http\Controllers\Teacher;

use App\Enums\StructureType;
use App\Http\Controllers\Controller;
use App\Models\Auth\Department;
use App\Models\File\Achievement;
use App\Models\File\Article;
use App\Models\File\File;
use App\Models\File\GrandEconomy;
use App\Models\File\Invention;
use App\Models\File\LangCertificate;
use App\Models\File\Olympic;
use App\Models\File\Scholarship;
use App\Models\File\Startup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = $request->user();

        $faculty = $user->employee->department('teacher', StructureType::FACULTY);
        $department = $user->employee->department('teacher', StructureType::DEPARTMENT);

        $students = File::select('uploaded_by', DB::raw('SUM(student_score) as total_student_score'))
            ->where('teacher_id', $user->id)
            ->groupBy('uploaded_by')
            ->orderBy('total_student_score', 'desc')
            ->take(3)
            ->get();

        $employees = File::select('teacher_id', DB::raw('SUM(teacher_score) as total_teacher_score'))
            ->where('teacher_id', '!=', null)
            ->groupBy('teacher_id')
            ->orderBy('total_teacher_score', 'desc')
            ->get();

        $top3_att = [];

        foreach ($students as $student) {
            $top3_att[] = [
                'fio' => $student->user->short_fio(),
                'level' => $student->user->student->level,
                'direction' => $student->user->student->direction->name,

                'total_score' => $student->total_student_score,
                'picture_path' => $student->user->picture_path(),
            ];
        }

        $top3_dep = [];
        foreach ($employees as $employee) {
            $user = $employee->teacher;

            $dep = $user->employee->department('teacher', StructureType::DEPARTMENT);
            if ($dep->id != $department->id) {
                continue;
            }

            $top3_dep[] = [
                'fio' => $user->short_fio(),
                'specialty' => $user->employee->specialty->name,
                'staff_position' => $dep->pivot->staff_position,

                'total_score' => $employee->total_teacher_score,
                'picture_path' => $user->picture_path(),
            ];

            if (count($top3_dep) == 3) {break;}
        }

        $top3_fac = [];
        foreach ($employees as $employee) {
            $data = $employee->teacher;

            $department = $data->employee->department('teacher', StructureType::DEPARTMENT);
            $current_faculty = $data->employee->department('teacher', StructureType::FACULTY);
            if ($current_faculty?->id != $faculty?->id) {
                continue;
            }

            $top3_fac[] = [
                'fio' => $data->short_fio(),
                'specialty' => $data->employee->specialty->name,
                'staff_position' => $department->pivot->staff_position,
                
                'total_score' => $employee->total_teacher_score,
                'picture_path' => $data->picture_path(),
            ];

            if (count($top3_fac) == 3) {break;}
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

        $data = compact('top3_att', 'top3_dep', 'top3_fac', 'top3_ins');

        return view('teacher.dashboard', compact('user', 'faculty', 'department', 'data'));
    }

    public function article(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Article::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('teacher.article', compact('user', 'files'));
    }

    public function scholarship(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Scholarship::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('teacher.scholarship', compact('user', 'files'));
    }

    public function invention(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Invention::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('teacher.invention', compact('user', 'files'));
    }

    public function startup(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Startup::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('teacher.startup', compact('user', 'files'));
    }

    public function grand_economy(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', GrandEconomy::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('teacher.grand-economy', compact('user', 'files'));
    }

    public function olympics(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Olympic::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('teacher.olympics', compact('user', 'files'));
    }

    public function lang_certificate(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', LangCertificate::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('teacher.lang-certificate', compact('user', 'files'));
    }

    public function achievement(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Achievement::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('teacher.achievement', compact('user', 'files'));
    }

    public function chat(Request $request)
    {
        $user = $request->user();

        return view('teacher.chat', compact('user'));
    }

    public function student_list(Request $request)
    {
        $user = $request->user();
        $students = $user->employee->students()->get();

        return view('teacher.student-list', compact('user', 'students'));
    }

    public function task(Request $request)
    {
        $user = $request->user();
        $students = $user->employee->students()->get();

        $files = $user->employee->tasks;

        return view('teacher.tasks', compact('user', 'students', 'files'));
    }

    public function edit_profile(Request $request)
    {
        $user = $request->user();
        $current_faculty = $user->employee->department('teacher', StructureType::FACULTY);
        $faculties = Department::where('structure_code', StructureType::FACULTY)->get();

        return view('teacher.edit-profile', compact('user', 'current_faculty', 'faculties'));
    }
}
