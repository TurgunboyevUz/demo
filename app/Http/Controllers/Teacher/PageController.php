<?php

namespace App\Http\Controllers\Teacher;

use App\Enums\StructureType;
use App\Http\Controllers\Controller;
use App\Models\Auth\Department;
use App\Models\Chat\Chat;
use App\Models\File\Achievement;
use App\Models\File\Article;
use App\Models\File\File;
use App\Models\File\GrandEconomy;
use App\Models\File\Invention;
use App\Models\File\LangCertificate;
use App\Models\File\Olympic;
use App\Models\File\Scholarship;
use App\Models\File\Startup;
use App\Service\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = $request->user();

        $top3_att = (new Rating($user))->getRating(Rating::ATTACHED, Rating::STUDENT)->take(3);
        $top3_dep = (new Rating($user))->getRating(Rating::DEPARTMENT, Rating::TEACHER)->take(3);
        $top3_fac = (new Rating($user))->getRating(Rating::FACULTY, Rating::TEACHER)->take(3);
        $top3_ins = (new Rating($user))->getRating(Rating::ALL, Rating::TEACHER)->take(3);

        $faculty = $user->employee->department('teacher', StructureType::FACULTY->value);
        $department = $user->employee->department('teacher', StructureType::DEPARTMENT->value);

        $data = compact('top3_att', 'top3_dep', 'top3_fac', 'top3_ins');

        return view('teacher.dashboard', compact('user', 'faculty', 'department', 'data'));
    }

    public function article(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Article::class)
            ->with('article')
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('teacher.article', compact('user', 'files'));
    }

    public function scholarship(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Scholarship::class)
            ->with('scholarship')
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('teacher.scholarship', compact('user', 'files'));
    }

    public function invention(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Invention::class)
            ->with('invention')
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('teacher.invention', compact('user', 'files'));
    }

    public function startup(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Startup::class)
            ->with('startup')
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('teacher.startup', compact('user', 'files'));
    }

    public function grand_economy(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', GrandEconomy::class)
            ->with('grand_economy')
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('teacher.grand-economy', compact('user', 'files'));
    }

    public function olympics(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Olympic::class)
            ->with('olympic')
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('teacher.olympics', compact('user', 'files'));
    }

    public function lang_certificate(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', LangCertificate::class)
            ->with('lang_certificate')
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('teacher.lang-certificate', compact('user', 'files'));
    }

    public function achievement(Request $request)
    {
        $user = $request->user();
        $files = File::where('fileable_type', Achievement::class)
            ->with('achievement')
            ->orderByRaw("FIELD(status, 'pending', 'reviewed', 'approved', 'rejected')")
            ->get();

        return view('teacher.achievement', compact('user', 'files'));
    }

    public function chat(Request $request)
    {
        $user = $request->user();
        $students = $user->employee->students()->with('user')->get();

        $chats = $students->map(function ($student) use ($user) {
            $first_user_id = $user->id;
            $second_user_id = $student->user->id;

            $chat = Chat::where(function ($query) use ($first_user_id, $second_user_id) {
                $query->where('user_one_id', $first_user_id)
                    ->where('user_two_id', $second_user_id);
            })->orWhere(function ($query) use ($first_user_id, $second_user_id) {
                $query->where('user_one_id', $second_user_id)
                    ->where('user_two_id', $first_user_id);
            })->first();

            if (!$chat) {
                $chat = Chat::create([
                    'user_one_id' => $first_user_id,
                    'user_two_id' => $second_user_id,
                ]);
            }

            return $student->chat = $chat;
        });

        $current_chat = $request->query('chat');

        return view('teacher.chat', compact('user', 'students', 'current_chat'));
    }

    public function student_list(Request $request)
    {
        $user = $request->user();
        $students = $user->employee->students()->get();

        return view('teacher.student-list', compact('user', 'students'));
    }

    public function task(Request $request)
    {
        $user = $request->user();
        $students = $user->employee->students()->get();

        $files = $user->employee->tasks;

        return view('teacher.tasks', compact('user', 'students', 'files'));
    }

    public function edit_profile(Request $request)
    {
        $user = $request->user();
        $current_faculty = $user->employee->department('teacher', StructureType::FACULTY->value);
        $faculties = Department::where('structure_code', StructureType::FACULTY->value)->get();

        return view('teacher.edit-profile', compact('user', 'current_faculty', 'faculties'));
    }
}
