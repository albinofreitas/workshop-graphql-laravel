<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->realText(150),
        'user_id' => factory(App\User::class),
    ];
});
