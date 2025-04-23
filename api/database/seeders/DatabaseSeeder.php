<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);

        $permissions = Permission::all();

        $super_admin = Role::query()->where('name', '=', 'super_admin')->first();
        $manager = Role::query()->where('name', '=', 'manager')->first();
        $user = Role::query()->where('name', '=', 'user')->first();

        for ($i = 0; $i < count($permissions); $i++) {
            if (preg_match('/user:/', $permissions[$i]->name)) {
                $manager->givePermissionTo($permissions[$i]);
            }

            if (preg_match('/role:list|permission:list/', $permissions[$i]->name)) {
                $manager->givePermissionTo($permissions[$i]);
            }

            if (preg_match('/post:|user:update:/', $permissions[$i]->name)) {
                $user->givePermissionTo($permissions[$i]);
            }
        }

        $users = User::all();
        $users[0]->assignRole($super_admin);
        $users[1]->assignRole($manager);
        $users[2]->assignRole($user);
    }
}
