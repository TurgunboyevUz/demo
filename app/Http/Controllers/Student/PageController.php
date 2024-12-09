<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

class PageController
{
    public function dashboard(Request $request)
    {
        return view('student.dashboard', [
            'user' => $request->user()
        ]);
    }

    public function article()
    {
        return view('student.article');
    }
}