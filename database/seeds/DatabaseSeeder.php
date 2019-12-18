<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $users = factory(App\User::class, 10)
            ->create()
            ->each(function ($user) {
                $user->posts()->createMany(
                    factory(App\Post::class, 20)
                        ->make()->toArray()
                );
            })
        ;

        foreach ($users as $user) {
            foreach ($user->posts as $post) {
                $post->comments()->createMany(
                    factory(App\Comment::class, 10)
                        ->make()->toArray()
                );
            }
        }
    }
}
