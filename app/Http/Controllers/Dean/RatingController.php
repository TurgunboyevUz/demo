<?php

namespace App\Http\Controllers\Dean;

use App\Enums\StructureType;
use App\Http\Controllers\Controller;
use App\Models\File\File;
use App\Service\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function faculty(Request $request)
    {
        $user = $request->user();
        $employees = (new Rating($user, 'dean'))->getRating(Rating::FACULTY, Rating::TEACHER)->take();

        return view('dean.rating.faculty', compact('user', 'employees'));
    }

    public function institute(Request $request)
    {
        $user = $request->user();
        $employees = (new Rating($user))->getRating(Rating::ALL, Rating::TEACHER)->take();

        return view('dean.rating.institute', compact('user', 'employees'));
    }

    public function general_faculty(Request $request)
    {
        $user = $request->user();
        $students = (new Rating($user, 'dean'))->getRating(Rating::FACULTY, Rating::STUDENT)->take();

        return view('dean.rating.general-faculty', compact('user', 'students'));
    }

    public function general_institute(Request $request)
    {
        $user = $request->user();
        $students = (new Rating($user))->getRating(Rating::ALL, Rating::STUDENT)->take();

        return view('dean.rating.general-institute', compact('user', 'students'));
    }
}
