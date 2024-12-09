<?php

namespace App\Utils;

use App\Models\Auth\Department;
use App\Models\Auth\Employee;
use App\Models\Auth\Faculty;
use App\Models\Auth\Group;
use App\Models\Auth\Nation;
use App\Models\Auth\Specialty;
use App\Models\Auth\Student;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserUtil
{
    public static function create(array $response)
    {
        $uuid = Str::uuid();
        $hemis_id = $response['student_id_number'] ?? $response['employee_id_number'];
        $name = $response['firstname'];
        $surname = $response['surname'];
        $patronymic = $response['patronymic'];
        $short_name = $response['data']['short_name'] ?? $surname . '.' . $name[0] . '.' . $patronymic[0];
        $phone = $response['phone'];
        $email = $response['email'];
        $passport_number = $response['passport_number'];
        $passport_pin = $response['passport_pin'];
        $picture_path = '';

        $user = User::firstOrCreate(['hemis_id' => $hemis_id], compact('uuid', 'hemis_id', 'name', 'surname', 'patronymic', 'short_name', 'phone', 'email', 'passport_number', 'passport_pin', 'picture_path'));

        if ($user->picture_path) {
            Storage::disk('public')->delete($user->picture_path);
        }

        $picture_path = 'profile/image_' . now()->format('d-m-Y') . '_' . uniqid(true) . '.jpg';
        $picture = file_get_contents($response['picture']);

        self::makeDir(storage_path('app/public/profile'));
        file_put_contents(storage_path('app/public/' . $picture_path), $picture);

        $user->update(compact('name', 'surname', 'patronymic', 'short_name', 'phone', 'email', 'picture_path', 'passport_number', 'passport_pin'));

        $nation = $response['data']['educationLang']['name'] ?? "O'zbek";
        $nation = Nation::firstOrCreate(['name' => $nation]);

        if ($response['type'] == 'student') {
            $faculty = Faculty::firstOrCreate(['name' => $response['data']['faculty']['name']]);
            $specialty = Specialty::firstOrCreate(['name' => $response['data']['specialty']['name']]);
            $group = Group::firstOrCreate(['name' => $response['data']['group']['name']]);
            $level = str_replace('-kurs', '', $response['data']['level']['name']);
            $address = $response['data']['province']['name'] . ' ' . $response['data']['district']['name'] . ' ' . $response['data']['address'];

            $student = Student::updateOrCreate(['user_id' => $user->id], [
                'faculty_id' => $faculty->id,
                'specialty_id' => $specialty->id,
                'group_id' => $group->id,
                'nation_id' => $nation->id,
                'address' => $address,
                'level' => $level,
            ]);

            $user->syncRoles(['student']);

            $redirect = 'student.dashboard';
        }

        if ($response['type'] == 'employee') {
            $employee = Employee::updateOrCreate(['user_id' => $user->id], [
                'nation_id' => $nation->id,
            ]);

            foreach ($response['departments'] as $department) {
                $department_id = Department::firstOrCreate([
                    'name' => $department['department']['name'],
                ])->id;

                $employee->departments()->attach($department_id, [
                    'type' => $department['employeeType']['name'],
                    'position' => $department['staffPosition']['name'],
                ]);
            }

            $arr = Arr::pluck($response['roles'], 'code');
            $roles = Role::whereIn('name', $arr)->pluck('name')->toArray();

            $user->syncRoles($roles);

            $redirect = 'employee.' . $arr[0] . '.dashboard';
        }

        return [
            'user' => $user,
            'redirect' => $redirect,
        ];
    }

    public static function makeDir($dir)
    {
        if (!is_dir($dir)) {
            mkdir($dir);
        }
    }
}
