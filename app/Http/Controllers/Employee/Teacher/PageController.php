<?php

namespace App\Http\Controllers\Employee\Teacher;

use App\Http\Controllers\Controller;
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

        $students = $user->employee->students()->get()->each(function (&$student) {
            $student->articles = $student->articles()
                ->with('files', function ($query) {
                    $query->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')");
                })
                ->get();
        });

        return view('employee.teacher.article', compact('user', 'students'));
    }

    public function assignments(Request $request)
    {
        $user = $request->user();

        return view('employee.teacher.assignments', compact('user'));
    }

    public function scholarship(Request $request)
    {
        $user = $request->user();

        $students = $user->employee->students()->get()->each(function (&$student) {
            $student->scholarships = $student->scholarships()
                ->with('files', function ($query) {
                    $query->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')");
                })
                ->get();
        });

        return view('employee.teacher.scholarship', compact('user'));
    }

    public function invention(Request $request)
    {
        $user = $request->user();

        $students = $user->employee->students()->get()->each(function (&$student) {
            $student->inventions = $student->inventions()
                ->with('files', function ($query) {
                    $query->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')");
                })
                ->get();
        });

        return view('employee.teacher.invention', compact('user', 'students'));
    }

    public function startup(Request $request)
    {
        $user = $request->user();

        $students = $user->employee->students()->get()->each(function (&$student) {
            $student->startups = $student->startups()
                ->with('files', function ($query) {
                    $query->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')");
                })
                ->get();
        });

        return view('employee.teacher.startup', compact('user', 'students'));
    }

    public function grand_economy(Request $request)
    {
        $user = $request->user();

        $students = $user->employee->students()->get()->each(function (&$student) {
            $student->grand_economies = $student->grand_economies()
                ->with('files', function ($query) {
                    $query->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')");
                })
                ->get();
        });

        return view('employee.teacher.grand-economy', compact('user', 'students'));
    }

    public function olympics(Request $request)
    {
        $user = $request->user();

        $students = $user->employee->students()->get()->each(function (&$student) {
            $student->olympics = $student->olympics()
                ->with('files', function ($query) {
                    $query->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')");
                })
                ->get();
        });

        return view('employee.teacher.olympics', compact('user', 'students'));
    }

    public function lang_certificate(Request $request)
    {
        $user = $request->user();

        $students = $user->employee->students()->get()->each(function (&$student) {
            $student->lang_certificates = $student->lang_certificates()
                ->with('files', function ($query) {
                    $query->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')");
                })
                ->get();
        });

        return view('employee.teacher.lang-certificate', compact('user', 'students'));
    }

    public function distinguished_scholarship(Request $request)
    {
        $user = $request->user();

        $students = $user->employee->students()->get()->each(function (&$student) {
            $student->distinguished_scholarships = $student->distinguished_scholarships()
                ->with('files', function ($query) {
                    $query->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')");
                })
                ->get();
        });

        return view('employee.teacher.distinguished-scholarship', compact('user', 'students'));
    }

    public function achievement(Request $request)
    {
        $user = $request->user();

        $students = $user->employee->students()->get()->each(function (&$student) {
            $student->achievements = $student->achievements()
                ->with('files', function ($query) {
                    $query->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')");
                })
                ->get();
        });

        return view('employee.teacher.achievement', compact('user', 'students'));
    }

    public function chat(Request $request)
    {
        $user = $request->user();

        return view('employee.teacher.chat', compact('user'));
    }
}