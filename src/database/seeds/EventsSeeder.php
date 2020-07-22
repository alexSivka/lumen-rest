<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		for($i = 0; $i < 25; $i++){
			DB::table('events')->insert([
				'name'          => $faker->sentence(2),
				'city'   => $faker->city,
				'date' => $faker->dateTimeBetween('now', '+30 days'),
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			]);
		}
	}
}