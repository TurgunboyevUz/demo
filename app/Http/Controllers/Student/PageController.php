<?php

namespace App\Http\Controllers\Student;

use App\Models\Auth\Student;
use App\Models\Chat\Chat;
use App\Models\Criteria\Category;
use App\Models\Criteria\EducationYear;
use App\Models\File\DistinguishedScholarship;
use App\Models\File\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController
{
    public function dashboard(Request $request)
    {
        $user = $request->user();

        $group = $user->student->group->name;
        $faculty = $user->student->faculty->name;

        $group_id = $user->student->group_id;
        $faculty_id = $user->student->faculty_id;

        $groupmates = Student::with('user')->where('group_id', $group_id)->get();
        $facultymates = Student::with('user')->where('faculty_id', $faculty_id)->get();

        $groupmate_scores = $groupmates->map(function ($student) use ($group) {
            $total_score = File::select(DB::raw('SUM(student_score) as total_score'))->first();

            return [
                'fio' => $student->user->short_fio(),
                'group' => $group,
                'total_score' => $total_score->total_score,
                'picture_path' => $student->user->picture_path(),
            ];
        });

        $groupmate_top = $groupmate_scores->sortByDesc('total_score')->take(3)->toArray();

        $facultymate_top = File::select('uploaded_by', DB::raw('SUM(student_score) as total_score'))
            ->whereIn('uploaded_by', $facultymates->pluck('user_id'))
            ->groupBy('uploaded_by')
            ->orderBy('total_score', 'desc')
            ->take(3)
            ->get();

        $facultymate_top = $facultymate_top->map(function ($file) use ($faculty) {
            return [
                'fio' => $file->user->short_fio(),
                'level' => $file->user->student->level,
                'direction' => $file->user->student->direction->name,
                'total_score' => $file->total_score,
                'picture_path' => $file->user->picture_path(),
            ];
        });

        $institute_top = File::select('uploaded_by', DB::raw('SUM(student_score) as total_score'))
            ->groupBy('uploaded_by')
            ->orderBy('total_score', 'desc')
            ->take(3)
            ->get();

        $institute_top = $institute_top->map(function ($file) {
            return [
                'fio' => $file->user->short_fio(),
                'faculty' => $file->user->student->faculty->name,
                'direction' => $file->user->student->direction->name,
                'total_score' => $file->total_score,
                'picture_path' => $file->user->picture_path(),
            ];
        });

        return view('student.dashboard', compact('user', 'groupmate_scores', 'groupmate_top', 'facultymate_top', 'institute_top'));
    }

    public function assignments(Request $request)
    {
        $user = $request->user();
        $data = $user->student->tasks;

        return view('student.assignments', compact('user', 'data'));
    }

    public function article(Request $request)
    {
        $user = $request->user();
        $criterias = Category::where('code', 'article')->first()->criterias;
        $education_year = EducationYear::where('status', true)->get();
        $data = $user->articles;

        return view('student.article', compact('user', 'criterias', 'education_year', 'data'));
    }

    public function scholarship(Request $request)
    {
        $user = $request->user();
        $criterias = Category::where('code', 'scholarship')->first()->criterias;
        $data = $user->scholarships;

        return view('student.scholarship', compact('user', 'criterias', 'data'));
    }

    public function invention(Request $request)
    {
        $user = $request->user();
        $criterias = Category::where('code', 'invention')->first()->criterias;
        $education_year = EducationYear::all();
        $data = $user->inventions;

        return view('student.invention', compact('user', 'criterias', 'education_year', 'data'));
    }

    public function startup(Request $request)
    {
        $user = $request->user();
        $criterias = Category::where('code', 'startup')->first()->criterias;
        $data = $user->startups;

        return view('student.startup', compact('user', 'criterias', 'data'));
    }

    public function grand_economy(Request $request)
    {
        $user = $request->user();
        $criterias = Category::where('code', 'grand-economy')->first()->criterias;
        $data = $user->grand_economies;

        return view('student.grand-economy', compact('user', 'criterias', 'data'));
    }

    public function olympics(Request $request)
    {
        $user = $request->user();
        $criterias = Category::where('code', 'olympics')->first()->criterias;
        $data = $user->olympics;

        return view('student.olympics', compact('user', 'criterias', 'data'));
    }

    public function lang_certificate(Request $request)
    {
        $user = $request->user();
        $criterias = Category::where('code', 'lang-certificate')->first()->criterias;
        $data = $user->lang_certificates;

        return view('student.lang-certificate', compact('user', 'criterias', 'data'));
    }

    public function distinguished_scholarship(Request $request)
    {
        $user = $request->user();
        $data = File::where('fileable_type', DistinguishedScholarship::class)
            ->where('uploaded_by', $user->id)
            ->whereIn('type', ['passport', 'rating_book', 'faculty_statement', 'department_recommendation'])
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        $data = $data->groupBy('fileable_id');

        return view('student.distinguished-scholarship', compact('user', 'data'));
    }

    public function achievement(Request $request)
    {
        $user = $request->user();
        $criterias = Category::where('code', 'achievement')->first()->criterias;
        $data = $user->achievements;

        return view('student.achievement', compact('user', 'criterias', 'data'));
    }

    public function evaluation_criteria(Request $request)
    {
        $user = $request->user();
        $categories = Category::all();

        return view('student.evaluation-criteria', compact('user', 'categories'));
    }

    public function chat(Request $request)
    {
        $user = $request->user();
        $first_user_id = $user->id;
        $second_user_id = $user->student->employee->user->id;

        $chat = Chat::where(function ($query) use ($first_user_id, $second_user_id) {
            $query->where('user_one_id', $first_user_id)
                  ->where('user_two_id', $second_user_id);
        })->orWhere(function ($query) use ($first_user_id, $second_user_id) {
            $query->where('user_one_id', $first_user_id)
                  ->where('user_two_id', $second_user_id);
        })->first();

        if (!$chat) {
            $chat = Chat::create([
                'user_one_id' => $first_user_id,
                'user_two_id' => $second_user_id,
            ]);
        }

        return view('student.chat', compact('user', 'chat'));
    }
}
