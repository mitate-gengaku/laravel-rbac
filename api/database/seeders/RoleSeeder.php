<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'super_admin',
                'guard_name' => 'api',
            ],
            [
                'name' => 'manager',
                'guard_name' => 'api',
            ],
            [
                'name' => 'user',
                'guard_name' => 'api',
            ],
        ];

        \App\Models\Role::insert($roles);
    }
}
