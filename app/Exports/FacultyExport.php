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

class FacultyExport implements FromCollection, WithHeadings, WithMapping, WithStyles
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

        $faculty = $user->employee->department($role, StructureType::FACULTY->value);
        $employees = File::select('teacher_id', DB::raw('SUM(teacher_score) as total_teacher_score'))
            ->where('teacher_id', '!=', null)
            ->groupBy('teacher_id')
            ->orderBy('total_teacher_score', 'desc')
            ->get();

        $arr = [];
        foreach ($employees as $employee) {
            $item = $employee->teacher;

            $department = $item->employee->department('teacher', StructureType::DEPARTMENT);
            $current_faculty = $item->employee->department('teacher', StructureType::FACULTY->value);

            if ($current_faculty?->id != $faculty?->id) {
                continue;
            }

            $arr[] = [
                'fio' => $item->short_fio(),
                'department' => $department->name,
                'staff_position' => $department->pivot->staff_position,
                'student_count' => $item->employee->students->count(),
                'total_score' => $employee->total_teacher_score,
            ];
        }

        return collect($arr);
    }

    public function headings(): array
    {
        return [
            '#',
            'Xodim ism, familiyasi',
            'Kafedra',
            'Lavozimi',
            'Biriktirilgan talabalar soni',
            'Jami ball',
        ];
    }

    public function map($user): array
    {
        return [
            $this->index++,
            $user['fio'],
            $user['department'],
            $user['staff_position'],
            $user['student_count'],
            $user['total_score']
        ];
    }
}