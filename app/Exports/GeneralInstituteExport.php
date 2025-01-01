<?php

namespace App\Exports;

use App\Models\File\File;
use App\Traits\ExcelStyle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;

class GeneralInstituteExport implements FromCollection, WithHeadings, WithStyles, WithMapping
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
        $students = File::select('uploaded_by', DB::raw('SUM(student_score) as total_student_score'))
            ->groupBy('uploaded_by')
            ->orderBy('total_student_score', 'desc')
            ->get();

        $arr = [];

        foreach ($students as $student) {
            $data = $student->user;

            $arr[] = [
                'fio' => $data->short_fio(),
                'level' => $data->student->level,
                'teacher' => $data->student->employee->user->short_fio(),
                'faculty' => $data->student->faculty->name,
                'direction' => $data->student->direction->name,
                'total_score' => $student->total_student_score,
            ];
        }

        return collect($arr);
    }

    public function map($user): array
    {
        return [
            $this->index++,
            $user['fio'],
            $user['level'],
            $user['teacher'],
            $user['faculty'],
            $user['direction'],
            $user['total_score']
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Talaba ism, familiyasi',
            'Kursi',
            'O\'qituvchi',
            'Fakultet',
            'Yo\'nalishi',
            'Jami ball'
        ];
    }
}
