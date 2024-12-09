<?php

namespace App\Http\Controllers\Student;

use App\Models\Criteria\Category;
use Illuminate\Http\Request;

class PageController
{
    public function dashboard(Request $request)
    {
        return view('student.dashboard', [
            'user' => $request->user()
        ]);
    }

    public function article(Request $request)
    {
        $user = $request->user();
        $criteria = Category::where('code', 'article')->first()->criterias;
        $data = $user->articles()->get();

        return view('student.article', compact('user', 'criteria', 'data'));
    }
}