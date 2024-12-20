<?php

namespace Database\Seeders;

use App\Models\Auth\Faculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = json_decode(file_get_contents(storage_path('hemis/faculty.json')), true);

        foreach ($data['data']['items'] as $item) {
            Faculty::firstOrCreate(['code' => $item['code']], ['name' => $item['name']]);
        }
    }
}
