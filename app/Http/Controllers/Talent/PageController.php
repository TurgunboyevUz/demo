<?php

namespace App\Http\Controllers\Talent;

use App\Enums\StructureType;
use App\Http\Controllers\Controller;
use App\Models\Auth\Student;
use App\Models\File\DistinguishedScholarship;
use App\Models\File\File;
use App\Service\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = $request->user();
        $department = $user->employee->department('inspeksiya');

        $top3_stu = (new Rating($user))->getRating(Rating::ALL, Rating::STUDENT)->take(3);
        $top3_ins = (new Rating($user))->getRating(Rating::ALL, Rating::TEACHER)->take(3);

        $data = compact('top3_stu', 'top3_ins');

        return view('talent.dashboard', compact('user', 'department', 'data'));
    }

    public function distinguished_scholarship(Request $request)
    {
        $user = $request->user();

        $files = File::where('fileable_type', DistinguishedScholarship::class)
            ->whereIn('type', ['passport', 'rating_book', 'faculty_statement', 'department_recommendation'])
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        $files = $files->groupBy('fileable_id');

        return view('talent.distinguished-scholarship', compact('user', 'files'));
    }

    public function student_list(Request $request)
    {
        $user = $request->user();
        $students = Student::all();

        return view('talent.student-list', compact('user', 'students'));
    }

    public function edit_profile(Request $request)
    {
        $user = $request->user();

        return view('talent.edit-profile', compact('user'));
    }
}
