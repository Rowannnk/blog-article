<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(5)->create();

        foreach ($users as $user) {
            Profile::factory()->for($user)->create();
        }
        $posts = collect();

        foreach ($users as $user) {
            $userPosts = Post::factory()
                ->count(2)
                ->for($user, 'author')
                ->create();

            $posts = $posts->concat($userPosts);
        }
        foreach ($posts as $post) {
            Comment::factory()
                ->count(2)
                ->for($post)
                ->for($users->random(), 'author')
                ->create();
        }
        $tags = Tag::factory(8)->create();

        foreach ($posts as $post) {
            $selectedTags = $tags->shuffle()->take(rand(1, 3));

            $post->tags()->attach($selectedTags->modelKeys());
        }

    }
}
