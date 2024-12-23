<?php

namespace App\Http\Controllers\Employee\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Auth\Faculty;
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

class PageController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = $request->user();
        $department = $user->employee->department('teacher');

        return view('employee.teacher.dashboard', compact('user', 'department'));
    }

    public function article(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Article::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('employee.teacher.article', compact('user', 'files'));
    }

    public function scholarship(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Scholarship::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('employee.teacher.scholarship', compact('user', 'files'));
    }

    public function invention(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Invention::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('employee.teacher.invention', compact('user', 'files'));
    }

    public function startup(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Startup::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('employee.teacher.startup', compact('user', 'files'));
    }

    public function grand_economy(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', GrandEconomy::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('employee.teacher.grand-economy', compact('user', 'files'));
    }

    public function olympics(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Olympic::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('employee.teacher.olympics', compact('user', 'files'));
    }

    public function lang_certificate(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', LangCertificate::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('employee.teacher.lang-certificate', compact('user', 'files'));
    }

    public function achievement(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Achievement::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('employee.teacher.achievement', compact('user', 'files'));
    }

    public function chat(Request $request)
    {
        $user = $request->user();

        return view('employee.teacher.chat', compact('user'));
    }

    public function student_list(Request $request)
    {
        $user = $request->user();
        $students = $user->employee->students()->get();

        return view('employee.teacher.student-list', compact('user', 'students'));
    }

    public function create_task(Request $request)
    {
        $user = $request->user();
        $students = $user->employee->students()->get();

        return view('employee.teacher.create-task', compact('user', 'students'));
    }

    public function edit_profile(Request $request)
    {
        $user = $request->user();
        $faculties = Faculty::all();

        return view('employee.teacher.edit-profile', compact('user', 'faculties'));
    }
}
