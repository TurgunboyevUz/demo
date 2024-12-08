<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role as RoleModel;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['student', 'teacher', 'dean', 'inspector', 'admin', 'super_admin'];

        foreach ($roles as $role) {
            RoleModel::create([
                'name' => $role
            ]);
        }
    }
}
