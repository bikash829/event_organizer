<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\ServiceCategory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //creating role 
        $roles = ['seller', 'user', 'admin'];

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
            ['first_name' => 'Test User', 'email' => 'test@example.com', 'role' => 'user'],
            ['first_name' => 'Admin', 'email' => 'admin@example.com', 'password' => Hash::make('password'), 'role' => 'admin'],
            ['first_name' => 'Vendor', 'email' => 'vendor@example.com', 'password' => Hash::make('password'), 'role' => 'seller'],
            ['first_name' => 'Rayhan', 'email' => 'rayhan@example.com', 'password' => Hash::make('password'), 'role' => 'user'],
        ];

        foreach ($users as $user) {
            $role = $user['role'];
            unset($user['role']); // remove role from array to prevent it from being passed to create method

            $user = User::factory()->create($user);
            $user->assignRole($role);
        }

        // $table->string('category_name', 100);
        //     $table->text('description');
        //     $table->timestamps();
        //make seeder for these service categories
        $serviceCategories = [
            ['category_name' => 'Music', 'description' => 'Cleaning service'],
            ['category_name' => 'Decoration', 'description' => 'Plumbing service'],
            ['category_name' => 'Electrical', 'description' => 'Electrical service'],
            ['category_name' => 'Stage', 'description' => 'Carpentry service'],
            ['category_name' => 'Food', 'description' => 'Painting service'],
            ['category_name' => 'Band', 'description' => 'Gardening service'],
            ['category_name' => 'Chef', 'description' => 'Pest Control service'],
        ];

        foreach ($serviceCategories as $serviceCategory) {
            ServiceCategory::create($serviceCategory);
        }

    }
}
