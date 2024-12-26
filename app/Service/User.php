<?php

namespace App\Service;

use App\Models\Auth\Department;
use App\Models\Auth\Direction;
use App\Models\Auth\Employee;
use App\Models\Auth\Faculty;
use App\Models\Auth\Gender;
use App\Models\Auth\Group;
use App\Models\Auth\Nation;
use App\Models\Auth\Specialty;
use App\Models\Auth\Student;
use App\Models\User as UserModel;
use App\Utils\Hemis;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class User
{
    public function __construct()
    {}

    public function user(array $response)
    {
        $hemis_id = $response['student_id_number'] ?? $response['employee_id_number'];
        $name = $response['firstname'];
        $surname = $response['surname'];
        $patronymic = $response['patronymic'];
        $short_name = $response['data']['short_name'] ?? $surname . '.' . $name[0] . '.' . $patronymic[0];
        $phone = $response['phone'];
        $email = $response['email'];
        $passport_number = $response['passport_number'];
        $passport_pin = $response['passport_pin'];
        $birth_date = Carbon::parse($response['birth_date'])->format('Y-m-d');
        $picture_path = '';

        $user = UserModel::firstOrCreate(['hemis_id' => $hemis_id], compact('hemis_id', 'name', 'surname', 'patronymic', 'short_name', 'phone', 'email', 'birth_date', 'passport_number', 'passport_pin', 'picture_path'));

        $picture_path = $this->picture($response, $user);

        $user->update(compact('name', 'surname', 'patronymic', 'short_name', 'picture_path'));

        if ($response['type'] == 'student') {
            $this->student($response, $user);

            $redirect = 'student.dashboard';
        } else {
            $role = $this->employee($response, $user);

            $redirect = 'employee.' . $role . '.dashboard';
        }

        return compact('user', 'redirect');
    }

    public function student(array $response, $user)
    {
        $level = str_replace('-kurs', '', $response['data']['level']['name']);
        $address = $response['data']['province']['name'] . ' ' . $response['data']['district']['name'] . ' ' . $response['data']['address'];

        $student = Student::updateOrCreate(['user_id' => $user->id], [
            'faculty_id' => $this->faculty($response),
            'direction_id' => $this->direction($response),
            'group_id' => $this->group($response),
            'address' => $address,
            'level' => $level,
        ]);

        $hemis = new Hemis(config('oauth.token'));
        $items = $hemis->student($user->hemis_id, $response['passport_pin']);

        $user->update([
            'gender_id' => $this->gender($items),
            'nation_id' => $this->nation($response),
        ]);

        $user->syncRoles(['student']);
    }

    public function employee(array $response, $user)
    {
        $employee = Employee::firstOrCreate(
            ['user_id' => $user->id]);

        $hemis = new Hemis(config('oauth.token'));
        $items = $hemis->employee($user->hemis_id, $response['passport_pin'], $response['passport_number']);

        $user->update([
            'gender_id' => $this->gender($items),
            'nation_id' => $this->nation($response),
        ]);

        foreach ($items as $item) {
            $role = $this->role($item['employee_type']['name'], $item['staff_position']['name']);

            if (!$role) {
                continue;
            }

            if ($role == 'teacher') {
                $employee->update(['specialty_id' => $this->specialty($item)]);
            }

            $department_id = Department::firstOrCreate(
                ['code' => $item['department']['code']],
                ['name' => $item['department']['name']]
            )->id;

            $role_id = Role::where('name', $role)->first()->id;

            if ($employee->departments()->where('department_id', $department_id)->where('role_id', $role_id)->exists()) {
                continue;
            }

            $employee->departments()->attach($department_id, [
                'role_id' => $role_id,

                'employee_type' => $item['employee_type']['name'],
                'employee_code' => $item['employee_type']['code'],

                'staff_code' => $item['staff_position']['code'],
                'staff_position' => $item['staff_position']['name'],
            ]);
        }

        $arr = Arr::pluck($response['roles'], 'code');
        $roles = Role::whereIn('name', $arr)->pluck('name')->toArray();

        if ($user->hasRole('talent')) {
            $roles[] = 'talent';
        }

        $user->syncRoles($roles);

        return $arr[0];
    }

    public function mkdir($name)
    {
        if (!is_dir($name)) {
            return mkdir($name);
        }
    }

    public function picture(array $response, $user)
    {
        $this->mkdir(storage_path('app/public/profile'));

        if ($user->picture_path) {
            Storage::disk('public')->delete($user->picture_path);
        }

        $picture = file_get_contents($response['picture']);
        $picture_path = 'profile/image_' . now()->format('d-m-Y') . '_' . uniqid(true) . '.jpg';

        Storage::disk('public')->put($picture_path, $picture);

        return $picture_path;
    }

    public function nation(array $response)
    {
        $nation = Nation::firstOrCreate(['name' => 'O‘zbek']);

        return $nation->id;
    }

    public function gender(array $response)
    {
        $gender = Gender::where('code', $response[0]['gender']['code'])->first();

        return $gender->id;
    }

    public function faculty(array $response)
    {
        $faculty = Faculty::firstOrCreate(['code' => $response['data']['faculty']['code']], ['name' => $response['data']['faculty']['name']]);

        return $faculty->id;
    }

    public function direction(array $response)
    {
        $specialty = Direction::firstOrCreate(['code' => $response['data']['specialty']['code']], ['name' => $response['data']['specialty']['name']]);

        return $specialty->id;
    }

    public function group(array $response)
    {
        $group = Group::firstOrCreate(['name' => $response['data']['group']['name']]);

        return $group->id;
    }

    public function specialty(array $response)
    {
        $specialty = Specialty::firstOrCreate(['name' => ucfirst($response['specialty'])]);

        return $specialty->id;
    }

    public function role($employee_type, $staff_position)
    {
        $keys = [
            'teacher' => ['o‘qituvchi', 'dotsent'],
            'dean' => ['dekan'],
            'inspeksiya' => ['inspeksiya'],
        ];

        foreach ($keys as $key => $value) {
            foreach ($value as $val) {
                if (mb_stripos($staff_position, $val) !== false or mb_stripos($employee_type, $val) !== false) {
                    return $key;
                }
            }
        }

    }
}
