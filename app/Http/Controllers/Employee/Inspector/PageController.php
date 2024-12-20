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
        $department = $user->employee->department('inspeksiya');

        return view('employee.inspeksiya.dashboard', compact('user', 'department'));
    }

    public function article(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Article::class)
            ->orderByRaw("FIELD(status, 'reviewed', 'pending', 'approved', 'rejected')")
            ->get();

        return view('employee.inspeksiya.article', compact('user', 'files'));
    }

    public function scholarship(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Scholarship::class)
            ->orderByRaw("FIELD(status, 'reviewed', 'pending', 'approved', 'rejected')")
            ->get();

        return view('employee.inspeksiya.scholarship', compact('user', 'files'));
    }

    public function invention(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Invention::class)
            ->orderByRaw("FIELD(status, 'reviewed', 'pending', 'approved', 'rejected')")
            ->get();

        return view('employee.inspeksiya.invention', compact('user', 'files'));
    }

    public function startup(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Startup::class)
            ->orderByRaw("FIELD(status, 'reviewed', 'pending', 'approved', 'rejected')")
            ->get();

        return view('employee.inspeksiya.startup', compact('user', 'files'));
    }

    public function grand_economy(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', GrandEconomy::class)
            ->orderByRaw("FIELD(status, 'reviewed', 'pending', 'approved', 'rejected')")
            ->get();

        return view('employee.inspeksiya.grand-economy', compact('user', 'files'));
    }

    public function olympics(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Olympic::class)
            ->orderByRaw("FIELD(status, 'reviewed', 'pending', 'approved', 'rejected')")
            ->get();

        return view('employee.inspeksiya.olympics', compact('user', 'files'));
    }

    public function lang_certificate(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', LangCertificate::class)
            ->orderByRaw("FIELD(status, 'reviewed', 'pending', 'approved', 'rejected')")
            ->get();

        return view('employee.inspeksiya.lang-certificate', compact('user', 'files'));
    }

    public function achievement(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Achievement::class)
            ->orderByRaw("FIELD(status, 'reviewed', 'pending', 'approved', 'rejected')")
            ->get();

        return view('employee.inspeksiya.achievement', compact('user', 'files'));
    }

    public function chat(Request $request)
    {
        $user = $request->user();

        return view('employee.inspeksiya.chat', compact('user'));
    }

    public function student_list(Request $request)
    {
        $user = $request->user();
        $students = $user->employee->students()->get();

        return view('employee.inspeksiya.student-list', compact('user', 'students'));
    }

    public function create_task(Request $request)
    {
        $user = $request->user();
        $students = $user->employee->students()->get();

        return view('employee.inspeksiya.create-task', compact('user', 'students'));
    }

    public function edit_profile(Request $request)
    {
        $user = $request->user();

        return view('employee.inspeksiya.edit-profile', compact('user'));
    }
}
