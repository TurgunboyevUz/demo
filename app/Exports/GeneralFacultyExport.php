<?php

namespace App\Exports;

use App\Enums\StructureType;
use App\Models\File\File;
use App\Traits\ExcelStyle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GeneralFacultyExport implements FromCollection, WithMapping, WithHeadings, WithStyles
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
        $role = $this->request->query('role');

        $department = $user->employee->department($role, StructureType::FACULTY->value);
        $students = File::select('uploaded_by', DB::raw('SUM(student_score) as total_student_score'))
            ->where('teacher_id', '!=', null)
            ->groupBy('uploaded_by')
            ->orderBy('total_student_score', 'desc')
            ->get();

        $arr = [];

        foreach ($students as $student) {
            if ($student->user->student->faculty->code != $department->code) {
                continue;
            }

            $data = $student->user;

            $arr[] = [
                'fio' => $data->short_fio(),
                'level' => $data->student->level,
                'teacher' => $data->student->employee->user->short_fio(),
                'direction' => $data->student->direction->name,
                'total_score' => $student->total_student_score,
            ];
        }

        return collect($arr);
    }

    public function headings(): array
    {
        return [
            '#',
            'Talaba ism, familiyasi',
            'Kursi',
            'O\'qituvchi',
            'Yo\'nalishi',
            'Jami ball'
        ];
    }

    public function map($student): array
    {
        return [
            $this->index++,
            $student['fio'],
            $student['level'],
            $student['teacher'],
            $student['direction'],
            $student['total_score']
        ];
    }
}
