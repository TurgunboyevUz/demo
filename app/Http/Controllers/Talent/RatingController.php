<?php

namespace App\Http\Controllers\Talent;

use App\Enums\StructureType;
use App\Http\Controllers\Controller;
use App\Models\File\File;
use App\Service\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function institute(Request $request)
    {
        $user = $request->user();
        $employees = (new Rating($user))->getRating(Rating::ALL, Rating::TEACHER)->take();

        return view('talent.rating.institute', compact('user', 'employees'));
    }

    public function general_institute(Request $request)
    {
        $user = $request->user();

        $students = (new Rating($user))->getRating(Rating::ALL, Rating::STUDENT)->take();

        return view('talent.rating.general-institute', compact('user', 'students'));
    }
}
