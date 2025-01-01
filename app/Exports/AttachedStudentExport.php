<?php

namespace App\Exports;

use App\Enums\CriteriaEnum;
use App\Models\File\File;
use App\Traits\ExcelStyle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;

class AttachedStudentExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    use ExcelStyle;

    protected $index = 1;
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $user = $this->request->user();

        $students = File::select('uploaded_by', DB::raw('SUM(student_score) as total_student_score'))
            ->with([
                'user' => fn($q) => $q->with([
                    'student.direction:id,name',
                    'articles' => fn($q) => $q->select('user_id', 'criteria_id', DB::raw('COUNT(*) as count'))
                        ->groupBy('user_id', 'criteria_id'),
                    'scholarships' => fn($q) => $q->select('user_id', 'criteria_id', DB::raw('COUNT(*) as count'))
                        ->groupBy('user_id', 'criteria_id'),
                    'inventions' => fn($q) => $q->select('user_id', 'criteria_id', DB::raw('COUNT(*) as count'))
                        ->groupBy('user_id', 'criteria_id'),
                    'startups' => fn($q) => $q->select('user_id', 'type', DB::raw('COUNT(*) as count'))
                        ->groupBy('user_id', 'type'),
                    'grand_economies' => fn($q) => $q->select('user_id', 'criteria_id', DB::raw('COUNT(*) as count'))
                        ->groupBy('user_id', 'criteria_id'),
                    'olympics' => fn($q) => $q->select('user_id', 'criteria_id', DB::raw('COUNT(*) as count'))
                        ->groupBy('user_id', 'criteria_id'),
                    'lang_certificates' => fn($q) => $q->select('user_id', 'lang', DB::raw('COUNT(*) as count'))
                        ->groupBy('user_id', 'lang'),
                    'achievements' => fn($q) => $q->select('user_id', DB::raw('COUNT(*) as count'))
                        ->groupBy('user_id'),
                ]),
            ])
            ->where('teacher_id', $user->id)
            ->groupBy('uploaded_by')
            ->orderBy('total_student_score', 'desc')
            ->get();

        $arr = $students->map(fn($student) => [
            'fio' => $student->user->short_fio(),
            'level' => $student->user->student->level,
            'direction' => $student->user->student->direction->name,
            'total_score' => $student->total_student_score,
            'articles_scopus' => $student->user->articles->where('criteria_id', CriteriaEnum::ARTICLE_SCOPUS->value)->first()->count ?? 0,
            'articles_local' => $student->user->articles->where('criteria_id', CriteriaEnum::ARTICLE_LOCAL->value)->first()->count ?? 0,
            'articles_global' => $student->user->articles->where('criteria_id', CriteriaEnum::ARTICLE_GLOBAL->value)->first()->count ?? 0,
            'articles_thesis' => ($student->user->articles->where('criteria_id', CriteriaEnum::ARTICLE_THESIS_GLOBAL->value)->first()->count ?? 0) + ($student->user->articles->where('criteria_id', CriteriaEnum::ARTICLE_THESIS_LOCAL->value)->first()->count ?? 0),
            'scholarships_institute' => $student->user->scholarships->where('criteria_id', CriteriaEnum::SCHOLARSHIP_INSTITUTE->value)->first()->count ?? 0,
            'scholarships_region' => $student->user->scholarships->where('criteria_id', CriteriaEnum::SCHOLARSHIP_REGION->value)->first()->count ?? 0,
            'scholarships_republic' => $student->user->scholarships->where('criteria_id', CriteriaEnum::SCHOLARSHIP_REPUBLIC->value)->first()->count ?? 0,
            'inventions_invention' => $student->user->inventions->where('criteria_id', CriteriaEnum::INVENTION_INV->value)->first()->count ?? 0,
            'inventions_dgu' => $student->user->inventions->where('criteria_id', CriteriaEnum::INVENTION_DGU->value)->first()->count ?? 0,
            'inventions_model' => $student->user->inventions->where('criteria_id', CriteriaEnum::INVENTION_MODEL->value)->first()->count ?? 0,
            'startups_startup' => $student->user->startups->where('type', 'startup')->first()->count ?? 0,
            'startups_contest' => $student->user->startups->where('type', 'contest')->first()->count ?? 0,
            'grands_grand' => $student->user->grand_economies->where('criteria_id', CriteriaEnum::GRAND->value)->first()->count ?? 0,
            'grands_economy' => $student->user->grand_economies->where('criteria_id', CriteriaEnum::ECONOMY->value)->first()->count ?? 0,
            'olympics_institute' => $student->user->olympics->where('criteria_id', CriteriaEnum::OLYMPIC_INSTITUTE->value)->first()->count ?? 0,
            'olympics_region' => $student->user->olympics->where('criteria_id', CriteriaEnum::OLYMPIC_REGION->value)->first()->count ?? 0,
            'olympics_republic' => $student->user->olympics->where('criteria_id', CriteriaEnum::OLYMPIC_REPUBLIC->value)->first()->count ?? 0,
            'lang_ru' => $student->user->lang_certificates->where('lang', 'ru')->first()->count ?? 0,
            'lang_en' => $student->user->lang_certificates->where('lang', 'en')->first()->count ?? 0,
            'lang_de' => $student->user->lang_certificates->where('lang', 'de')->first()->count ?? 0,
            'achievements' => $student->user->achievements->first()->count ?? 0,
        ]);

        return collect($arr);
    }

    public function headings(): array
    {
        return [
            '#',  
            'Talaba FIO', 
            'Kurs', 
            'Yo\'nalish',
            
            'Maqolalar SCOPUS', 
            'Maqolalar Mahalliy', 
            'Maqolalar Xorijiy', 
            'Maqolalar Tezis',
            
            'Stipendiyalar Institut', 
            'Stipendiyalar Viloyat', 
            'Stipendiyalar Respublika',

            'Ixtiro', 
            'DGU', 
            'Foydali model',

            'Startup', 
            'Tanlov',

            'Grand', 
            'Xo\'jalik',

            'Olimpiyadalar Institut', 
            'Olimpiyadalar Viloyat', 
            'Olimpiyadalar Xalqaro',

            'Til sertifikatlari Rus', 
            'Til sertifikatlari Ingliz', 
            'Til sertifikatlari Nemis',

            'Yutuqlar', 
            'Umumiy Ball'
        ];
    }

    public function map($student): array
    {
        return [
            $this->index++,
            $student['fio'],
            $student['level'],
            $student['direction'],
            (string)($student['articles_scopus'] ?? 0),
            (string)($student['articles_local'] ?? 0),
            (string)($student['articles_global'] ?? 0),
            (string)($student['articles_thesis'] ?? 0),
            (string)($student['scholarships_institute'] ?? 0),
            (string)($student['scholarships_region'] ?? 0),
            (string)($student['scholarships_republic'] ?? 0),
            (string)($student['inventions_invention'] ?? 0),
            (string)($student['inventions_dgu'] ?? 0),
            (string)($student['inventions_model'] ?? 0),
            (string)($student['startups_startup'] ?? 0),
            (string)($student['startups_contest'] ?? 0),
            (string)($student['grands_grand'] ?? 0),
            (string)($student['grands_economy'] ?? 0),
            (string)($student['olympics_institute'] ?? 0),
            (string)($student['olympics_region'] ?? 0),
            (string)($student['olympics_republic'] ?? 0),
            (string)($student['lang_ru'] ?? 0),
            (string)($student['lang_en'] ?? 0),
            (string)($student['lang_de'] ?? 0),
            (string)($student['achievements'] ?? 0),
            (string)($student['total_score'] ?? 0),
        ];
    }
}
