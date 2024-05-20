<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Blog; // Import the Blog class from the correct namespace
use App\Models\BlogComment; // Import the BlogComment class from the correct namespace

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            // ...

            'user_id' => fake()->randomElement(User::pluck('id')->toArray()),
            'likeable_id' => fake()->randomElement(
                array_merge(
                    Blog::pluck('id')->toArray(),
                    BlogComment::pluck('id')->toArray()
                )
            ),
            // 'likeable_id' => fake()->randomElement(Blog::pluck('id')->toArray()),
            'likeable_type' => fake()->randomElement(['App\Models\Blog', 'App\Models\BlogComment']),
        ];
    }
}
