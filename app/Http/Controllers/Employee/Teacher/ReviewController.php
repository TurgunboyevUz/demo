<?php

namespace App\Http\Controllers\Employee\Teacher;

use App\Http\Controllers\Controller;
use App\Models\File\Achievement;
use App\Models\File\Article;
use App\Models\File\GrandEconomy;
use App\Models\File\Invention;
use App\Models\File\LangCertificate;
use App\Models\File\Olympic;
use App\Models\File\Scholarship;
use App\Models\File\Startup;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function article(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:articles,id'
        ]);

        $article = Article::find($data['id']);
        $article->file->update([
            'status' => 'reviewed',
            'teacher_id' => $request->user()->id,
            'reviewed_at' => now()
        ]);

        return response()->json([
            'message' => 'Tasdiqlandi'
        ]);
    }

    public function scholarship(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:scholarships,id'
        ]);

        $scholarship = Scholarship::find($data['id']);
        $scholarship->file->update([
            'status' => 'reviewed',
            'teacher_id' => $request->user()->id,
            'reviewed_at' => now()
        ]);

        return response()->json([
            'message' => 'Tasdiqlandi'
        ]);
    }

    public function invention(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:inventions,id'
        ]);

        $invention = Invention::find($data['id']);
        $invention->file->update([
            'status' => 'reviewed',
            'teacher_id' => $request->user()->id,
            'reviewed_at' => now()
        ]);

        return response()->json([
            'message' => 'Tasdiqlandi'
        ]);
    }

    public function startup(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:startups,id'
        ]);

        $startup = Startup::find($data['id']);
        $startup->file->update([
            'status' => 'reviewed',
            'teacher_id' => $request->user()->id,
            'reviewed_at' => now()
        ]);

        return response()->json([
            'message' => 'Tasdiqlandi'
        ]);
    }

    public function grand_economy(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:grand_economies,id'
        ]);

        $grand = GrandEconomy::find($data['id']);
        $grand->file->update([
            'status' => 'reviewed',
            'teacher_id' => $request->user()->id,
            'reviewed_at' => now()
        ]);

        return response()->json([
            'message' => 'Tasdiqlandi'
        ]);
    }

    public function olympics(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:olympics,id'
        ]);

        $olympic = Olympic::find($data['id']);
        $olympic->file->update([
            'status' => 'reviewed',
            'teacher_id' => $request->user()->id,
            'reviewed_at' => now()
        ]);

        return response()->json([
            'message' => 'Tasdiqlandi'
        ]);
    }

    public function lang_certificate(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:lang_certificates,id'
        ]);

        $lang = LangCertificate::find($data['id']);
        $lang->file->update([
            'status' => 'reviewed',
            'teacher_id' => $request->user()->id,
            'reviewed_at' => now()
        ]);

        return response()->json([
            'message' => 'Tasdiqlandi'
        ]);
    }

    public function achievement(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:achievements,id'
        ]);

        $achievement = Achievement::find($data['id']);
        $achievement->file->update([
            'status' => 'reviewed',
            'teacher_id' => $request->user()->id,
            'reviewed_at' => now()
        ]);

        return response()->json([
            'message' => 'Tasdiqlandi'
        ]);
    }
}