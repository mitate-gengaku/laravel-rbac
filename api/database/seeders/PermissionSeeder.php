<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'post:list', 'guard_name' => 'api'],
            ['name' => 'post:create', 'guard_name' => 'api'],
            ['name' => 'post:read', 'guard_name' => 'api'],
            ['name' => 'post:update', 'guard_name' => 'api'],
            ['name' => 'post:delete', 'guard_name' => 'api'],
            ['name' => 'user:list', 'guard_name' => 'api'],
            ['name' => 'user:update', 'guard_name' => 'api'],
            ['name' => 'user:delete', 'guard_name' => 'api'],
            ['name' => 'role:list', 'guard_name' => 'api'],
            ['name' => 'role:create', 'guard_name' => 'api'],
            ['name' => 'role:update', 'guard_name' => 'api'],
            ['name' => 'role:delete', 'guard_name' => 'api'],
            ['name' => 'permission:list', 'guard_name' => 'api'],
            ['name' => 'permission:create', 'guard_name' => 'api'],
            ['name' => 'permission:update', 'guard_name' => 'api'],
            ['name' => 'permission:delete', 'guard_name' => 'api'],
        ];

        \App\Models\Permission::insert($permissions);
    }
}
