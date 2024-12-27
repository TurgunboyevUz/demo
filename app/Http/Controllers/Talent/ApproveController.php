<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\File\Achievement;
use App\Models\File\Article;
use App\Models\File\DistinguishedScholarship;
use App\Models\File\GrandEconomy;
use App\Models\File\Invention;
use App\Models\File\LangCertificate;
use App\Models\File\Olympic;
use App\Models\File\Scholarship;
use App\Models\File\Startup;
use Illuminate\Http\Request;

class ApproveController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:distinguished_scholarships,id',
        ]);

        $item = DistinguishedScholarship::find($data['id']);
        $item->files()->update([
            'status' => 'approved',
            'inspector_id' => $request->user()->id,
            'approved_at' => now(),
        ]);

        $this->toast('Ariza');

        return response()->json([
            'message' => 'Tasdiqlandi',
        ]);
    }

    public function toast($file_type)
    {
        toast($file_type.' tasdiqlandi!', 'success', 'top-end')->width('25rem')
            ->background('#f5f6f7')
            ->showCloseButton()
            ->timerProgressBar();
    }
}
