<?php

namespace App\Http\Controllers\Student;

use App\Models\Criteria\Category;
use Illuminate\Http\Request;

class PageController
{
    public function dashboard(Request $request)
    {
        return view('student.dashboard', [
            'user' => $request->user(),
        ]);
    }

    public function article(Request $request)
    {
        $user = $request->user();
        $criterias = Category::where('code', 'article')->first()->criterias;
        $data = $user->articles()->get();

        return view('student.article', compact('user', 'criterias', 'data'));
    }

    public function scholarship(Request $request)
    {
        $user = $request->user();
        $criterias = Category::where('code', 'scholarship')->first()->criterias;
        $data = $user->scholarships()->get();

        return view('student.scholarship', compact('user', 'criterias', 'data'));
    }

    public function invention(Request $request)
    {
        $user = $request->user();
        $criterias = Category::where('code', 'invention')->first()->criterias;
        $data = $user->inventions()->get();

        return view('student.invention', compact('user', 'criterias', 'data'));
    }

    public function startup(Request $request)
    {
        $user = $request->user();
        $criterias = Category::where('code', 'startup')->first()->criterias;
        $data = $user->startups()->get();

        return view('student.startup', compact('user', 'criterias', 'data'));
    }

    public function grand_economy(Request $request)
    {
        $user = $request->user();
        $criterias = Category::where('code', 'grand-economy')->first()->criterias;
        $data = $user->grand_economies()->get();

        return view('student.grand-economy', compact('user', 'criterias', 'data'));
    }

    public function olympics(Request $request)
    {
        $user = $request->user();
        $criterias = Category::where('code', 'olympics')->first()->criterias;
        $data = $user->olympics()->get();

        return view('student.olympics', compact('user', 'criterias', 'data'));
    }

    public function lang_certificate(Request $request)
    {
        $user = $request->user();
        $criterias = Category::where('code', 'lang-certificate')->first()->criterias;
        $data = $user->lang_certificates()->get();

        return view('student.lang-certificate', compact('user', 'criterias', 'data'));
    }

    public function distinguished_scholarship(Request $request)
    {
        $user = $request->user();
        $data = $user->distinguished_scholarships()
            ->with(['files' => function ($query) {
                $query->whereIn('type', ['passport', 'rating_book', 'faculty_statement', 'department_recommendation']);
            }])
            ->get();

        return view('student.distinguished-scholarship', compact('user', 'data'));
    }

    public function achievement(Request $request)
    {
        $user = $request->user();
        $criterias = Category::where('code', 'achievement')->first()->criterias;
        $data = $user->achievements()->get();

        return view('student.achievement', compact('user', 'criterias', 'data'));
    }

    public function evaluation_criteria(Request $request)
    {
        $user = $request->user();
        $categories = Category::all();

        return view('student.evaluation-criteria', compact('user', 'categories'));
    }
}
