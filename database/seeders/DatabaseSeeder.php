<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //creating role 
        $roles = ['vendor', 'customer', 'admin'];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role
            ]);
        }



        // creating permission 
        $permissions = ['book service', 'create service', 'manage service', 'manage user'];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
        // User::factory(10)->create();

        $users = [
            ['name' => 'Test User', 'email' => 'test@example.com', 'role' => 'customer'],
            ['name' => 'Admin', 'email' => 'admin@example.com', 'password' => Hash::make('password'), 'role' => 'admin'],
            ['name' => 'Vendor', 'email' => 'vendor@example.com', 'password' => Hash::make('password'), 'role' => 'vendor'],
            ['name' => 'Rayhan', 'email' => 'rayhan@example.com', 'password' => Hash::make('password'), 'role' => 'customer'],
        ];

        foreach ($users as $user) {
            $role = $user['role'];
            unset($user['role']); // remove role from array to prevent it from being passed to create method

            $user = User::factory()->create($user);
            $user->assignRole($role);
        }

    }
}
