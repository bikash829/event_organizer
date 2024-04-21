<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        Blog::create([
            'title' => 'Test Blog 1',
            'content' => 'This is a test blog 1',
            'published_at' => now(),
            'user_id' => 1,
        ]);
        Blog::create([
            'title' => 'Test Blog 2',
            'content' => 'This is a test blog 2',
            'published_at' => now(),
            'user_id' => 1,
        ]);
        Blog::create([
            'title' => 'Test Blog 3',
            'content' => 'This is a test blog 3',
            'published_at' => now(),
            'user_id' => 1,
        ]);
    }
}
