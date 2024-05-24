<?php

namespace Database\Seeders;


use App\Models\User; // User Model
use App\Models\ServiceCategory; // ServiceCategory Model
use App\Models\Blog; // Blog Model
use App\Models\BlogComment; // BlogComment Model
use App\Models\Like; // Like Model

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
        $roles = ['vendor', 'user', 'admin'];

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
            ['first_name' => 'Vendor', 'email' => 'vendor@example.com', 'password' => Hash::make('password'), 'role' => 'vendor'],
            ['first_name' => 'Rayhan', 'email' => 'rayhan@example.com', 'password' => Hash::make('password'), 'role' => 'user'],
        ];

        foreach ($users as $user) {
            $role = $user['role'];
            unset($user['role']); // remove role from array to prevent it from being passed to create method

            $user = User::factory()->create($user);
            $user->assignRole($role);
        }


        // ______________create factory data for ServiceCategoryFactory
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



        // ______________create factory data for BlogFactory
        Blog::factory(15)->create();

        // ______________create factory data for BlogCommentFactory
        BlogComment::factory(30)->create();

        // ______________create factory data for LikeFactory
        Like::factory(200)->create();
    }
}
