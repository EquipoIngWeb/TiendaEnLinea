<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->userName,
        'full_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'confirmed' => 1,
        'password' => 'asd123',
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Brand::class, function (Faker\Generator $faker) {
    return [
        'url' => $faker->domainName,
        'name' => $faker->company,
        'image' => $faker->imageUrl(1900,700,false)."".rand(0,10)
    ];
});

$factory->define(App\Color::class, function (Faker\Generator $faker) {
    return [
        'example' => $faker->hexColor,
        'name' => $faker->colorName
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'message' => $faker->word,
        'product_id' => '1',
        'user_id' => rand(1,3),
        'status' => rand(0,1)

    ];
});
