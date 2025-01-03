<?php

namespace App\Http\Controllers\Basic;

use App\Exports\AttachedStudentExport;
use App\Exports\AttachedStudentListExport;
use App\Exports\DepartmentExport;
use App\Exports\DistinguishedScholarshipExport;
use App\Exports\FacultyExport;
use App\Exports\GeneralFacultyExport;
use App\Exports\GeneralInstituteExport;
use App\Exports\InstituteExport;
use App\Exports\StudentFacultyExport;
use App\Exports\StudentInstituteExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function attached_students(Request $request)
    {
        $class = new AttachedStudentExport($request);

        return Excel::download($class, 'attached_students.xlsx');
    }

    public function attached_students_list(Request $request)
    {
        $class = new AttachedStudentListExport($request);

        return Excel::download($class, 'attached_students_list.xlsx');
    }

    public function distinguished_scholarship(Request $request)
    {
        $class = new DistinguishedScholarshipExport($request);

        return Excel::download($class, 'distinguished_scholarship.xlsx');
    }

    public function department(Request $request)
    {
        $class = new DepartmentExport($request);

        return Excel::download($class, 'department.xlsx');
    }

    public function faculty(Request $request)
    {
        $class = new FacultyExport($request);

        return Excel::download($class, 'faculty.xlsx');
    }

    public function institute(Request $request)
    {
        $class = new InstituteExport($request);

        return Excel::download($class, 'institute.xlsx');
    }

    public function general_faculty(Request $request)
    {
        $class = new GeneralFacultyExport($request);

        return Excel::download($class, 'general_faculty.xlsx');
    }

    public function general_institute(Request $request)
    {
        $class = new GeneralInstituteExport($request);

        return Excel::download($class, 'general_institute.xlsx');
    }

    public function student_faculty(Request $request)
    {
        $class = new StudentFacultyExport($request);

        return Excel::download($class, 'student_faculty.xlsx');
    }

    public function student_institute(Request $request)
    {
        $class = new StudentInstituteExport($request);

        return Excel::download($class, 'student_institute.xlsx');
    }
}
