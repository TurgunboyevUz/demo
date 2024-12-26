<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dean\StoreProfileRequest;
use App\Models\Auth\Employee;
use App\Models\Auth\Student;
use Illuminate\Http\Request;

class DeanController extends Controller
{
    public function student_employee(Request $request)
    {
        $students = Student::with(['user', 'faculty', 'specialty', 'group', 'employee'])->get();
        $employees = Employee::with('user')->get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'status' => 200,
            'data' => [
                'students' => $students,
                'employees' => $employees,
            ],
        ], 200);
    }

    public function attach_student(Request $request)
    {
        return response()->json([
            'success' => true,
            'data' => $request->all(),
        ]);
    }

    public function edit_profile(StoreProfileRequest $request)
    {
        $user = $request->user();
        $data = $request->validated();

        $user->update([
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);

        $this->toast('Profil muvaffaqiyatli yangilandi!');

        return redirect()->route($request->route()->getName());
    }

    public function toast($message)
    {
        toast($message, 'success', 'top-end')->width('25rem')
            ->background('#f5f6f7')
            ->showCloseButton()
            ->timerProgressBar();
    }
}
