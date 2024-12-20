<?php

namespace Database\Seeders;

use App\Models\Auth\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = json_decode(file_get_contents(storage_path('hemis/department.json')), true);

        foreach ($data['data']['items'] as $item) {
            Department::firstOrCreate(['code' => $item['code']], ['name' => $item['name']]);
        }
    }
}
