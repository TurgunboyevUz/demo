<?php

namespace App\Http\Controllers\Employee\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = $request->user();

        return view('employee.teacher.dashboard', compact('user'));
    }
}