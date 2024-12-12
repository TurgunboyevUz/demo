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

        return view('employee.teacher.article', compact('user'));
    }

    public function assignments(Request $request)
    {
        $user = $request->user();

        return view('employee.teacher.assignments', compact('user'));
    }

    public function scholarship(Request $request)
    {
        $user = $request->user();

        return view('employee.teacher.scholarship', compact('user'));
    }

    public function invention(Request $request)
    {
        $user = $request->user();

        return view('employee.teacher.invention', compact('user'));
    }

    public function startup(Request $request)
    {
        $user = $request->user();

        return view('employee.teacher.startup', compact('user'));
    }

    public function grand_economy(Request $request)
    {
        $user = $request->user();

        return view('employee.teacher.grand-economy', compact('user'));
    }

    public function olympics(Request $request)
    {
        $user = $request->user();

        return view('employee.teacher.olympics', compact('user'));
    }

    public function lang_certificate(Request $request)
    {
        $user = $request->user();

        return view('employee.teacher.lang-certificate', compact('user'));
    }

    public function distinguished_scholarship(Request $request)
    {
        $user = $request->user();

        return view('employee.teacher.distinguished-scholarship', compact('user'));
    }

    public function achievement(Request $request)
    {
        $user = $request->user();

        return view('employee.teacher.achievement', compact('user'));
    }

    public function evaluation_criteria(Request $request)
    {
        $user = $request->user();

        return view('employee.teacher.evaluation-criteria', compact('user'));
    }

    public function chat(Request $request)
    {
        $user = $request->user();

        return view('employee.teacher.chat', compact('user'));
    }
}