<?php

namespace App\Http\Controllers\Talent;

use App\Enums\StructureType;
use App\Http\Controllers\Controller;
use App\Models\Auth\Student;
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
                'picture_path' => asset('storage/' . $student->user->picture_path),
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
                'picture_path' => asset('storage/' . $user->picture_path),
            ];
        }

        $data = compact('top3_stu', 'top3_ins');

        return view('inspeksiya.dashboard', compact('user', 'department', 'data'));
    }

    public function article(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Article::class)
            ->orderByRaw("FIELD(status, 'reviewed', 'pending', 'approved', 'rejected')")
            ->get();

        return view('inspeksiya.article', compact('user', 'files'));
    }

    public function scholarship(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Scholarship::class)
            ->orderByRaw("FIELD(status, 'reviewed', 'pending', 'approved', 'rejected')")
            ->get();

        return view('inspeksiya.scholarship', compact('user', 'files'));
    }

    public function invention(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Invention::class)
            ->orderByRaw("FIELD(status, 'reviewed', 'pending', 'approved', 'rejected')")
            ->get();

        return view('inspeksiya.invention', compact('user', 'files'));
    }

    public function startup(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Startup::class)
            ->orderByRaw("FIELD(status, 'reviewed', 'pending', 'approved', 'rejected')")
            ->get();

        return view('inspeksiya.startup', compact('user', 'files'));
    }

    public function grand_economy(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', GrandEconomy::class)
            ->orderByRaw("FIELD(status, 'reviewed', 'pending', 'approved', 'rejected')")
            ->get();

        return view('inspeksiya.grand-economy', compact('user', 'files'));
    }

    public function olympics(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Olympic::class)
            ->orderByRaw("FIELD(status, 'reviewed', 'pending', 'approved', 'rejected')")
            ->get();

        return view('inspeksiya.olympics', compact('user', 'files'));
    }

    public function lang_certificate(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', LangCertificate::class)
            ->orderByRaw("FIELD(status, 'reviewed', 'pending', 'approved', 'rejected')")
            ->get();

        return view('inspeksiya.lang-certificate', compact('user', 'files'));
    }

    public function achievement(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Achievement::class)
            ->orderByRaw("FIELD(status, 'reviewed', 'pending', 'approved', 'rejected')")
            ->get();

        return view('inspeksiya.achievement', compact('user', 'files'));
    }

    public function chat(Request $request)
    {
        $user = $request->user();

        return view('inspeksiya.chat', compact('user'));
    }

    public function student_list(Request $request)
    {
        $user = $request->user();
        $students = Student::all();

        return view('inspeksiya.student-list', compact('user', 'students'));
    }

    public function edit_profile(Request $request)
    {
        $user = $request->user();

        return view('inspeksiya.edit-profile', compact('user'));
    }
}
