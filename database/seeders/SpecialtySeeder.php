<?php

namespace Database\Seeders;

use App\Models\Auth\Specialty;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = json_decode(file_get_contents(storage_path('hemis/specialty.json')), true);

        foreach ($data['data']['items'] as $item) {
            if ($item['bachelorSpecialty']) {
                Specialty::firstOrCreate(['code' => $item['code']], ['name' => $item['name']]);
            }
        }
    }
}
