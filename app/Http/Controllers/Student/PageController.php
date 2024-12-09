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
        $criterias = Category::where('code', 'article')->first()->criterias;
        $data = [];

        return view('student.article', compact('user', 'criterias', 'data'));
    }

    public function scholarship(Request $request)
    {
        $user = $request->user();
        $criterias = Category::where('code', 'scholarship')->first()->criterias;
        $data = [];

        return view('student.scholarship', compact('user', 'criterias', 'data'));
    }
}