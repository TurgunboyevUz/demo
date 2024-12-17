<?php

namespace App\Http\Controllers\Employee\Inspector;

use App\Http\Controllers\Controller;
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
        $department = $user->employee->department('inspector');

        return view('employee.inspector.dashboard', compact('user', 'department'));
    }

    public function article(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Article::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('employee.inspector.article', compact('user', 'files'));
    }

    public function scholarship(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Scholarship::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('employee.inspector.scholarship', compact('user', 'files'));
    }

    public function invention(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Invention::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('employee.inspector.invention', compact('user', 'files'));
    }

    public function startup(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Startup::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('employee.inspector.startup', compact('user', 'files'));
    }

    public function grand_economy(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', GrandEconomy::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('employee.inspector.grand-economy', compact('user', 'files'));
    }

    public function olympics(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Olympic::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('employee.inspector.olympics', compact('user', 'files'));
    }

    public function lang_certificate(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', LangCertificate::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('employee.inspector.lang-certificate', compact('user', 'files'));
    }

    public function achievement(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Achievement::class)
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('employee.inspector.achievement', compact('user', 'files'));
    }

    public function chat(Request $request)
    {
        $user = $request->user();

        return view('employee.inspector.chat', compact('user'));
    }

    public function student_list(Request $request)
    {
        $user = $request->user();
        $students = $user->employee->students()->get();

        return view('employee.inspector.student-list', compact('user', 'students'));
    }

    public function create_task(Request $request)
    {
        $user = $request->user();
        $students = $user->employee->students()->get();

        return view('employee.inspector.create-task', compact('user', 'students'));
    }
}
