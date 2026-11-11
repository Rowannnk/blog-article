<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(5);

        return [
            'author_id' => User::factory(),
            'title' => $title,
            'slug' => Str::slug($title) . '-' . Str::random(6),
            'content' => fake()->paragraphs(5, true),
            'published_at' => fake()->optional()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
