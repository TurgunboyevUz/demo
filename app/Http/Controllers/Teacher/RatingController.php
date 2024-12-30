<?php

namespace App\Http\Controllers\Teacher;

use App\Enums\CriteriaEnum;
use App\Enums\StructureType;
use App\Http\Controllers\Controller;
use App\Models\File\File;
use App\Service\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function attached_students(Request $request)
    {
        $user = $request->user();
        $students = (new Rating($user))->getRating(Rating::ATTACHED, Rating::STUDENT)->take();

        return view('teacher.rating.attached-students', compact('user', 'students'));
    }

    public function department(Request $request)
    {
        $user = $request->user();
        $employees = (new Rating($user))->getRating(Rating::DEPARTMENT, Rating::TEACHER)->take();

        return view('teacher.rating.department', compact('user', 'employees'));
    }

    public function faculty(Request $request)
    {
        $user = $request->user();
        $employees = (new Rating($user))->getRating(Rating::FACULTY, Rating::TEACHER)->take();

        return view('teacher.rating.faculty', compact('user', 'employees'));
    }

    public function institute(Request $request)
    {
        $user = $request->user();
        $employees = (new Rating($user))->getRating(Rating::ALL, Rating::TEACHER)->take();

        return view('teacher.rating.institute', compact('user', 'employees'));
    }

    public function general_institute(Request $request)
    {
        $user = $request->user();
        $students = (new Rating($user))->getRating(Rating::ALL, Rating::STUDENT)->take();

        return view('teacher.rating.general-institute', compact('user', 'students'));
    }
}
