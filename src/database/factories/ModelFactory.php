<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});

$factory->define(App\Member::class, function (Faker $faker) {
	return [
		'first_name'          => $faker->firstName,
		'last_name'          => $faker->lastName,
		'email'   => $faker->email,
		'created_at' => Carbon::now(),
		'updated_at' => Carbon::now()
	];
});

$factory->define(App\Event::class, function (Faker $faker) {
	return [
		'name'          => $faker->sentence(2),
		'city'   => $faker->city,
		'date' => $faker->dateTimeBetween('now', '+30 days'),
		'created_at' => Carbon::now(),
		'updated_at' => Carbon::now()
	];
});
